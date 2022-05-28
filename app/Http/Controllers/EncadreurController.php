<?php

namespace App\Http\Controllers;

use App\Models\Encadreur;
use Illuminate\Http\Request;

class EncadreurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Encadreur::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Encadreur::create($request->all())) {
            return response()->json([
                'succes'=>'Categorie bien enregistrer'
            ]);
        }else{
            return response()->json([
                'echec'=>"l'enregistrement n'a pas reussi"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Encadreur  $encadreur
     * @return \Illuminate\Http\Response
     */
    public function show(Encadreur $encadreur)
    {
        return $encadreur;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Encadreur  $encadreur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Encadreur $encadreur)
    {
        if ($encadreur->update($request->all())) {
            return response()->json([
                'succes'=>'Categorie bien enregistrer'
            ]);
        }else{
            return response()->json([
                'echec'=>"l'enregistrement n'a pas reussi"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Encadreur  $encadreur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Encadreur $encadreur)
    {
        $retVal = ($encadreur->delete()) ? "Supression reussi" : "Echec de la supression";
        return response()->json([
            'message'=>$retVal
        ]);
    }
}
