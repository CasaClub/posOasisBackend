<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->isJson()):
            return json_encode(Product::all(),200);
        else:
            return response()->json("Unauthorized",401);
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(request()->isJson()):
            return response()->json(Product::find($id),200);
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
       
        $typeRequest = $request->headers->get('Content-Type'); //  obtenemos lo que vengan en los headers

        if($typeRequest == "application/json" || "multipart/form-data"):

            request()->validate([
                'name'=>'required|unique:products,name',
                'internal_code'=>'required|unique:products,internal_code'
            ]);   // si no paso la validacion se detendra y retornara status 500
            
            Product::create(request()->all());
            return response()->json("Producto guardado correctamente!",201);

        else:
            return response()->json("Unauthorized, request is not json",401);
        endif;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $typeRequest = $request->headers->get('Content-Type'); 

        if($typeRequest == "application/json" || "multipart/form-data"):
            request()->validate([
                'name'=>'required'
            ]);

        else:

        endif;
    }

    /**
     * Remove the specified resource from storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        // if():

        // else:

        // endif;
    }
}
