<?php

namespace App\Http\Controllers;

use App\Models\Historique;
use Illuminate\Http\Request;

class HistoriqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request["historique"]) {
            switch ($request['historique']) {
                case 'ajout':
                    $result= Historique::where('ACTION_HISTORIQUE','like','%Ajout%')
                    ->orderByDesc("DATE_HISTORIQUE")->get();
                    foreach ($result as $historique) {
                        $historique['administrateur']= $historique->administrateur();
                    }
                    break;
                case 'modification':
                    $result= Historique::where('ACTION_HISTORIQUE','like','%Modification%')
                    ->orderDesc("DATE_HISTORIQUE")->get();
                    foreach ($result as $historique) {
                        $historique['administrateur']= $historique->administrateur();
                    }
                    break;
                case 'suppression':
                    $result= Historique::where('ACTION_HISTORIQUE','like','%Suppression%')
                    ->orderByDesc("DATE_HISTORIQUE")->get();
                    foreach ($result as $historique) {
                        $historique['administrateur']= $historique->administrateur();
                    }
                    break;
                case 'Lecture':
                    $result= Historique::where('ACTION_HISTORIQUE','like','%Lecture%')
                    ->orderByDesc("DATE_HISTORIQUE")->get();
                    foreach ($result as $historique) {
                        $historique['administrateur']= $historique->administrateur();
                    }
                    break;    
                default:
                    # code...
                    break;
            }
        } else {
            $result= Historique::orderByDesc("DATE_HISTORIQUE")->get();
                    foreach ($result as $historique) {
                        $historique['administrateur']= $historique->administrateur();
                    }
        }
        
        return $result;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Historique::create($request->all())) {
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
     * @param  \App\Models\Historique  $historique
     * @return \Illuminate\Http\Response
     */
    public function show(Historique $historique)
    {
        return $historique;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Historique  $historique
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Historique $historique)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Historique  $historique
     * @return \Illuminate\Http\Response
     */
    public function destroy(Historique $historique)
    {
        //
    }
}
