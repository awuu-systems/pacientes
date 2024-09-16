<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MntEnfermedadRegistrada extends Model
{
    use HasFactory;
    protected $table = 'mnt_enfermedad_registrada';
    protected $fillable = [
        "id_enfermedad_cronica",
        "id_paciente",
    ];
    public function enfermedadCronica(){
        return $this->belongsTo(CtlEnfermedadCronica::class, 'id_enfermedad_cronica');
    }
}
