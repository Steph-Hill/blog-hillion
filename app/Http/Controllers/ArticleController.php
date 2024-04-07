<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Category;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        /* Renvoie la vue "Index" */
        /* Récupère articles par ordre croissant avec pagination */
        return Inertia::render('Index',[
            'articles' => Article::latest()->paginate(3),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        /* Renvoie la vue "Create" */
        /* Récupère toutes les catégories */
        return Inertia::render('Create',[
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        /* Valide les données du formulaire */
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'image|nullable|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id' 
       ]);

        /* Trouve la catégorie correspondante à l'id envoyé dans le formulaire */
        $category_id = $request->category_id;
        $category = Category::find($category_id);
         
        /* Crée un nouvel article avec les données du formulaire et associe une catégorie a l'article  */
        $article = new Article();
        $article->title = $request->title;
        $article->content = $request->content;
        $article->category()->associate($category);
        
        /*  Enregistre l'image de l'article si elle a été envoyée dans le formulaire */
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '_' . $image->getClientOriginalName();
            $filePath = $image->storeAs('uploads/images', $fileName, 'public');
            $article->image = '/storage/' . $filePath;
        }

        /* Enregistre l'article dans la base de données */
        $article->save();

        /* Redirige vers la liste des articles */
        return redirect()->route('article-list');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        /* Renvoie la vue "Show" */
        /* Récupere le contenu d'un article avec sa catégory */
        return Inertia::render('Show',[
            'article' => $article,
            'category' => $article->category,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        
        /* Renvoie la vue "Edit" */
        /* Récupere le contenu d'un article pour le modifer */
        return Inertia::render('Edit',[
            'article' => $article,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        /* Valide les données envoyées dans la requête */
        $data = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'category_id' => 'exists:categories,id' 
        ]);

        /* Vérifie si une nouvelle image a été envoyée dans la requête */
        if ($request->hasFile('image')) {
        $file = $request->file('image');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads/images', $fileName, 'public');
        $article->image = '/storage/' . $filePath;
        /* Enregistre les modifications apportées à l'article dans la base de données */
        $article->save();
    }
        /* Récupère l'id de la catégorie envoyé dans la requête */
        $category_id = $request->input('category_id');
        $category = Category::find($category_id);

        /* Associe la catégorie à l'article */
        $article->category()->associate($category);
        
        /* Met à jour l'article' */
        $article->update($data);

        /* Redirige l'utilisateur vers la liste des articles */
        return redirect()->route('article-list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        /* Supprime l'article */
        $article->delete();
    }
}
