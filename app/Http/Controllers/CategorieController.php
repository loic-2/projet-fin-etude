<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories= Categorie::orderByDesc('ID_CATEGORIE')->get();
        foreach ($categories  as $categorie) {
            $number=$categorie->projets();
            $categorie["NOMBRE_PROJET"]=$number->count();
        }
        echo $categories->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Categorie::create($request->all())) {
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
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        return $categorie;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorie $categorie)
    {
        if ($categorie->update($request->all())) {
            return response()->json([
                'succes'=>'Modification de la categorie bien enregistrer'
            ]);
        }else{
            return response()->json([
                'echec'=>"la modification n'a pas reussi"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $categorie)
    {
        $retVal = ($categorie->delete()) ? "Supression reussi" : "Echec de la supression";
        return response()->json([
            'message'=>$retVal
        ]);
    }


    public function search(Request $request){
        $valeur= $request->input("valeur");
        $result= Categorie::where("NOM_CATEGORIE","like",'%'.$valeur.'%')->orderByDesc('ID_CATEGORIE')
        ->get();
        foreach ($result  as $categorie) {
            $number=$categorie->projets();
            $categorie["NOMBRE_PROJET"]=$number->count();
        }
        echo $result->toJson(JSON_PRETTY_PRINT);
    }
}
