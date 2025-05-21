<?php
namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create() {
        return view('students.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'class' => 'nullable|string',
        ]);

        Student::create($request->only(['name', 'description', 'class']));
        return redirect()->route('students.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function edit(Student $student) {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student) {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'class' => 'nullable|string',
        ]);

        $student->update($request->only(['name', 'description', 'class']));
        return redirect()->route('students.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function destroy(Student $student) {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Data siswa berhasil dihapus.');
    }
}
