@extends('layout.app')

@section('content')
<div class="container">
    <h1>Add New Data</h1>
    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <h3>Student Details</h3>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="age">Age:</label>
            <input type="number" class="form-control" id="age" name="age" required>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" name="address" required>
        </div>
        <h3>Student's Academic Details</h3>
        <div class="form-group">
            <label for="course">Course:</label>
            <input type="text" class="form-control" id="course" name="academic[course]">
        </div>
        <div class="form-group">
            <label for="year">Year:</label>
            <input type="number" class="form-control" id="year" name="academic[year]">
        </div>
        <h3>Student's Country Details</h3>
        <div class="form-group">
            <label for="country">Continent:</label>
            <input type="text" class="form-control" id="country" name="country[continent]">
        </div>
        <div class="form-group">
            <label for="continent">Name:</label>
            <input type="text" class="form-control" id="continent" name="country[name]">
        </div>
        <div class="form-group">
            <label for="continent">Capital:</label>
            <input type="text" class="form-control" id="continent" name="country[capital]">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <p>
    <p>
    <p>
</div>
@endsection
