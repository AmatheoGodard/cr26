<?php

namespace App\Http\Controllers;

use App\Models\Pays; 
use Illuminate\Http\Request;

class PaysController extends Controller
{
    /**
     * 1. Affiche la liste de tous les pays
     * Lié à la route : pays.list (URL: /pays/liste)
     */
    public function listPays()
    {
        $pays = Pays::all();
        return view('admin.listePays', compact('pays'));
    }

    /**
     * 2. Affiche le formulaire d'ajout
     * Lié à la route : pays.form (URL: /pays/create)
     */
    public function createForm()
    {
        return view('admin.addPays');
    }

    /**
     * 3. Enregistre le nouveau pays dans la base de données
     * Lié à l'action du formulaire d'ajout (URL en POST: /pays/create)
     */
    /**
     * 3. Enregistre le nouveau pays dans la base de données
     * Lié à l'action du formulaire d'ajout (URL en POST: /pays/create)
     */
    public function createPays(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'code' => 'required|max:5|unique:pays,code', 
            'nom' => 'required|max:100',
            'commentaire' => 'nullable',
        ], [
            'code.unique' => 'Ce code pays existe déjà dans la base de données.',
            'code.max' => 'Le code pays ne doit pas dépasser 5 caractères.',
        ]);

        // Insertion
        Pays::create([
            'code' => $request->input('code'),
            'nom' => $request->input('nom'),
            'commentaire' => $request->input('commentaire'),
        ]);

        return redirect()->route('pays.list')->with('success', 'Le pays a bien été ajouté !');
    }

    /**
     * 4. Affiche le formulaire de modification d'un pays
     * Lié à la route : pays.edit (URL: /pays/modifier/{code})
     */
    public function edit($code)
    {
        // On récupère le pays grâce à son code unique
        $pays = Pays::findOrFail($code);
        return view('admin.editPays', compact('pays'));
    }

    /**
     * 5. Enregistre les modifications d'un pays
     * Lié à l'action du formulaire d'édition (URL en PUT: /pays/modifier/{code})
     */
    public function update(Request $request, $code)
    {
        $pays = Pays::findOrFail($code);

        // Validation (on ignore le code du pays actuel pour éviter le bug du "déjà pris")
        $request->validate([
            'code' => 'required|max:5|unique:pays,code,' . $pays->code . ',code',
            'nom' => 'required|max:100',
            'commentaire' => 'nullable',
        ]);

        // Mise à jour
        $pays->update([
            'code' => $request->input('code'),
            'nom' => $request->input('nom'),
            'commentaire' => $request->input('commentaire'),
        ]);

        return redirect()->route('pays.list')->with('success', 'Le pays a bien été modifié !');
    }

    /**
     * 6. Affiche la page spécifique de suppression massive
     * Lié à la route : pays.deletePage (URL: /pays/supprimer)
     */
    public function deletePage()
    {
        $pays = Pays::all();
        return view('admin.suppPays', compact('pays'));
    }

    /**
     * 7. Supprime définitivement un pays
     * Lié à la route : pays.destroy (URL en DELETE: /pays/delete/{code})
     */
    public function destroy($code)
    {
        $pays = Pays::findOrFail($code);
        $pays->delete();

        // On redirige vers la page précédente (soit la liste, soit la page de suppression)
        return redirect()->back()->with('success', 'Le pays a été supprimé avec succès !');
    }
}