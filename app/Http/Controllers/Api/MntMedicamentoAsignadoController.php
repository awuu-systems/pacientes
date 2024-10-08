<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MntMedicamentoAsignado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MntMedicamentoAsignadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $medicamento = MntMedicamentoAsignado::create([
                'id_medicamento' => $request->id_medicamento,
                'id_cita_medica'=> $request->id_cita_medica,
                'dosis'=>$request->dosis,
            ]);
            DB::commit();
            return response()->json([
                'data'=>$medicamento
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $medicamento = MntMedicamentoAsignado::with('medicamento', 'cita_medica')->where('id_cita_medica',$id)->get();
            return response()->json([
                'data'=>$medicamento
            ]);
        } catch (\Exception $e) {
             return response()->json([
                'data'=>$e->getMessage()
            ],500);
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
        try {
            $medicamentoAsignado = MntMedicamentoAsignado::where('id', $id)->first();
            if(!$medicamentoAsignado){
                return response()->json([
                    'data'=>'NO se encontró el medicamento asignado'
                ],404);
            }else{
                $medicamentoAsignado->delete();
                DB::commit();
                return response()->json([
                    'data'=>$medicamentoAsignado
                ]);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'data'=>$e->getMessage()
            ],500);
        }

    }
}
