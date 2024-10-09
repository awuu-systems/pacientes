<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MntCitaMedicaAsignada;
use App\Models\MntPaciente;
use Illuminate\Http\Request;

class MntCitaMedicaAsignadaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $citaMedicaAsignada = MntCitaMedicaAsignada::with('paciente.usuario')->where('id_doctor', $request->user()->doctor->id)->get();
            // $citaMedicaAsignada = MntPaciente::with(['usuario','citas' => function ($query)use ($request){
            //     $query->where('id_doctor', $request->user()->doctor->id);
            // }])->get();
            return response()->json([
                'data'=>$citaMedicaAsignada
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error'=>$e->getMessage()
            ],500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            
            $citaMedica = MntCitaMedicaAsignada::create(
                [
                    "id_doctor"=> $request->user()->doctor->id,
                    "id_paciente"=>$request->id_paciente,
                    "fecha"=>$request->fecha,
                    "hora"=>$request->hora,
                    ]
                );
                return response()->json([
                    'data'=>$citaMedica
                ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' =>$e->getMessage() ,
            ],500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function PacienteCita(Request $request)
    {
        try {
            $citaMedica = MntCitaMedicaAsignada::where('id_paciente', $request->user()->paciente->id)->with('paciente', 'doctor.usuario')->get();
            return response()->json([
                'data'=>$citaMedica
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error'=>$e->getMessage()
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
