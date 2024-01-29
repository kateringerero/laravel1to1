@extends('layout.app')

@section('content')
<div class="container">
    <h1>Edit Student Details</h1>
    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <h3>Student Details</h3>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}" required>
        </div>
        <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" class="form-control" id="age" name="age" value="{{ $student->age }}"required>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $student->address }}"required>
        </div>

        <h3>Student's Academic Details</h3>
        <div class="form-group">
            <label for="course">Course:</label>
            <input type="text" class="form-control" name="academic[course]" value="{{ $student->academic->course ?? '' }}" required>
        </div>
        <div class="form-group">
            <label for="year">Year:</label>
            <input type="text" class="form-control" name="academic[year]" value="{{ $student->academic->year ?? '' }}" required>
        </div>

        <h3>Student's Country Details</h3>
        <div class="form-group">
            <label for="country">Continent:</label>
            <input type="text" class="form-control" name="country[continent]" value="{{ $student->country->continent ?? '' }}" required>
        </div>
        <div class="form-group">
            <label for="continent">Name:</label>
            <input type="text" class="form-control" name="country[name]" value="{{ $student->country->name ?? '' }}" required>
        </div>
        <div class="form-group">
            <label for="continent">Capital:</label>
            <input type="text" class="form-control" name="country[capital]" value="{{ $student->country->capital ?? '' }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <p>
    <p>
    <p>
</div>
@endsection
