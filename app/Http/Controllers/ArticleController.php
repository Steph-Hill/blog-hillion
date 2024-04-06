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
        
        return Inertia::render('Index',[
            'articles' => Article::latest()->paginate(3),
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return Inertia::render('Create',[
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'image|nullable|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id' 
       ]);

        $category_id = $request->category_id;
        $category = Category::find($category_id);
              
        $article = new Article();
        $article->title = $request->title;
        $article->content = $request->content;
        $article->category()->associate($category);
        

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '_' . $image->getClientOriginalName();
            $filePath = $image->storeAs('uploads/images', $fileName, 'public');
            $article->image = '/storage/' . $filePath;
        }
        $article->save();
        
        return redirect()->route('article-list');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        
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
        //
        $data = $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'category_id' => 'exists:categories,id' 
        ]);

        if ($request->hasFile('image')) {
        $file = $request->file('image');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads/images', $fileName, 'public');
        $article->image = '/storage/' . $filePath;
        $article->save();
    }
        $category_id = $request->input('category_id');

        $category = Category::find($category_id);
        $article->category()->associate($category);

        $article->update($data);

        return redirect()->route('article-list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
        $article->delete();
    }
}
