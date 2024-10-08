<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MntMedicamentoAsignado extends Model
{
    use HasFactory;
    protected $table = "mnt_medicamento_asignado";
    protected $fillable = [
        'id_medicamento',
        'id_cita_medica',
        'dosis'
    ];
    public function medicamento (){
        return $this->belongsTo(CtlMedicamento::class,'id_medicamento');
    }
    public function cita_medica (){
        return $this->belongsTo(MntCitaMedicaAsignada::class, 'id_cita_medica');
    }
}
