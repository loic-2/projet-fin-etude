<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\CategorieProjet;
use App\Models\Encadrement;
use App\Models\Encadreur;
use App\Models\Historique;
use App\Models\Membre;
use App\Models\Projet;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request["value"]) {
            if($request["value"]=="PFE"){
                return Projet::where('TYPE_PROJET','PFE')->get();
            }else{
                return Projet::where('TYPE_PROJET','Memoire')->get();
            }
        } else {
            return Projet::all();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        DB::beginTransaction();
        try {
            if($request->hasFile('projet')){
                $path= $request->file('projet')->store('projets');
                $datas=$request->all();
                $datas['LIEN_FICHIER_PROJET']=$path;    
                $name= $request->input('NOM_PROJET');
                if (Projet::create($datas)) {
                    //recuperer l'id du projet inserer
                    $id = Projet::where('NOM_PROJET',$name)->get()->first();
                    DB::commit();
                    $user_credential=Auth::user();
                    Historique::create(['id'=>$user_credential['id'],
                    'ACTION_HISTORIQUE'=>'Ajout d\'une nouvelle archive']);
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
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'echec'=>"Une erreur s'est produite, veillez resseayez plustard",
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
        $categories1= CategorieProjet::where('ID_PROJET',$projet->ID_PROJET)->get();
        $categories=$request->collect('categories');
        DB::beginTransaction();
        try{
            if ($categories1->count() >0) {
                foreach ($categories1 as $value) {
                    CategorieProjet::where('ID_PROJET',$value->ID_PROJET)->where('ID_CATEGORIE',
                    $value->ID_CATEGORIE)->delete();
                }
            }
            foreach ($categories as $value) {   
                $value['ID_PROJET']=$projet['ID_PROJET'];
                CategorieProjet::create($value);
            }
            $projet->update($request->input('projet'));
            DB::commit();
            $user_credential=Auth::user();
                    Historique::create(['id'=>$user_credential['id'],
                    'ACTION_HISTORIQUE'=>'Modification d\'une archive']);
            return response()->json([
                'succes'=>'Projet bien modifier'
                ]);
        }catch(\Throwable $th){
            DB::rollBack();
            return response()->json([
                'echec'=>'Echec de la modification'
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
        $categories= CategorieProjet::where('ID_PROJET',$projet->ID_PROJET)->get();
        $membres=Membre::where('ID_PROJET',$projet->ID_PROJET)->get();
        $encadreurs=Encadrement::where('ID_PROJET',$projet->ID_PROJET)->get();
        
            DB::beginTransaction();
            try {
                if ($categories->count() >0) {
                    foreach ($categories as $value) {
                        CategorieProjet::where('ID_PROJET',$value->ID_PROJET)->where('ID_CATEGORIE',
                        $value->ID_CATEGORIE)->delete();
                    }
                }
                if ($membres->count() >0) {
                    foreach ($membres as $value) {
                        Membre::where('ID_PROJET',$value->ID_PROJET)->delete();
                    }
                }
                
                if ($encadreurs->count() >0) {
                    foreach ($encadreurs as $value) {
                        Encadrement::where('ID_PROJET',$projet->ID_PROJET)->where('ID_ENCADREUR',
                        $value->ID_ENCADREUR)->delete();
                    }
                }

                $retVal = ($projet->delete()) ? "Supression reussi" : "Echec de la supression";
                DB::commit();
                $user_credential=Auth::user();
                    Historique::create(['id'=>$user_credential['id'],
                    'ACTION_HISTORIQUE'=>'Suppression d\'une archive']);
                return response()->json([
                    'message'=>$retVal
                ]);
            } catch (\Throwable $th) {
                DB::rollBack();
                return response()->json([
                    'echec'=>'Une erreur c\'est produite veillez essayez plus tard'
                ]);
            }
    }
    /**
     * Search Projet
     * 
     */
    public function search(Request $request){
        $value=$request->input('valeur');
        $column=$request->input('colonne');
        $listToReturn=array();
        if (isset($column) && !empty($column)) {
            switch ($column) {
                case 'categorie':
                    $categories= Categorie::where('NOM_CATEGORIE','like','%'.$value.'%')->get();
                    foreach ($categories as $categorie) {
                        $projets= $categorie->projets;
                        foreach ($projets as $projet) {
                            if (!in_array($projet,$listToReturn)) {
                                array_push($listToReturn,$projet);
                            }
                        }
                    }
                    break;
    
                case 'encadreur':
                    $encadreurs= Encadreur::where('NOM_ENCADREUR','like','%'.$value.'%')->get();
                    foreach ($encadreurs as $encadreur) {
                        $projets= $encadreur->projets;
                        foreach ($projets as $projet) {
                            if (!in_array($projet,$listToReturn)) {
                                array_push($listToReturn,$projet);
                                }
                        }
                    }
                        break;
                    
                case 'membre':
                    $membres= Membre::where('NOM_MEMBRE','like','%'.$value.'%')->get();
                    foreach ($membres as $membre) {
                        $projet= $membre->projet;
                        if (!in_array($projet,$listToReturn)) {
                            array_push($listToReturn,$projet);
                            }
                    }
                    break;
    
                case 'projet':
                    $listToReturn= Projet::where('NOM_PROJET','like','%'.$value.'%')->get();
                    break;
                
                default:
                    # code...
                    break;
            }
        } else {
            $listToReturn= Projet::where('NOM_PROJET','like','%'.$value.'%')->get();
        }
        
        return $listToReturn;
    }

    /**
     * Obtenir les projets les plus vues
     */
    public function projetsPlusVue(Request $request){

        $nombre=$request->input('nombre');
        if (isset($nombre) && !empty($request->input('nombre'))) {
            return Projet::select()->orderByDesc('VUE_PROJET')->limit($request->input('nombre'))
            ->get();
        } else {
            return Projet::select()->orderByDesc('VUE_PROJET')->get();
        }
        
    }

    /**
     * Obtenir les projets les plus telecharger
     */
    public function projetsPlusTelecharger(Request $request){

        $nombre=$request->input('nombre');
        if (isset($nombre) && !empty($request->input('nombre'))) {
            return Projet::select()->orderByDesc('TELECHARGEMENT_PROJET')->
            limit($request->input('nombre'))->get();
        } else {
            return Projet::select()->orderByDesc('TELECHARGEMENT_PROJET')->get();
        }
        
    }
}
