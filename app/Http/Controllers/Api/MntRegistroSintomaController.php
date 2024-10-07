<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MntRegistroSintoma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MntRegistroSintomaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request )
    {
        try {
            $sintomas = MntRegistroSintoma::with('sintoma')->where('id_paciente','=', $request->user()->paciente->id)->get();

                // Hay síntomas, procede a procesarlos
                return response()->json(['data' => $sintomas], 200);
            
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
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
            $enfermedad = MntRegistroSintoma::create(
                [
                    'id_sintoma' => $request->id_sintoma,
                    'fecha' => $request->fecha,
                    'descripcion'=>$request->descripcion,
                    'id_paciente'=>$request->user()->paciente->id
                    ]
            );
            DB::commit();
            return response()->json([
                'data' => $enfermedad
            ]);
        } catch (\Exception $e) {
        return response()->json([
            'error'=>$e->getMessage()
        ]);
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
