<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MntEnfermedadRegistrada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MntEnfermedadRegistradaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $enfermedad = MntEnfermedadRegistrada::where('id_paciente', $request->user()->paciente->id)->get();
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $enfermedad = MntEnfermedadRegistrada::create(
                [
                    'id_enfermedad_cronica' => $request->id_enfermedad_cronica,
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
