@extends('layout.app')

@section('content')
<div class="container d-flex justify-content-between align-items-center">
    <h1>Students List</h1>
    <a href="{{ route('students.create') }}" class="btn btn-primary ml-auto">Add New Student</a>
    <p>
    </div>
    <table class="table">
    <thead>
            <tr>
                <th colspan="3">Student Details</th>
                <th colspan="2">Student's Academic Details</th>
                <th colspan="3">Student's Country Details</th>
            </tr>
        </thead>
        <thead>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Address</th>
                <th>Course</th>
                <th>Year</th>
                <th>Continent</th>
                <th>Name</th>
                <th>Capital</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->age }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->academic->course ?? 'N/A' }}</td>
                    <td>{{ $student->academic->year ?? 'N/A' }}</td>
                    <td>{{ $student->country->continent ?? 'N/A' }}</td>
                    <td>{{ $student->country->name ?? 'N/A' }}</td>
                    <td>{{ $student->country->capital ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
    
</div>
@endsection
