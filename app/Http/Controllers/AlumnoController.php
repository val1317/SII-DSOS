<?php

namespace App\Http\Controllers;

use App\Alumno;
use Illuminate\Http\Request;
use DataTables;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
   
        if ($request->ajax()) {
            $data = Alumno::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Editar</a>';
   
                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Eliminar</a>';
    
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('tabla');
    }
     
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Alumno::updateOrCreate(['id' => $request->id],
                ['nombre' => $request->nombre, 'apellido' => $request->apellido,
                'fecha_i' => $request->fecha_i, 'fecha_e' => $request->fecha_e,
                'grado' => $request->grado, 'fecha_n' => $request->fecha_n,
                'direccion' => $request->direccion, 'telefono' => $request->telefono,
                'baja' => $request->baja
                ]);        
   
        return response()->json(['success'=>'Alumno guardado existosamente.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alumno = Alumno::find($id);
        return response()->json($alumno);
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Alumno::find($id)->delete();
     
        return response()->json(['success'=>'Alumno eliminado existosamente.']);
    }
}
