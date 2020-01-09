<?php

namespace App\Http\Controllers;

use App\Article;

class ArticlesController extends Controller
{
    //

    public function index(){

        $articles = Article::latest()->get();

        return view('articles.index',['articles'=> $articles]);
    }

    public function show(Article $article){
        //this method bellow uses the id to find the article 
        //the above method is a refactored version of the method below this comment 
       //$article = Article::findOrFail($id);
      
       return view('articles.show',['article'=>$article]);
    
    }

    public function create() {

        return view('articles.create');
    }

    public function store(){

        //persist the new article 
        Article:: create($this->validateArticle());

        return redirect(route('articles.index'));
    }

    public function edit(Article $article){

        //$article = Article::find($id);

        return view('articles.edit',['article'=>$article]);
    }


    public function update(Article $article){

      $article->update($this->validateArticle());

        return redirect($article->path());
    }

    protected function validateArticle() {

        return request()->validate([
            'title'=>'required',
            'excerpt'=>'required',
            'body'=>'required'
        ]);
    }
}
