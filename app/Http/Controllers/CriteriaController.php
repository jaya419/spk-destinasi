<?php
namespace App\Http\Controllers;

use App\Models\Criteria;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    public function index() {
        $criteria = Criteria::all();
        return view('criteria.index', compact('criteria'));
    }

    public function create() {
        return view('criteria.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'weight' => 'required|numeric|min:1|max:100',
            'type' => 'required|in:cost,benefit',
        ]);

        $totalWeight = Criteria::sum('weight') + $request->weight;
        if ($totalWeight > 100) {
            return back()->withErrors(['weight' => 'Total bobot tidak boleh lebih dari 100'])->withInput();
        }

        Criteria::create($request->all());
        return redirect()->route('criteria.index')->with('success', 'Kriteria berhasil ditambahkan.');
    }

    public function edit(Criteria $criterion) {
        return view('criteria.edit', compact('criterion'));
    }

    public function update(Request $request, Criteria $criterion) {
        $request->validate([
            'name' => 'required',
            'weight' => 'required|numeric|min:1|max:100',
            'type' => 'required|in:cost,benefit',
        ]);

        $totalWeight = Criteria::sum('weight') - $criterion->weight + $request->weight;

        if ($totalWeight > 100) {
            return back()->withErrors(['weight' => 'Total bobot tidak boleh lebih dari 100'])->withInput();
        }

        $criterion->update($request->all());
        return redirect()->route('criteria.index')->with('success', 'Kriteria berhasil diperbarui.');
    }

    public function destroy(Criteria $criterion) {
        $criterion->delete();
        return redirect()->route('criteria.index')->with('success', 'Kriteria berhasil dihapus.');
    }
}