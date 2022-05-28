<?php

namespace App\Http\Controllers;

use App\Models\Administrateur;
use Illuminate\Http\Request;

class AdministrateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Administrateur::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Administrateur::create($request->all())) {
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
     * @param  \App\Models\Administrateur  $administrateur
     * @return \Illuminate\Http\Response
     */
    public function show(Administrateur $administrateur)
    {
        return $administrateur;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Administrateur  $administrateur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Administrateur $administrateur)
    {
        if ($administrateur->update($request->all())) {
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
     * @param  \App\Models\Administrateur  $administrateur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Administrateur $administrateur)
    {
        $retVal = ($administrateur->delete()) ? "Supression reussi" : "Echec de la supression";
        return response()->json([
            'message'=>$retVal
        ]);
    }
}
