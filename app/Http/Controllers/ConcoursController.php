<?php

namespace App\Http\Controllers;

use App\Models\Concours;
use Illuminate\Http\Request;

class ConcoursController extends Controller
{
    // 1. Liste des concours
    public function index()
    {
        $concours = Concours::all();
        return view('admin.concours.index', compact('concours'));
    }

    // 2. Afficher le formulaire d'ajout
    public function create()
    {
        return view('admin.concours.create');
    }

    // 3. Enregistrer un nouveau concours
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|max:100',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'equipe_min' => 'required|integer|min:1',
            'equipe_max' => 'required|integer|gte:equipe_min',
        ]);

        // Gestion des checkbox (actif/en_cours)
        $data = $request->all();
        $data['actif'] = $request->has('actif') ? 1 : 0;
        $data['en_cours'] = $request->has('en_cours') ? 1 : 0;

        Concours::create($data);

        return redirect()->route('concours.index')->with('success', 'Concours créé avec succès !');
    }
}