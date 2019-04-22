<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use League\Flysystem\Exception;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->user = $this->user::all(); // obtenemos todos los usuarios
        $userArray = [];
        
        foreach ($this->user as $value):
            $userInfo = [
                "id"=>$value->id,
                "name" => $value->name,
                "surnames" => $value->surnames,
                "dni" => $value->dni,
                "telephone" => $value->telephone,
                "direction" => $value->direction,
                "email" => $value->email,
                "role_id" => $value->role->name,
            ];
            array_push($userArray,$userInfo);
        endforeach;

        return response()->json($userArray);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $userInfo = [
            "id"=>$user->id,
            "name" => $user->name,
            "surnames" => $user->surnames,
            "dni" => $user->dni,
            "telephone" => $user->telephone,
            "direction" => $user->direction,
            "email" => $user->email,
            "role_id" => $user->role->name,
        ];

        return response()->json([$user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,User $user)
    {

        // $user = $request->all();
        
        try
        {
            $user = $request->validate([
                'name'=>'required',
                'surnames'=>'required',
                'dni'=>'required',
                'telephone'=>'',
                'direction'=>'',
                'email'=>['required','unique:users,email'],
                'role_id'=>'required',
                'password'=>'',
            ]);
            
           if(User::create($user)):
                return response()->json('Usuario creado correctamente!');
           else:
                return response()->json('Fallo al crear el usuario!',500);
           endif;
        } 
        catch (\PDOException $e) 
        {
            $info= $e->getMessage(); //obtenemos el msg
            $code = substr($info,49,4); // aca deberiamos sacar el codigo de error sql
            if($code == 1062):
                return response()->json('Este email no puede ser utilizado!',500);
            else:   
                return response()->json('Error en la creacion del usuario',500);
            endif;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        try
        {
            $userData = $request->validate([
                'name'=>'required',
                'surnames'=>'required',
                'dni'=>'required',
                'telephone'=>'',
                'direction'=>'',
                'email'=>['required',Rule::unique('users')->ignore($user->id)], // mejorar aca, se puede ignorar de otra manera como sabiemdo si es el mismo y con unset lo quitamos y si es diferente que tire el error
                'role_id'=>'required',
                'password'=>'',
            ]);
            
           if($user->update($userData)):
                return response()->json('Usuario modificado correctamente!');
           else:
                return response()->json('Fallo al modificar el usuario!',500);
           endif;
        } 
        catch (\PDOException $e) 
        {
            $info= $e->getMessage(); //obtenemos el msg
            $code = substr($info,49,4); // aca deberiamos sacar el codigo de error sql
            if($code == 1062):
                return response()->json('Este email no puede ser utilizado!',500);
            else:   
                return response()->json('Error en la creacion del usuario',500);
            endif;
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(User $user)
    {
        try 
        {
            if($user->delete()):
                return response()->json('Usuario eliminado correctamente!');
            else:
                return response()->json('Error al eliminar este usuario');
            endif;
        } 
        catch (\PDOException | Exception $e) 
        {
            $e->getMessage();
        }
    }
}
