<?php

namespace App\Http\Controllers;

use App\Models\Encadrement;
use Illuminate\Http\Request;

class EncadrementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Encadrement::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Encadrement::create($request->all())) {
            return response()->json([
                'succes'=>'Encadrement bien enregistre'
            ]);
        } else {
            return response()->json([
                'echec'=>'Echec de l\'enregistrement de l\'encadrement'
            ]);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Encadrement  $encadrement
     * @return \Illuminate\Http\Response
     */
    public function show(Encadrement $encadrement)
    {
        return $encadrement;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Encadrement  $encadrement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Encadrement $encadrement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Encadrement  $encadrement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Encadrement $encadrement)
    {
        $retVal = ($encadrement->delete()) ? "Supression reussi" : "Echec de la supression";
        return response()->json([
            'message'=>$retVal
        ]);
    }
}
