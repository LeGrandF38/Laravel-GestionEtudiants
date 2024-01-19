<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filiere;


class FiliereController extends Controller
{
    public function index()
    {
        $filieres = Filiere::all();
        return view('filiere.index', compact('filieres'));
    }

   
    public function create()
    {
        return view('filiere.form');
    }

   
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        Filiere::create($request->all());
        return redirect()->to('/filieres')->with('success', 'Filière ajoutée avec succès.');
    }

   
    public function show($id)
    {
        $filiere = Filiere::findOrFail($id);
        return view('filiere.show', compact('filiere', 'id'));
    }

   
    public function edit($id)
    {
        $filiere = Filiere::findOrFail($id);
        return view('filiere.form', compact('filiere', 'id'));
    }

   
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        $filiere = Filiere::findOrFail($id);
        $filiere->update($request->all());

        return redirect()->to('/filieres')->with('success', 'Filière mise à jour avec succès.');
    }

    
    public function destroy($id)
    {
        $filiere = Filiere::findOrFail($id);
        $filiere->delete();

        return redirect()->to('/filieres')->with('success', 'Filière supprimée avec succès.');
    }
}
