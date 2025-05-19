<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Destination;
use App\Models\Recomendasi;
use Illuminate\Http\Request;

class RecomendasiController extends Controller
{
    public function index(){
        $criterias = Criteria::all();
        $destinations = Destination::with('scores')->get();

        $matrix = [];
        foreach ($destinations as $dest) {
            foreach ($criterias as $crit) {
                $score = $dest->scores->where('criteria_id', $crit->id)->first();
                $matrix[$dest->id][$crit->id] = $score ? $score->value : 0;
            }
        }

        $normalized = [];
        foreach ($criterias as $crit) {
            $column = array_column($matrix, $crit->id);

        if (empty($column)) {
            $max = 1;
            $min = 1;
        } else {
            $filtered = array_filter($column, fn($v) => $v > 0);
            $max = max($column);
            $min = count($filtered) > 0 ? min($filtered) : 1;
        }

        foreach ($destinations as $dest) {
            $value = $matrix[$dest->id][$crit->id] ?? 0;
            if ($crit->type == 'benefit') {
                $normalized[$dest->id][$crit->id] = $max ? $value / $max : 0;
            } else {
                $normalized[$dest->id][$crit->id] = $value ? $min / $value : 0;
            }
        }}

        $results = [];
        foreach ($destinations as $dest) {
            $total = 0;
            foreach ($criterias as $crit) {
                $total += $normalized[$dest->id][$crit->id] * ($crit->weight / 100);
            }
            $results[] = [
                'destination' => $dest->name,
                'score' => round($total * 100, 2)
            ];
        }

        usort($results, fn($a, $b) => $b['score'] <=> $a['score']);
        return view('recomendasi.index', compact('results'));
    }

    public function input(){
        $destinations = Destination::all();
        $criterias = Criteria::all();
        return view('recomendasi.input', compact('destinations', 'criterias'));
    }

    public function simpan(Request $request){
        $request->validate([
            'scores' => 'required|array',
        ]);

        foreach ($request->scores as $destinationId => $criteriaScores) {
            foreach ($criteriaScores as $criteriaId => $value) {
                Recomendasi::updateOrCreate(
                    ['destination_id' => $destinationId, 'criteria_id' => $criteriaId],
                    ['value' => $value]
                );
            }
        }

        return redirect()->route('recomendasi.input')->with('success', 'Skor berhasil disimpan.');
    }

    
    public function dashboard(){

        $criteriaCount = Criteria::count();
        $destinationCount = Destination::count();
        $scoreCount = Recomendasi::count();

        $recentDestinations = Destination::latest()->take(3)->get();

        $criterias = Criteria::all();
        $destinations = Destination::with('scores')->get();


        $matrix = [];
        foreach ($destinations as $dest) {
            foreach ($criterias as $crit) {
                $score = $dest->scores->where('criteria_id', $crit->id)->first();
                $matrix[$dest->id][$crit->id] = $score ? $score->value : 0;
        }
    }

        $normalized = [];
        foreach ($criterias as $crit) {
            $column = array_column($matrix, $crit->id);
            $filtered = array_filter($column, fn($v) => $v > 0);
            $max = count($column) > 0 ? max($column) : 1;
            $min = count($filtered) > 0 ? min($filtered) : 1;

            foreach ($destinations as $dest) {
                $value = $matrix[$dest->id][$crit->id] ?? 0;
                if ($crit->type == 'benefit') {
                    $normalized[$dest->id][$crit->id] = $max ? $value / $max : 0;
                } else {
                    $normalized[$dest->id][$crit->id] = $value ? $min / $value : 0;
                }
            }
        }

        $results = [];
        foreach ($destinations as $dest) {
            $total = 0;
            foreach ($criterias as $crit) {
                $total += $normalized[$dest->id][$crit->id] * ($crit->weight / 100);
            }
            $results[] = [
                'destination' => $dest->name,
                'score' => round($total * 100, 2)
            ];
        }

    usort($results, fn($a, $b) => $b['score'] <=> $a['score']);
    $topDestinations = array_slice($results, 0, 3);

    return view('dashboard.index', compact(
        'criteriaCount',
        'destinationCount',
        'scoreCount',
        'recentDestinations',
        'topDestinations'
    ));
    }
}
