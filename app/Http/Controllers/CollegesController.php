<?php

// Déclaration de l'espace de noms pour les contrôleurs
namespace App\Http\Controllers;

// Importation du modèle College pour interagir avec la table "colleges"
use App\Models\College;

// Importation de la classe Request pour gérer les requêtes HTTP
use Illuminate\Http\Request;

// Importation de la façade Log pour enregistrer les erreurs dans les logs
use Illuminate\Support\Facades\Log;

// Déclaration du contrôleur CollegesController qui hérite du contrôleur de base
class CollegesController extends Controller
{
    /**
     * Affiche le formulaire pour ajouter un collège
     * 
     * @return \Illuminate\View\View Vue du formulaire d'ajout
     */
    public function createForm()
    {
        // Retourne la vue "addCollege.blade.php"
        return view('addCollege');
    }

    /**
     * Crée un nouveau collège dans la base de données
     * 
     * @param Request $request Données envoyées par le formulaire
     * @return \Illuminate\Http\RedirectResponse Redirection avec message
     */
    public function createCollege(Request $request)
    {
        try {
            // Validation des champs envoyés par le formulaire
            $validated = $request->validate([
                'code' => 'nullable|string|max:10',        // Code du collège, optionnel
                'nom' => 'required|string|max:100',        // Nom obligatoire
                'adr_ligne_1' => 'nullable|string|max:50',
                'adr_ligne_2' => 'nullable|string|max:50',
                'adr_lieu' => 'nullable|string|max:50',
                'adr_code_postal' => 'nullable|string|max:10',
                'adr_ville' => 'nullable|string|max:50',
                'adr_region' => 'nullable|string|max:50',
                'commentaire' => 'nullable|string|max:250',
                'code_pays' => 'required|string|max:5',    // Code pays obligatoire
            ]);

            // Mise en majuscules pour certains champs
            if (!empty($validated['code'])) {
                $validated['code'] = strtoupper($validated['code']);
            }
            if (!empty($validated['adr_ville'])) {
                $validated['adr_ville'] = strtoupper($validated['adr_ville']);
            }
            if (!empty($validated['code_pays'])) {
                $validated['code_pays'] = strtoupper($validated['code_pays']);
            }

            // Création du collège dans la base
            College::create($validated);

            // Redirection vers la page précédente avec message de succès
            return redirect()->back()->with('success', 'Collège créé avec succès !');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Gestion des erreurs de validation
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Gestion des erreurs inattendues
            Log::error('Erreur lors de la création du collège : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la création du collège.');
        }
    }

    /**
     * Affiche la liste de tous les collèges
     * 
     * @return \Illuminate\View\View Vue de la liste des collèges
     */
    public function listColleges()
    {
        try {
            // Récupère tous les collèges
            $colleges = College::all();

            // Retourne la vue "listeCollege.blade.php" avec la variable $colleges
            return view('listeCollege', compact('colleges'));
        } catch (\Exception $e) {
            // En cas d'erreur, on log et on renvoie un message
            Log::error('Erreur lors de la récupération des collèges : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Impossible de récupérer la liste des collèges.');
        }
    }

    /**
     * Affiche la page permettant de supprimer des collèges
     * 
     * @return \Illuminate\View\View Vue de suppression
     */
    public function deletePage()
    {
        try {
            // Récupère tous les collèges
            $colleges = College::all();

            // Retourne la vue "suppCollege.blade.php" avec la variable $colleges
            return view('suppCollege', compact('colleges'));
        } catch (\Exception $e) {
            // Log et message d'erreur
            Log::error('Erreur lors de l\'affichage de la page de suppression : ' . $e->getMessage());
            return redirect()->back()->with('error', 'Impossible de charger la page de suppression des collèges.');
        }
    }

    /**
     * Supprime un collège de la base de données
     * 
     * @param Request $request Requête contenant l'ID du collège à supprimer
     * @return \Illuminate\Http\RedirectResponse Redirection avec message
     */
    public function destroy(Request $request)
    {
        try {
            // Récupère l'ID du collège depuis le formulaire
            $id = $request->input('college_id');

            // Recherche le collège ou échoue si inexistant
            $college = College::findOrFail($id);

            // Supprime le collège
            $college->delete();

            // Redirection avec succès
            return back()->with('success', 'Collège supprimé avec succès');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Cas où le collège n'existe pas
            return back()->with('error', 'Collège introuvable.');
        } catch (\Exception $e) {
            // Autres erreurs imprévues
            Log::error('Erreur lors de la suppression du collège : ' . $e->getMessage());
            return back()->with('error', 'Impossible de supprimer le collège.');
        }
    }
}
