<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

$date = date('Y-m-d H:i:s');
$caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$token = substr(str_shuffle($caracteres_permitidos), 0, 100);

class UsersController extends Controller
{
    public function verifyExistUser($data){
        $users = new Users;  
        $response = $users::find($data);
        return $response;
    }

    public function crearUsuario(Request $request){
        
        try {
            $response = Users::find($data);
            
            if(!$response){
             
                try {
                    $arr = [
                        'name' => $request->name,
                        'email' => $request->email,
                        'email_verified_at' => $date,
                        'password' => Hash::make($request->password),
                        'remember_token' => $token
                    ];

                    $create = Users::create($arr);
                    $idClient =  $create->id;
                    
                    return $idClient;

                } catch (\Throwable $th) {
                    throw $th;
                }
            }

            
        } catch (\Throwable $th) {
            throw $th;   
        }


        return $request->all();
    }

}
