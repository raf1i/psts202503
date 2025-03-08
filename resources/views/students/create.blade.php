@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Tambah Siswa</h1>

        <form action="{{ route('students.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" name="name" class="form-control" id="name" required>
            </div>

            <div class="form-group">
                <label for="gender">Jenis Kelamin:</label>
                <select name="gender" class="form-control" id="gender" required>
                    <option value="male">Laki-laki</option>
                    <option value="female">Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>

            <div class="form-group">
                <label for="phone">No Telepon:</label>
                <input type="text" name="phone" class="form-control" id="phone">
            </div>

            <div class="form-group">
                <label for="grade">Grade:</label>
                <input type="text" name="grade" class="form-control" id="grade" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
