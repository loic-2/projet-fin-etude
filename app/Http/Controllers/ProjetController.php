<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Projet::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        if($request->hasFile('projet')){
            $path= $request->file('projet')->store('projets');
            $datas=$request->all();
            $datas['LIEN_FICHIER_PROJET']=$path;    
            $name= $request->input('NOM_PROJET');
            if (Projet::create($datas)) {
                //recuperer l'id du projet inserer
                $id = Projet::where('NOM_PROJET',$name)->get()->first();
                return response()->json([
                    'succes'=>'Projet bien enregistrer',
                    'id'=>$id->ID_PROJET
                ]);
            }else{
                return response()->json([
                    'echec'=>"l'enregistrement n'a pas reussi"
                ]);
            }
        }else{
            return response()->json([
                'echec'=>"Aucun fichier envoye",
                'res' => $request->all()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function show(Projet $projet)
    {
        return $projet;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projet $projet)
    {
        if ($projet->update($request->all())) {
            return response()->json([
                'succes'=>'Projet bien enregistrer'
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
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projet $projet)
    {
        $retVal = ($projet->delete()) ? "Supression reussi" : "Echec de la supression";
        return response()->json([
            'message'=>$retVal
        ]);
    }
}
