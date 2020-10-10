<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers=Teacher::paginate(3);

        return view('teachers.index',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        return view('teachers.add');

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
    'name' => 'required',
    'supject' => 'required',
    'email' => 'required|email',
    'address' => 'required',
    'class' => 'required',
    
            ]);
    //////////////
    $teacher=Teacher::create([
        'name' => $request->name,
        'supject' => $request->supject,
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
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $teacher=Teacher::find($id);
        return view('teachers.update',compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher,$id)
    {
          ///FIND student
          Teacher::find($teacher);
          ////////validate before aupdate
$this->validate($request,[
'name' => 'required',
'supject' => 'required',
'email' => 'required|email',
'address' => 'required',
'class' => 'required',

      ]);
   /////////update


$teacher = Teacher::find($id); 
$teacher->name = $request['name'];
$teacher->supject = $request['supject'];
$teacher->email = $request['email'];
$teacher->address = $request['address'];
$teacher->class= $request['class'];
$teacher->save();

   /////////session
   session()->flash('msg','update successfully!');
   ////redirect
   return redirect('/Teacher');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        Teacher::destroy($id);
        session()->flash('msg','Delete Successfully!');
        /////redirect
        return redirect()->back();
    }
}
