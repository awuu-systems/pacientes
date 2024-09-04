<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MntDoctor extends Model
{
    use HasFactory;
    protected $table = "mnt_doctor";
     protected $fillable = [
        'id_especialidad',
        'id_usuario'
     ];
     
     public function especialidad (){
        return $this->belongsTo(CtlEspecialidad::class,'id_especialidad');
     }
     public function usuario (){
        return $this->belongsTo(User::class,'id_usuario');
     }
}
