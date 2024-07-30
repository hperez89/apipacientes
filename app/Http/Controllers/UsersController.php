<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Users;

class UsersController extends Controller
{
    public function listUser()
    {
        $data = [
            'data' => Users::all(),
            'status' => 200
        ];
        
        return response()->json($data, 200);
    }

    public function add(Request $request)
    {
        $validador = Validator::make($request->all(),[
            'user' => 'required|max:100',
            'name_user' => 'required|max:100',
            'mail_user' => 'required|email|max:200',
            'passwd_user' => 'required|max:300'
        ]);

        if($validador->fails()){
            $data = [
                'message' => 'Error en la validación de los datos',
                'errordetail' => $validador->errors(),
                'status' => 400
            ];
            
            return response()->json($data, 400);
        }

        $usuario = Users::create([
            'user' => $request->user,
            'name_user' => $request->name_user,
            'mail_user' => $request->mail_user,
            'passwd_user' => $request->passwd_user,
        ]);

        if(!$usuario){
            $data = [
                'message' => 'Error al crear el usuario',
                'status' => 500
            ];
            
            return response()->json($data, 500);
        }

        $data = [
            'data' => $usuario,
            'status' => 200
        ];
        
        return response()->json($data, 200);
    }

    public function showUser($id)
    {
        $usuario = Users::where("idusers", $id)->first();

        if(!$usuario)
        {
            $data = [
                'data' => [],
                'status' => 404
            ];
            
            return response()->json($data, 404);
        }
        $data = [
            'data' => $usuario,
            'status' => 200
        ];
        
        return response()->json($data, 200);
    }

    public function deleteUser($id)
    {
        $usuario = Users::where("idusers", $id)->first();
        if(!$usuario)
        {
            $data = [
                'data' => 'Usuario no encontrado',
                'status' => 404
            ];
            
            return response()->json($data, 404);
        }

        $usuario->delete();
        $data = [
            'data' => 'Usuario Eliminado',
            'status' => 200
        ];
        
        return response()->json($data, 200);
    }

    public function updateUser(Request $request, $id)
    {
        $usuario = Users::where("idusers", $id)->first();
        if(!$usuario)
        {
            $data = [
                'data' => '',
                'status' => 404
            ];
            
            return response()->json($data, 404);
        }

        $validador = Validator::make($request->all(),[
            'user' => 'required|max:100',
            'name_user' => 'required|max:100',
            'mail_user' => 'required|email|max:200',
            'passwd_user' => 'max:300'
        ]);

        if($validador->fails()){
            $data = [
                'message' => 'Error en la validación de los datos',
                'errordetail' => $validador->errors(),
                'status' => 400
            ];
            
            return response()->json($data, 400);
        }

        $usuario->user = $request->user;
        $usuario->name_user = $request->name_user;
        $usuario->mail_user = $request->mail_user;
        if($request->has('passwd_user'))
        {
            $usuario->passwd_user = $request->passwd_user;
        }
        

        $usuario->save();
        $data = [
            'data' => $usuario,
            'status' => 200
        ];
        
        return response()->json($data, 200);
    }

}
