<?php
namespace App\Services;

use App\Models\Cocktail;

class CocktailService
{
    // Récupérer tous les cocktails
    public function getAll()
    {
        return Cocktail::all();
    }

    // Récupérer un cocktail par son ID
    public function findById($id)
    {
        return Cocktail::findOrFail($id);
    }

    // Créer un nouveau cocktail
    public function create(array $data)
    {
        return Cocktail::create($data);
    }

    // Mettre à jour un cocktail existant
    public function update(Cocktail $cocktail, array $data)
    {
        $cocktail->update($data);
        return $cocktail;
    }

    // Supprimer un cocktail
    public function delete(Cocktail $cocktail)
    {
        return $cocktail->delete();
    }
}
