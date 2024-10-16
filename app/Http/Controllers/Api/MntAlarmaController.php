<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MntAlarma;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MntAlarmaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       try {
            $alarmas = MntAlarma::with('estado')->where('id_paciente',$request->user()->paciente->id)->get();
            return response()->json(['data' => $alarmas]);
       } catch (\Exception $e) {
        return response()->json([
            'error'=>$e->getMessage()
        ]);
       }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $alarma = MntAlarma::create(
                [
                    'id_paciente' => $request->user()->paciente->id,
                    'id_estado' => $request->id_estado,
                    'titulo' => $request->titulo,
                    'descripcion'=> $request->descripcion,
                    'fecha_inicio' => $request->fecha_inicio,
                    'fecha_fin' => $request->fecha_fin,
                    'dias_activa'=>$request->dias_activa,
                    'todos_los_dias'=>$request->todos_los_dias,
                    'hora_inicio' =>$request->hora_inicio
                ]
                );
                DB::commit();
                return response()->json(['data' => $alarma], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function cambiarEstado (string $id)
    {
        try {
            $alarma = MntAlarma::where('id', $id)->first();
            if($alarma && $alarma->id_estado == 1){
                $alarma->id_estado = 2;
            }else if($alarma && $alarma->id_estado == 2){
                $alarma->id_estado = 1;
            }
            $alarma->save();
            DB::commit();
            return response()->json(['data' => $alarma], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'data'=>$e
            ],500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
