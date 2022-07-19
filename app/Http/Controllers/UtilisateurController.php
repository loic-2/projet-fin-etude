<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->all()!=null) {
            $login=$request->input('LOGIN_UTILISATEUR');
            $mdp= $request->input('MOT_DE_PASSE_UTILISATEUR');
            $res= Utilisateur::where('LOGIN_UTILISATEUR',$login)->where('MOT_DE_PASSE_UTILISATEUR',
            $mdp)->get();
            if ($res->count()==1) {
                return response()->json(['message'=>'succes','user'=>$res]);
            } else {
                return response()->json(['message'=>'error']);
            }
            
        } else {
            return Utilisateur::all();
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
        if (Utilisateur::where('LOGIN_UTILISATEUR',$request->input('LOGIN_UTILISATEUR'))->
        where('MOT_DE_PASSE_UTILISATEUR',$request->input('MOT_DE_PASSE_UTILISATEUR'))->get()
        ->count() > 0) {
           return response()->json(['message'=>'A user whit those credentials already exists']);
        } else {
            if (Utilisateur::create($request->all())) {
                return response()->json([
                    'message'=>'success'
                ]);
            }else{
                return response()->json([
                    'message'=>"error"
                ]);
            }
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Utilisateur  $utilisateur
     * @return \Illuminate\Http\Response
     */
    public function show(Utilisateur $utilisateur)
    {
        return $utilisateur;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Utilisateur  $utilisateur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Utilisateur $utilisateur)
    {
        if ($utilisateur->update($request->all())) {
            return response()->json([
                'message'=>'success'
            ]);
        }else{
            return response()->json([
                'message'=>"error"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Utilisateur  $utilisateur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Utilisateur $utilisateur)
    {
        $retVal = ($utilisateur->delete()) ? "Supression reussi" : "Echec de la supression";
        return response()->json([
            'message'=>$retVal
        ]);
    }
}
