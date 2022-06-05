<?php

namespace App\Http\Controllers;

use App\Models\CategorieProjet;
use Illuminate\Http\Request;

class CategorieProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CategorieProjet::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (CategorieProjet::create($request->all())) {
            return response()->json([
                'succes'=>'CategorieProjet bien enregistre'
            ]);
        } else {
            return response()->json([
                'echec'=>'Echec de l\'enregistrement de la categorie de projet'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategorieProjet  $categorieProjet
     * @return \Illuminate\Http\Response
     */
    public function show(CategorieProjet $categorieProjet)
    {
        return $categorieProjet;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategorieProjet  $categorieProjet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategorieProjet $categorieProjet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategorieProjet  $categorieProjet
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategorieProjet $categorieProjet)
    {
        $retVal = ($categorieProjet->delete()) ? "Supression reussi" : "Echec de la supression";
        return response()->json([
            'message'=>$retVal
        ]);
    }
}
