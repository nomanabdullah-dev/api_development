<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return response()->json($subjects);
    }

    public function store(Request $request)
    {
        $request->validate([
            'classe_id' => 'required',
            'subject_name' => 'required|unique:subjects|max:255',
            'subject_code' => 'required|unique:subjects|max:255'
        ]);
        Subject::create($request->all());
        return response('inserted');
    }

    public function show($id)
    {
        $subject = Subject::findOrFail($id);
        return response()->json($subject);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'classe_id' => 'required',
            'subject_name' => 'required|unique:subjects|max:255',
            'subject_code' => 'required|unique:subjects|max:255'
        ]);
        Subject::where('id', $id)->update($request->all());
        return response('updated');
    }

    public function destroy($id)
    {
        Subject::where('id', $id)->delete();
        return response('deleted done');
    }
}
