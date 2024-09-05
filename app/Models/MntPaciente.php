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

}
