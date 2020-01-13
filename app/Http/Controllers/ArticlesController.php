<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Article;
use Psy\Command\WhereamiCommand;

class ArticlesController extends Controller
{
    //

    public function index(){

      if(request('tag')){

            $articles = Tag::where('name', request('tag'))->firstOrFail()->article;
      } else{
            $articles = Article::latest()->get();
      }
        

        return view('articles.index',['articles'=> $articles]);

    }

    public function show(Article $article){
        //this method bellow uses the id to find the article 
        //the above method is a refactored version of the method below this comment 
       //$article = Article::findOrFail($id);
      
       return view('articles.show',['article'=>$article]);
    
    }

    public function create() {

        return view('articles.create', [
            'tags'=> Tag::all()
            
            ]);
    }

    public function store(){

        //persist the new article 
        $this->validateArticle();

       $article = new Article(request(['title','excerpt','body']));

       $article->user_id = 1; //auth()->id()
       $article->save();

       $article->tags()->attach(request('tags'));

       //return $article;

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
            'body'=>'required',
            'tags'=>'exists:tags,id'
        ]);
    }
}
