@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Edit Siswa</h1>

        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $student->name }}" required>
            </div>

            <div class="form-group">
                <label for="gender">Jenis Kelamin:</label>
                <select name="gender" class="form-control" id="gender" required>
                    <option value="male" {{ $student->gender == 'male' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="female" {{ $student->gender == 'female' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ $student->email }}" required>
            </div>

            <div class="form-group">
                <label for="phone">No Telepon:</label>
                <input type="text" name="phone" class="form-control" id="phone" value="{{ $student->phone }}">
            </div>

            <div class="form-group">
                <label for="grade">Grade:</label>
                <input type="text" name="grade" class="form-control" id="grade" value="{{ $student->grade }}" required>
            </div>

            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
@endsection
