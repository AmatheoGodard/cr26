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
        ]);

        $college = College::create($validated);

        return redirect()->back()->with('success', 'Collège créé avec succès !');
    }
}
