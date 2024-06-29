<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function dashboard(){
        $unrevisonedArticles = Article::where("is_accepted", NULL)->get();
        $acceptedArticles = Article::where("is_accepted", true)->get();
        $rejectArticles = Article::where("is_accepted", false)->get();

        return view("revisor.dashboard",compact("unrevisonedArticles","acceptedArticles","rejectArticles"));
    }

    public function acceptedArticle(Article $article){
        $article->is_accepted = true;
        $article->save();
        return redirect(route('revisor.dashboard'))->with("message","Articolo pubblicato");
    }

    public function rejectedArticle(Article $article){
        $article->is_accepted = false;
        $article->save();
        return redirect(route('revisor.dashboard'))->with("message","Articolo rifiutato");
    }

    public function undoArticle(Article $article){
        $article->is_accepted = NULL;
        $article->save();
        return redirect(route('revisor.dashboard'))->with("message","Articolo rimandato in revisione");
    }

}
