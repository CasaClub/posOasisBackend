<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cashReport;
use App\Models\User;

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
         * debe ser unicamente un admin o cajero: listo
         * donde empieza debe ser menor que donde termina
         */
      
         $roleUser = User::where('id',$request->user_id)->get(['role_id']);
         $role_id = $roleUser[0]->role_id;

         if($role_id == 1 || $role_id == 2):

            if($request->start_report<$request->end_report):
                return response()->json('Todo esta bien par guardar',201);
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
