<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Client::all();
        $clients = array(); 

        if(request()->isJson())
        {
            for ($i=0; $i <count($client) ; $i++): 
                array_push($clients,$client[$i]->user);
            endfor;
            return response()->json($clients);
        }
        else
        {
            return response()->json("Unauthorized",401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        if(request()->isJson()):
            return response()->json($client->user);
        else:
            return response()->json("Unauthorized",401);
        endif;
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $headersAccess = $request->headers->get('Content-Type');

        if($headersAccess == "application/json" || "multipart/form-data"):

            $request->validate([
                'user_id'=>'required'
            ]);

            Client::create($request->all());
            return response()->json("Cliente agregado correctamente!",201);
        else:
            return response()->json("Unauthorized",401);
        endif;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Client $client)
    {
        $headersAccess = $request->headers->get('Content-Type');

        if($headersAccess == "application/json" || "multipart/form-data"):

            $request->validate([
                'user_id'=>['required']
            ]);
            try
            {
                if($client->update($request->all())):
                    return response()->json("Cliente modificado correctamente!");
                else:
                    return response()->json("Error al modificar el cliente",500);
                endif;
            }
            catch(\PDOException $e)
            {
                if(strcmp($e->getCode(),'23000') === 0)
                {
                    return response()->json('Usuario al que desea corresponder no existe',500);
                }
                return response()->json("Error en la transacción",500);
            }
        else:
            return response()->json("Unauthorized",401);
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Client $client)
    {
        if(request()->isJson()):
            if($client->delete()):
                return response()->json("Cliente eliminado!");
            else:
                return response()->json("Error al eliminar el cliente!",500);
            endif;
        else:
            return response()->json('Unauthorized',401);
        endif;
    }
}


