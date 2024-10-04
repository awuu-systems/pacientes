<?php

namespace App\Models;

use App\Http\Controllers\Api\MntAlarmaController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MntRegistroSintoma extends Model
{
    use HasFactory;
    protected $table = "mnt_registro_sintoma";
    protected $fillable =[
        "id_sintoma",
        "fecha",
        "descripcion",
        "id_paciente"
    ];

    public function sintoma (){
        return $this->belongsTo(CtlSintoma::class, "id_sintoma");
    }
    public function paciente(){
        return $this->belongsTo(related: MntPaciente::class, "id_paciente");
    }
}
