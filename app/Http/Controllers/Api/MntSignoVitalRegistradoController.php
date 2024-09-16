<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\CtlSignoVital;
use App\Models\MntSignoVitalRegistrado;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class MntSignoVitalRegistradoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            // dd(json_encode($request->user()));
            $signos = MntSignoVitalRegistrado::where('id_paciente', $request->user()->paciente->id)->get();
            return response()->json([
                'data'=>$signos
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
            // dd(json_encode($request->user()->paciente->id));
            $signo = MntSignoVitalRegistrado::create(
                [
                    'id_paciente'=>$request->user()->paciente->id,
                    'id_signo_vital'=>$request->id_signo_vital,
                    'cantidad'=>$request->cantidad,
                ]
                );
                DB::commit();
                return response()->json([
                    'data'=>$signo
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
