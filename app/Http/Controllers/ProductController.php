<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
            return json_encode(Product::all());
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
            return response()->json(Product::findOrFail($id));
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
        $headersAccess = $request->headers->get('Content-Type'); //  obtenemos lo que vengan en los headers

        if($headersAccess == "application/json" || "multipart/form-data"):
            
            $request()->validate([
                'name'=>'required|unique:products,name',
                'internal_code'=>'required|unique:products,internal_code'
            ]);   // si no paso la validacion se detendra y retornara status 200 sin realizar ningun cambio
            
            Product::create($request()->all());
            return response()->json("Producto guardado correctamente!",201);
                
        else:
            return response()->json("Unauthorized, request is not json or form-data",401);
        endif;
    }

 
    public function update(Request $request, Product $product)
    {
      
        $headersAccess = $request->headers->get('Content-Type'); 

        if($headersAccess == "application/json" || "multipart/form-data")
        {

            // dd($request); // solo los recoge por parametro
            $data = $request->validate([
                'name'=>'required',
                'internal_code'=>['required', Rule::unique('products')->ignore($product->id)], // mismo codigo interno del producto lo ignora, pero si es uno que ya esta nos devuelve error
                'price_cost'=>'required',
                'price_sale'=>'required',
                'stock'=>'required',
                'wholesalers_price'=>'',
                'taxes'=>'',
                'description'=>'',
                'status'=>''
            ]);
            
            if($product->update($data)):
                return response()->json('Producto modificado correctamente');
            else:
                return response()->json('Error al modificar el producto',500);
            endif;
        }
        else
        {
            return response()->json('Unauthorized',401);
        }        
    }

    /**
     * Remove the specified resource from storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function delete(Product $product)
    {
       if(request()->isJson()):
            if($product->delete()):
                return response()->json("Producto eliminado!");
            else:
                return response()->json("Error al eliminar el producto!",500);
            endif;
       else:
        return response()->json('Unauthorized',401);
       endif;
    }
}
