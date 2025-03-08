<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all(); // Ambil semua data siswa
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create'); // Tampilkan form untuk menambah siswa
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'email' => 'required|email|unique:students',
            'phone' => 'nullable|string|max:20',
            'grade' => 'required|string|max:255',
        ]);

        // Simpan data ke database
        Student::create($validated);
        session()->flash('success', 'Data siswa berhasil ditambahkan!');
        return redirect()->route('students.index'); // Redirect ke halaman index setelah data disimpan
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('students.edit', compact('student')); // Tampilkan form edit dengan data siswa
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'nullable|string|max:20',
            'grade' => 'required|string|max:255',
        ]);

        // Update data siswa
        $student->update($validated);
        session()->flash('success', 'Data siswa berhasil diperbarui!');
        return redirect()->route('students.index'); // Redirect ke halaman index setelah data diupdate
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Student $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete(); // Hapus data siswa
        session()->flash('warning', 'Data siswa berhasil dihapus');
        return redirect()->route('students.index'); // Redirect ke halaman index setelah data dihapus
    }
}
