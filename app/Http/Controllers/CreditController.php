<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\credit;
use Illuminate\Validation\Rule;

class CreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $credits = credit::all()->where('status',1);
        $creditArray = [];
        
        foreach ($credits as $value) { // hacemos un objeto con los detalles del cliente y su credito
           $info =[
               'id'=>$value->id,
               'name'=> $value->client->user->name,
               'surnames'=> $value->client->user->surnames,
               'dni'=> $value->client->user->dni,
               'telephone'=> $value->client->user->telephone,
               'max'=>$value->max,
               'balance'=>$value->balance
           ]; 
           array_push($creditArray,$info);
        }
        return response()->json($creditArray);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(credit $credit)
    {
        dd($credit);
       // validar si es json
        $detail = [
            'id'=>$credit->id,
            'name'=> $credit->client->user->name,
            'surnames'=> $credit->client->user->surnames,
            'dni'=> $credit->client->user->dni,
            'telephone'=> $credit->client->user->telephone,
            'max'=>$credit->max,
            'balance'=>$credit->balance
        ];
        return response()->json($detail);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_id'=>'required',
            'max'=>'required',
            'balance'=>'required',
            'status'=>''
        ]); /// validamos que trae datos
    
       try
       {
            if($request->max < $request->balance):
                return response()->json('El credito maximo es menor que total de los articulos',500);
            else:
                if(credit::create($request->all())){
                    return response()->json("Credito creado correctamente!",201);
                }
                return response()->json('Fallo al crear credito, intente de nuevo',500);
            endif;
        }
        catch(\PDOException $e)
        {
            $info= $e->getMessage(); //obtenemos el msg
            $code = substr($info,49,4); // aca deberiamos sacar el codigo de error sql

            if($code == 1062)
            {
                return response()->json('Este cliente ya tiene un credito',500);
            }
            else
            {
                return response()->json('Error en la creacion del credito',500);
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  credit  $credit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, credit $credit)
    {
       // en el frontend se debe validar que el usuario no pueda modificar el cliente solo el max, balance, status
        $dataCredit = $request->validate([
            'client_id'=>['required',Rule::unique('credits')->ignore($credit->id)],
            'max'=>'required',
            'balance'=>'required',
            'status'=>''
        ]); 
        
        if($request->max < $request->balance):
            return response()->json('El credito maximo es menor que total de los articulos',500);
        else:
            if($credit->update($dataCredit)){
                return response()->json("Credito modificado correctamente!");
            }
            return response()->json('Fallo al modificar credito, intente de nuevo',500);
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(credit $credit)
    {
        if(request()->isJson()):
            if($credit->delete()):
                return response()->json('Credito eliminado');
            else:
                return response()->json('Error al eliminar el credito',500);
            endif;
        else:
            return response()->json('Unauthorized',401);
        endif;   
    }
}
