<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return response()->json($students);
    }

    public function store(Request $request)
    {
        $data=array();
        $data['classe_id']  = $request->classe_id;
        $data['section_id'] = $request->section_id;
        $data['name']       = $request->name;
        $data['phone']      = $request->phone;
        $data['email']      = $request->email;
        $data['password']   = Hash::make($request->password);
        $data['address']    = $request->address;
        $data['gender']     = $request->gender;
        $data['photo']      = $request->photo;

        Student::create($data);
        return response('inserted');
    }

    public function show($id)
    {
        $show = Student::where('id',$id)->first();
        return response()->json($show);
    }

    public function update(Request $request, $id)
    {
        Student::where('id', $id)->update($request->all());
        return response('updated');
    }

    public function destroy($id)
    {
        $student = Student::where('id', $id)->first();
        $unlinked = unlink($student->photo);
        if($unlinked){
            $student->delete();
            return response('deleted');
        }
        return response('unlinked dont work');
    }
}
