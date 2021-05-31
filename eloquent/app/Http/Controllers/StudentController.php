<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function showStudent()
    {
        $student = Student::all();
        return view('students.student_list',['students'=>$student]);
    }

    public function addStudentForm()
    {
        return view('students.add_student');
    }

    function validationEmail(Request $request){
        $email = $request->email;
        $isEmail = true;

        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $isEmail = false;
        }
        return view('students.add_student' || 'students.edit_student', compact('isEmail'));
    }

    public function addStudent(Request $request)
    {
        $student = new Student();
        $student->name=$request->name;
        $student->dob=$request->dob;
        $student->phone=$request->phone;
        $student->email=$request->email;
        $student->address=$request->address;
        $student->class=$request->class;
        $student->save();
        return redirect()->route('students.list');
    }

    public function deleteStudent($id)
    {
        $data = Student::find($id);
        $data->delete();
        return redirect()->route('students.list');
    }

    public function editStudentForm($id)
    {
        $student = Student::find($id);
        return view('students.edit_student',['student'=>$student]);
    }

    public function updateStudent(Request $request)
    {
        $student = Student::find($request->id);
        $student->name=$request->name;
        $student->dob=$request->dob;
        $student->phone=$request->phone;
        $student->email=$request->email;
        $student->address=$request->address;
        $student->class=$request->class;
        $student->save();
        return redirect()->route('students.list');
    }
}
