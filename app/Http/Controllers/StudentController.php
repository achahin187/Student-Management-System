<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Session;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $students=Student::paginate(3);

        return view('student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.register');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ////////validate before register
   $this->validate($request,[
'Fname' => 'required',
'Lname' => 'required',
'email' => 'required|email',
'address' => 'required',
'class' => 'required',

        ]);
//////////////
$student=Student::create([
    'Fname' => $request->Fname,
    'Lname' => $request->Lname,
    'email' => $request->email,
    'address' => $request->address,
    'class' => $request->class,

]);
/////////////
session()->flash('msg','Student Added Successfully!');

return redirect()->back();
        /////////////msg

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student=Student::find($id);
        return view('student.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student,$id)
    {
        ///FIND student
        Student::find($student);
                ////////validate before aupdate
   $this->validate($request,[
    'Fname' => 'required',
    'Lname' => 'required',
    'email' => 'required|email',
    'address' => 'required',
    'class' => 'required',

            ]);
         /////////update
  

$student = Student::find($id); 
$student->Fname = $request['Fname'];
$student->Lname = $request['Lname'];
$student->email = $request['email'];
$student->address = $request['address'];
$student->class= $request['class'];
$student->save();

         /////////session
         session()->flash('msg','update successfully!');
         ////redirect
         return redirect('/Student');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Student::destroy($id);
        session()->flash('msg','Delete Successfully!');
        /////redirect
        return redirect()->back();
    }
}
