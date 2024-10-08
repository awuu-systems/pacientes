<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MntCitaMedicaAsignada;
use App\Models\MntDoctor;
use App\Models\MntPaciente;
use Illuminate\Http\Request;

class MntPacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $paciente = MntPaciente::with('usuario')->get();
            return response()->json([
                'data' => $paciente,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function pacientesDetalles(Request $request)
    {
        $idDoctor = $request->user()?->doctor?->id;
        if (!$idDoctor) {
            return response()->json([
                'data' => 'doctor no encontrado'
            ], 404);
        }

        $citasMedicas = MntCitaMedicaAsignada::where('id_doctor', $idDoctor)->get();

        $idPacientes = $citasMedicas->reduce(function (array $acc, $item) {
            if (!in_array($item->id_paciente, $acc)) {
                array_push($acc, $item->id_paciente);
            }
            return $acc;
        }, []);

        $pacientes = MntPaciente::with('registrosSintomas', 'registrosSintomas.sintoma', 'signosVitales')
        ->whereIn('id', $idPacientes)->get();

        return $pacientes;
        // return $doctor;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
