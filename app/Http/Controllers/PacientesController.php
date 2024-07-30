<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pacientes;

class PacientesController extends Controller
{
    public function listaPacientes()
    {
        $data = [
            'data' => Pacientes::all(),
            'status' => 200
        ];
        
        return response()->json($data, 200);
    }
}
