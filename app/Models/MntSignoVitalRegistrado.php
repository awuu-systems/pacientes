<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MntSignoVitalRegistrado extends Model
{
    use HasFactory;
    protected $table = "mnt_signo_vital_registrado";
    protected $fillable =[
        "id_paciente",
        "presion_sistolica",
        "presion_diastolica",
        "frecuencia_respiratoria",
        "temperatura_farenheit",
        "temperatura_centigrados",
        "pulso",
        "oxigeno_en_la_sangre"

    ];
    public function signoVital(){
        return $this->belongsTo(CtlSignoVital::class,'id_signo_vital');
    }
}
