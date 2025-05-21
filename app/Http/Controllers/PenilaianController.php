<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Student;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    // Menampilkan form input penilaian
    public function input()
    {
        $students = Student::all();
        $criterias = Criteria::all();

        return view('penilaian.input', compact('students', 'criterias'));
    }

    // Menampilkan daftar hasil penilaian
    public function index()
    {
        $criterias = Criteria::all();
        $students = Student::with('scores')->get();

        if ($criterias->isEmpty() || $students->isEmpty()) {
            return view('penilaian.index', ['results' => []]);
        }

        // Membuat matriks nilai [student_id][criteria_id] = nilai
        $matrix = [];
        foreach ($students as $student) {
            foreach ($criterias as $crit) {
                $score = $student->scores->where('criteria_id', $crit->id)->first();
                $matrix[$student->id][$crit->id] = $score ? $score->value : 0;
            }
        }

        // Normalisasi nilai
        $normalized = [];
        foreach ($criterias as $crit) {
            $column = [];

            foreach ($matrix as $studentScores) {
                if (isset($studentScores[$crit->id])) {
                    $column[] = $studentScores[$crit->id];
                }
            }

            $filtered = array_filter($column, fn($v) => $v > 0);

            $max = count($column) > 0 ? max($column) : 1;
            $min = count($filtered) > 0 ? min($filtered) : 1;

            foreach ($students as $student) {
                $value = $matrix[$student->id][$crit->id] ?? 0;

                $normalized[$student->id][$crit->id] = $crit->type === 'benefit'
                    ? ($max ? $value / $max : 0)
                    : ($value ? $min / $value : 0);
            }
        }

        // Hitung skor total tiap siswa
        $results = [];
        foreach ($students as $student) {
            $total = 0;
            foreach ($criterias as $crit) {
                $total += $normalized[$student->id][$crit->id] * ($crit->weight / 100);
            }
            $results[] = [
                'student' => $student->name,
                'score' => round($total * 100, 2),
            ];
        }

        // Urutkan hasil dari yang terbaik
        usort($results, fn($a, $b) => $b['score'] <=> $a['score']);

        return view('penilaian.index', compact('results'));
    }

    // Simpan data penilaian dari form input
    public function simpan(Request $request)
    {
        $request->validate([
            'scores' => 'required|array',
        ]);

        foreach ($request->scores as $studentId => $criteriaScores) {
            foreach ($criteriaScores as $criteriaId => $value) {
                Penilaian::updateOrCreate(
                    ['student_id' => $studentId, 'criteria_id' => $criteriaId],
                    ['value' => $value]
                );
            }
        }

        return redirect()->route('penilaian.input')->with('success', 'Nilai berhasil disimpan.');
    }

    // Dashboard ringkasan dan top siswa
    public function dashboard()
    {
        $criteriaCount = Criteria::count();
        $studentCount = Student::count();
        $scoreCount = Penilaian::count();

        $recentStudents = Student::latest()->take(3)->get();
        $criterias = Criteria::all();
        $students = Student::with('scores')->get();

        if ($criterias->isEmpty() || $students->isEmpty()) {
            $topStudents = [];
            return view('dashboard.index', compact(
                'criteriaCount',
                'studentCount',
                'scoreCount',
                'recentStudents',
                'topStudents'
            ));
        }

        // Matriks nilai [student_id][criteria_id]
        $matrix = [];
        foreach ($students as $student) {
            foreach ($criterias as $crit) {
                $score = $student->scores->where('criteria_id', $crit->id)->first();
                $matrix[$student->id][$crit->id] = $score ? $score->value : 0;
            }
        }

        // Normalisasi nilai
        $normalized = [];
        foreach ($criterias as $crit) {
            $column = [];

            foreach ($matrix as $studentScores) {
                if (isset($studentScores[$crit->id])) {
                    $column[] = $studentScores[$crit->id];
                }
            }

            $filtered = array_filter($column, fn($v) => $v > 0);

            $max = count($column) > 0 ? max($column) : 1;
            $min = count($filtered) > 0 ? min($filtered) : 1;

            foreach ($students as $student) {
                $value = $matrix[$student->id][$crit->id] ?? 0;

                $normalized[$student->id][$crit->id] = $crit->type === 'benefit'
                    ? ($max ? $value / $max : 0)
                    : ($value ? $min / $value : 0);
            }
        }

        // Hitung total skor tiap siswa
        $results = [];
        foreach ($students as $student) {
            $total = 0;
            foreach ($criterias as $crit) {
                $total += $normalized[$student->id][$crit->id] * ($crit->weight / 100);
            }
            $results[] = [
                'student' => $student->name,
                'score' => round($total * 100, 2),
            ];
        }

        // Urutkan dari skor tertinggi
        usort($results, fn($a, $b) => $b['score'] <=> $a['score']);

        // Ambil top 3 siswa
        $topStudents = array_slice($results, 0, 3);

        return view('dashboard.index', compact(
            'criteriaCount',
            'studentCount',
            'scoreCount',
            'recentStudents',
            'topStudents'
        ));
    }
}
