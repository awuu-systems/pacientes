<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MntDoctorPaciente extends Model
{
    use HasFactory;
    protected $table = 'mnt_doctor_paciente';
    
    protected $fillable =[
        'id_doctor',
        'id_paciente',
    ];
    public function doctor(){
        return $this->belongsTo(MntDoctor::class,'id_doctor');
    }
    public function paciente(){
        return $this->belongsTo(MntPaciente::class,'id_paciente');
    }
}
