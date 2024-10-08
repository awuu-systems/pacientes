<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MntPaciente extends Model
{
    use HasFactory;
    protected $table = "mnt_paciente";
    protected $fillable =[
        "nombre",
        "id_usuario",
        "diagnostico",
        "peso",
        "alergias"
    ];

    public function usuario(){
        return $this->belongsTo(User::class,'id_usuario');
    }

    public function citas(){
        return $this->hasMany(MntCitaMedicaAsignada::class, 'id_paciente');
    }

    public function registrosSintomas()
    {
        return $this->hasMany(MntRegistroSintoma::class, 'id_paciente');
    }

    public function signosVitales()
    {
        return $this->hasMany(MntSignoVitalRegistrado::class, 'id_paciente');
    }
}
