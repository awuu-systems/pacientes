<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\MntDoctor;
use App\Models\MntPaciente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use PhpParser\JsonDecoder;
use Validator;
use \stdClass;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request){
        try {
            // $request->validated();
            // dd($request);
            $user = User::where('DUI', $request->DUI)->first();
            if(!$user || !Hash::check($request->password, $user->password)){
                return response()->json(['message' => 'Inicio de sesión no válido'], 401);
            }
            $token = $user->createToken('SaludTotal')->plainTextToken;
            return response()->json([
                
                'token' => $token,
                'user'=>$user
                
            ]);
        } catch (\Exception $e) {
            return response()->json(
               [ "error"=>$e->getMessage()]
            ,500);
        }
    }

    public function logout(Request $request){
        // dd(json_encode(auth()->user()->tokens()));
        $request->user()->tokens()->delete();
        return [
            'message' => 'Sesión cerrada correctamente',
        ];
    }

    public function registro(UserRequest $request){
        
        try {
            DB::beginTransaction();
            $request->validated();
            $path = Storage::disk('usuario')->put('/', $request->file('foto_usuario'));
            // dd($request);
            $user = User::create([
                'DUI'=>$request->DUI,
                'nombre'=>$request->nombre,
                'apellidos'=>$request->apellidos,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'foto_usuario'=>$path,
                'id_rol'=>$request->id_rol,
                'fecha_nacimiento'=>$request->fecha_nacimiento,
            ]);
            // dd($user);
            $usuario_rol = null;
            if($request->id_rol==3){
                $usuario_rol = MntDoctor::create([
                    'id_usuario'=>$user->id,
                    'id_especialidad'=>$request->id_especialidad
                ]);
                
            }if ($request->id_rol==2){
                $usuario_rol = MntPaciente::create([
                    'nombre'=>$user->nombre,
                    'id_usuario'=>$user->id,
                    'diagnostico'=>$request->diagnostico,
                    'peso'=>$request->peso,
                    'alergias'=>$request->alergias,                 
                ]);
                
            }
            DB::commit();
            $token = $user->createToken('SaludTotal')->plainTextToken;
                return response()->json([
                    'data'=>$usuario_rol,
                    'token'=>$token,
                    'token_type'=>'Bearer'
                ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error'=>$e->getMessage()
            ],500);
        }
    }
    public function index(Request $request)
    {
        try {
            $users = User::where('id',$request->user()->id)->get();
            return response()->json([
                'data'=>$users
            ],200);
        } catch (\Exception $th) {
            return response()->json([
                'error'=>$th->getMessage()
            ],500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            
        } catch (\Throwable $th) {
            //throw $th;
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
