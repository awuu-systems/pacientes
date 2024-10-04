<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MntAlarma extends Model
{
    use HasFactory;
    protected $table = 'mnt_alarma';
    protected $fillable = [
        "id_paciente",
        "id_estado",
        "titulo",
        "descripcion",
        "fecha_inicio",
        "fecha_fin",
        "hora_inicio",
        "dias_activa",
        "todos_los_dias"
    ];

    public function paciente () {
        return $this->belongsTo(MntPaciente::class, 'id_paciente', 'id');
    }
    public function estado(){
        return $this->belongsTo(CtlEstadoAlarma::class, 'id_estado', 'id');
    }
}

