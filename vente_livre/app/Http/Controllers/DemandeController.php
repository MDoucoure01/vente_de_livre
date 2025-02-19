<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $demande = Demande::all();
        return $demande;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->user_id;
        $validator = Validator::make($request->all(), [
            'titre_livre' => 'required',
            'description' => 'required',
        ]);

        if($validator->fails()){
            return Response(['message' => $validator->errors()],401);
        }

        $demande = Demande::create([
            "user_id" => $request->user_id,
            "description" => $request->description,
            "titre_livre" => $request->titre
        ]);
        return $demande;
    }

    /**
     * Display the specified resource.
     */
    public function show(Demande $demande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Demande $demande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Demande $demande)
    {
        //
    }

    public function supprimerCommentaire(Request $request){
        Demande::find($request->id)->delete();
        return ["message" => "suppression Effectue"];
    }
}
