<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Http\Resources\MateriCollection;
use App\Http\Resources\MateriResource;
use Illuminate\Support\Facades\Storage;
use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materi = Materi::all();
        return MateriResource::collection($materi);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name =null;
        if  ($request->image){
            $NameFile = Str::random(10);
            $extension = $request->image->extension();
            $name = $NameFile.'.'.$extension;
            Storage::putFileAs('foto',$request->image, $name);

        }
        $request['gambar'] = $name; 
        $materi = Materi::create($request->all());
        return response()->json($materi,201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $materi = Materi::findorFail($id);
        return response()->json(['data' => $materi]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materi $materi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $name =null;
        if  ($request->image){
            $NameFile = Str::random(10);
            $extension = $request->image->extension();
            $name = $NameFile.'.'.$extension;
            Storage::putFileAs('foto',$request->image, $name);}
        $request['gambar'] = $name; 
        $materi = Materi::findorFail($id);
        $materi->update($request->all());
        return response()->json($materi,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $materi = Materi::find($id);
        $materi->delete();
        return response()->json($materi,200);
    }
}
