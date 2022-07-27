<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request['connecte']) {
            return User::where('CONNECTED',1)->get();
        } else {
            return User::all();
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
        User::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
    }

    public function search(Request $request){
        $caractere= $request->input('valeur');
        $mode=$request->input('mode');
        if (isset($mode) && !empty($mode)) {
            return User::where($mode,'like','%'.$caractere.'%')->get();
        }else{
            return User::where('name','like','%'.$caractere.'%')->orwhere('NOM_ADMINISTRATEUR','like','%'.$caractere.'%')
            ->orwhere('email','like','%'.$caractere.'%')->get();
        }
    }
}
