<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Academic;
use App\Models\Country;

use Illuminate\Http\Request;


class StudentController extends Controller
{
    public function index(){
        $students = Student::with(['academic', 'country'])->get();
        return view('students.index', compact('students'));
    }

    public function create(){
    return view('students.create');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'age' => 'required|integer',
            'address' => 'required',
            'academic.course' => 'sometimes|string',
            'academic.year' => 'sometimes|integer',
            'country.continent' => 'sometimes|string',
            'country.name' => 'sometimes|string',
            'country.capital' => 'sometimes|string',
        ]);
        $student = Student::create($validatedData);
        
        if ($request->has('academic')) {
            $student->academic()->create($request->academic);
        }
    
        if ($request->has('country')) {
            $student->country()->create($request->country);
        }
        session()->flash('success', 'Student added successfully');
        return redirect()->route('students.index');
    }

    public function update(Request $request, $id){
        $student = Student::find($id);
        $student -> update($request->all());
        $student -> academic()->update($request->input('academic'));  
        $student -> country()->update($request->input('country'));  
        session()->flash('success', 'Details successfully updated.');
        return redirect()->route('students.index');
    }


    public function edit($id){
        $student = Student::with(['academic', 'country'])->findOrFail($id);
        return view('students.edit', compact('student'));
    }


    public function destroy($id){
        $student = Student::find($id);
        $student -> academic()->delete();
        $student -> country()->delete();
        $student->delete();
        session()->flash('success', 'Successfully deleted the user');
        return redirect()->route('students.index');
    }
}   
