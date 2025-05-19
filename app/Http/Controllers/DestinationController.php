<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index(){
        $destinations = Destination::all();
        return view('destinations.index', compact('destinations'));
    }

    public function create(){
        return view('destinations.create');
    }

    public function store(Request $request){
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'location' => 'nullable|string',
    ]);

    Destination::create($request->only(['name', 'description', 'location']));
    return redirect()->route('destinations.index')->with('success', 'Destinasi berhasil ditambahkan.');
    }

    public function edit(Destination $destination){
        return view('destinations.edit', compact('destination'));
    }

    public function update(Request $request, Destination $destination){
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'location' => 'nullable|string',
    ]);

    $destination->update($request->only(['name', 'description', 'location']));
    return redirect()->route('destinations.index')->with('success', 'Destinasi berhasil diperbarui.');
    }

    public function destroy(Destination $destination){
        $destination->delete();
        return redirect()->route('destinations.index')->with('success', 'Destinasi berhasil dihapus.');
    }
}
