### README - Documentation Détaillée pour Développeurs

#### Introduction

Ce projet backend de **gestion des cocktails** est une API REST développée en **Laravel 11**. L'application permet la gestion des recettes de cocktails via des opérations CRUD (Création, Lecture, Mise à jour et Suppression). L'architecture est organisée autour des contrôleurs, des modèles, des services et des **requests** pour assurer une séparation des préoccupations et un code facilement maintenable.

#### Structure du Projet

Le projet suit une structure MVC (Modèle, Vue, Contrôleur) avec l'ajout de **services** pour encapsuler la logique métier et des **requests** pour la validation des données.

- **Contrôleurs** : Ils gèrent les requêtes HTTP et appellent les services appropriés pour traiter les données.
- **Modèles** : Ils interagissent directement avec la base de données et représentent les entités de l'application.
- **Services** : Ils contiennent la logique métier et gèrent les opérations complexes.
- **Requests** : Ils valident les données des requêtes entrantes avant de les transmettre aux services ou aux contrôleurs.

#### Contrôleurs

Les contrôleurs sont situés dans `app/Http/Controllers`. Le principal contrôleur est le **CocktailController**, qui gère toutes les requêtes liées aux cocktails.

##### Exemple de Contrôleur
```php
namespace App\Http\Controllers;

use App\Services\CocktailService;
use App\Models\Cocktail;
use App\Http\Requests\CocktailRequest; // Importation de la requête validée
use Illuminate\Http\JsonResponse;

class CocktailController extends Controller
{
    protected $cocktailService;

    public function __construct(CocktailService $cocktailService)
    {
        $this->cocktailService = $cocktailService;
    }

    public function index(): JsonResponse
    {
        $cocktails = $this->cocktailService->getAll();
        return response()->json($cocktails);
    }

    public function store(CocktailRequest $request): JsonResponse
    {
        // Validation via CocktailRequest et création d'un cocktail
        $cocktail = $this->cocktailService->create($request->validated());
        return response()->json($cocktail, 201);
    }

    public function show(Cocktail $cocktail): JsonResponse
    {
        return response()->json($cocktail);
    }

    public function update(CocktailRequest $request, Cocktail $cocktail): JsonResponse
    {
        $updatedCocktail = $this->cocktailService->update($cocktail, $request->validated());
        return response()->json($updatedCocktail);
    }

    public function destroy(Cocktail $cocktail): JsonResponse
    {
        $this->cocktailService->delete($cocktail);
        return response()->json(null, 204);
    }
}
```

#### Modèles

Les modèles sont situés dans `app/Models`. Le modèle **Cocktail** est utilisé pour interagir avec la base de données et gérer les entités de cocktail.

##### Exemple de Modèle
```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cocktail extends Model
{
    protected $fillable = ['name', 'description', 'image_url'];
}
```

#### Services

Les services, situés dans `app/Services`, encapsulent la logique métier. Ils contiennent les méthodes pour effectuer les opérations CRUD, en utilisant les modèles pour interagir avec la base de données.

##### Exemple de Service
```php
namespace App\Services;

use App\Models\Cocktail;

class CocktailService
{
    public function getAll()
    {
        return Cocktail::all();
    }

    public function create(array $data): Cocktail
    {
        return Cocktail::create($data);
    }

    public function update(Cocktail $cocktail, array $data): Cocktail
    {
        $cocktail->update($data);
        return $cocktail;
    }

    public function delete(Cocktail $cocktail): void
    {
        $cocktail->delete();
    }
}
```

#### Requests

Les **Requests** sont situées dans `app/Http/Requests` et sont responsables de la validation des données entrantes. Elles permettent de centraliser les règles de validation dans une classe séparée, assurant ainsi que les données envoyées via les requêtes HTTP sont conformes avant d'être traitées par les services ou les contrôleurs.

##### Exemple de Request
```php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CocktailRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_url' => 'nullable|url'
        ];
    }

    public function authorize(): bool
    {
        return true; // Autoriser toutes les requêtes pour cet exemple
    }
}
```

#### Opérations CRUD

- **GET /api/cocktails** : Récupère tous les cocktails.
- **POST /api/cocktails** : Crée un nouveau cocktail (avec validation des données via `CocktailRequest`).
- **GET /api/cocktails/{id}** : Récupère un cocktail spécifique.
- **PUT /api/cocktails/{id}** : Met à jour un cocktail existant.
- **DELETE /api/cocktails/{id}** : Supprime un cocktail.

#### Utilisation des Services et Requests

L'utilisation des services et des requests améliore la structure et la maintenabilité du code. Les **services** assurent une séparation claire de la logique métier, et les **requests** assurent une validation des données cohérente et centralisée avant toute manipulation de la base de données.

Les développeurs peuvent ainsi facilement étendre ou modifier la logique du projet sans affecter les autres parties du code.

#### Conclusion

Cette architecture modulaire permet une évolutivité et une maintenance plus aisée du code. Les contrôleurs gèrent les requêtes, les services encapsulent la logique métier, et les requests valident les données. Ces composants travaillent ensemble pour assurer un développement propre et efficace.
