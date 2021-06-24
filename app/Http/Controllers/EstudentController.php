<?php

namespace App\Http\Controllers;

use App\Models\Estudent;
use Illuminate\Http\Request;

class EstudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Estudent::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Estudent::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudent  $estudent
     * @return \Illuminate\Http\Response
     */
    public function show(Estudent $estudent)
    {
        return $estudent;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudent  $estudent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estudent $estudent)
    {
        $estudent->update($request->all());
        return $estudent;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudent  $estudent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudent $estudent)
    {
        $estudent->delete();
        return response()->json(['res'=>'Dato eliminado'],200);
    }
    public function upload(Request $request){
        $request->validate([
            'id'=>'required',
            'imagen'=>'required',
        ]);
        if ($request->hasFile('imagen')){
            $file=$request->file('imagen');
            $nombre=time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('imagenes'),$nombre);
            $estudent=Estudent::find($request->id);
            $estudent->imagen=$nombre;
            $estudent->save();
            return response()->json(['res'=>'Imagen modificada exitosamente'],200);
        }
//        return $request;
    }
}
