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
        "id_signo_vital",
        "cantidad"
    ];
    public function signoVital(){
        return $this->belongsTo(CtlSignoVital::class,'id_signo_vital');
    }
}
