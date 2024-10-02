<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CtlSintoma;
use Illuminate\Http\Request;

class CtlSintomaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $sintomas = CtlSintoma::all();
            return response()->json(['data' => $sintomas], 200);
        } catch (\Throwable $th) {
            //throw $th;
        }
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
