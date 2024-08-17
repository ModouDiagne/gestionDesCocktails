<?php
namespace App\Http\Controllers;

use App\Services\CocktailService; // Assure-toi que cette classe est correctement importée
use App\Models\Cocktail; // Assure-toi que cette classe est correctement importée
use Illuminate\Routing\Controller;

class CocktailController extends Controller
{
    protected $cocktailService;

    // Injection du service CocktailService
    public function __construct(CocktailService $cocktailService)
    {
        $this->cocktailService = $cocktailService;
    }

    // Afficher tous les cocktails
    public function index()
    {
        $cocktails = $this->cocktailService->getAll();

        return response()->json($cocktails);
    }

    // Créer un nouveau cocktail
    public function store(CocktailRequest $request)
    {
        // Les données sont automatiquement validées
        $cocktail = $this->cocktailService->create($request->validated());

        return response()->json($cocktail, 201);
    }

    // Afficher un cocktail spécifique
    public function show(Cocktail $cocktail)
    {
        return response()->json($cocktail);
    }

    // Mettre à jour un cocktail
    public function update(CocktailRequest $request, Cocktail $cocktail)
    {
        // Les données sont automatiquement validées
        $cocktail = $this->cocktailService->update($cocktail, $request->validated());

        return response()->json($cocktail);
    }

    // Supprimer un cocktail
    public function destroy(Cocktail $cocktail)
    {
        $this->cocktailService->delete($cocktail);

        return response()->json(null, 204);
    }
}
