<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asesores;
use Illuminate\Support\Facades\Log;

class AsesoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asesores=Asesores::all();
        return view('asesores.list',compact('asesores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('asesores.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_completo'=>['required','string'],
            'celular'=>['required','numeric'],
            'numero_documento'=>['required','numeric','unique:App\Models\Asesores,numero_documento']
        ]);

        $asesor= new Asesores();
        $asesor->nombre_completo=$request->nombre_completo;
        $asesor->celular=$request->celular;
        $asesor->estado=true;
        $asesor->save();
        return redirect('asesores');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asesor=Asesores::where('id_asesor',$id)->get();
        return view('asesores.edit',compact('asesor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {


        $request->validate([
            'nombre_completo'=>['required','string'],
            'celular'=>['required','numeric'],
            'numero_documento'=>['required','numeric']
        ]);
        if(is_null($request->id_asesor)){
            return back()->with('error','Se ha presentado un error por favor contacte al administrador');
        }
        try {
            Asesores::where('id_asesor',$request->id_asesor)
                ->update(
                    [
                        'nombre_completo'=>$request->nombre_completo,
                        'celular'=>$request->celular,
                        'numero_documento'=>$request->numero_documento
                    ]);

            return redirect('asesores')->with('success','Actualizado correctamente.');


        }catch (\Exception $exception){
            Log::error($exception->getMessage());
            return back()->with('error','Se ha presentado un error tratando de actualizar, por favor intente nuevamente.');

        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(is_null($id)){
            return back()->with('error','Se ha presentado un error por favor contacte al administrador');
        }
        try {
            $asesor=Asesores::find($id);
            if(is_null($asesor)){
                return back()->with('error','El asesor que intente eliminar no existe en los registros');
            }
            $asesor->delete();
            return redirect('asesores')->with('success','Eliminado correctamente.');

        }catch (\Exception $exception){
            Log::error($exception->getMessage());
            return back()->with('error','Se ha presentado un error tratando de actualizar, por favor intente nuevamente.');
        }





    }
}
