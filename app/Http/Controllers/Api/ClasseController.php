<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    public function index()
    {
        return Classe::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_name' => 'required|unique:classes|max:255'
        ]);
        Classe::create($request->all());
        return response('done');
    }

    public function show($id)
    {
        $show = Classe::where('id',$id)->first();
        return response()->json($show);
    }

    public function update(Request $request, $id)
    {
        Classe::where('id', $id)->update($request->all());
        return response('updated');
    }

    public function destroy($id)
    {
        Classe::where('id', $id)->delete();
        return response('deleted');
    }
}
