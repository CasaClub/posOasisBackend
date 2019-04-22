<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cashReport;
use App\Models\User;
use PHPUnit\Framework\Exception;

class CashReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cashReport = cashReport::all();
        $cashReportArray = [];
        foreach ($cashReport as $value):
            $cashReportInfo = [
                'user'=> $value->user->name,
                'start_report'=>$value->start_report,
                'end_report'=>$value->end_report,
                'effective'=>$value->effective,
                'dataphone'=>$value->dataphone
            ];
            array_push($cashReportArray,$cashReportInfo);
        endforeach;
        
        return response()->json($cashReportArray);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(cashReport $cashReport)
    {
        
        $cashReportInfo = [
            'user'=> $cashReport->user->name,
            'role'=> $cashReport->user->role->name,
            'start_report'=>$cashReport->start_report,
            'end_report'=>$cashReport->end_report,
            'effective'=>$cashReport->effective,
            'dataphone'=>$cashReport->dataphone
        ];

        return response()->json($cashReportInfo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         * Mientras las validaciones sean mas robustas hay menos posiblidades de fallos
         * asi las validaciones sean en las 2 partes: frontend y backend
         * 
         * Debe de coger de los workshift dicha tabla parece se necesita este actualizada , 
         */
        
    
         $roleUser = User::where('id',$request->user_id)->get(['role_id']); // obtenemos al usuario que hace el cierre de caja
         $role_id = $roleUser[0]->role_id; // sacamos su role para verificar que estrictamente sea  cashier o admin

         if($role_id == 1 || $role_id == 2):

            if($request->start_report<$request->end_report):
                if(cashReport::create($request->all())):
                    return response()->json('Cierre de caja realizado',201);
                else:
                    return response()->json('No se puede realizar el cierre de caja, intente de nuevo',500);
                endif;
            else:
                return response()->json('Error la fecha de inicio es mayor a la de finalizacion',500);
            endif;
         else:
            return response()->json('El cierre de caja no puede ser realizado por un cliente',500);
         endif;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cashReport $cashReport)
    {
        $data = $request->validate([
            'user_id'=>'required',
            'start_report'=>'required',
            'end_report'=>'required',
            'effective' =>'required',
            'dataphone' =>'required'
        ]);
        
        $roleUser = User::where('id',$request->user_id)->get(['role_id']);
        $role_id = $roleUser[0]->role_id; 

        try 
        {
            if($role_id == 1): // solo un admin puede modificar
                if($request->start_report<$request->end_report):
                    if($cashReport->update($data)):
                        return response()->json('Cierre de caja actualizado',201);
                    else:
                        return response()->json('No se puede realizar el cierre de caja, intente de nuevo',500);
                    endif;
                else:
                    return response()->json('Error la fecha de inicio es mayor a la de finalizacion',500);
                endif;
            else:
                return response()->json('El cierre de caja no puede ser modificado por un cajero',500);
            endif;
        } 
        catch(\PDOException | Exception $e) 
        {
           return response()->json(["Error"=>$e->getMessage().", Code: ".$e->getCode()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(cashReport $cashReport)
    {
        
    }
}
