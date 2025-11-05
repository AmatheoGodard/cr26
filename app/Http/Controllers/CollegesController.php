<?php

namespace App\Http\Controllers;

use App\Models\College;
use Illuminate\Http\Request;

class CollegesController extends Controller
{
    public function createCollege(Request $request)
    {
        $validated = $request->validate([
            'code' => 'nullable|string|max:10',
            'nom' => 'required|string|max:100',
            'adr_ligne_1' => 'nullable|string|max:50',
            'adr_ligne_2' => 'nullable|string|max:50',
            'adr_lieu' => 'nullable|string|max:50',
            'adr_code_postal' => 'nullable|string|max:10',
            'adr_ville' => 'nullable|string|max:50',
            'adr_region' => 'nullable|string|max:50',
            'commentaire' => 'nullable|string|max:250',
            'code_pays' => 'required|string|max:5',
        ]);
        $validated['code_pays'] = strtoupper($validated['code_pays']);
        $validated['nom'] = strtoupper($validated['nom']);
        $validated['adr_ligne_1'] = strtoupper($validated['adr_ligne_1']);
        $validated['adr_ligne_2'] = strtoupper($validated['adr_ligne_2']);
        $validated['adr_lieu'] = strtoupper($validated['adr_lieu']);
        $validated['adr_ville'] = strtoupper($validated['adr_ville']);
        $validated['adr_region'] = strtoupper($validated['adr_region']);
        $validated['commentaire'] = strtoupper($validated['commentaire']);
        $validated['adr_code_postal'] = strtoupper($validated['adr_code_postal']);
        $validated['adr_ville'] = strtoupper($validated['adr_ville']);
        $validated['adr_region'] = strtoupper($validated['adr_region']);
        $validated['code_pays'] = strtoupper($validated['code_pays']);

        $db = College::create($validated);
        $db->save();

        return redirect()->back()->with('success', 'Collège créé avec succès !');
    }

    public function listColleges($colleges)
    {
        return view('listeCollege', ['colleges' => $colleges]);
    }
}
