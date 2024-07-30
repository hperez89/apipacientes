<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    use HasFactory;

    protected $table = 'paciente';
    protected $fillable = [
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'mail_paciente',
        'fecha_inscripcion'
    ];
}
