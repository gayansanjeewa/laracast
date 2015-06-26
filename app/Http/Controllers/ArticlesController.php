<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\ArticleRequest;
use Carbon\Carbon;
//use Request;
//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index() {
//        $articles = Article::all(); // display all
//        $articles = Article::latest('published_at')->where('published_at', '<=', Carbon::now())->get(); // only display published items
//        or apply query scope
        $articles = Article::latest('published_at')->published()->get(); // published() is a query scope set in the Article model
//        $articles = Article::latest('published_at')->unpublished()->get(); // just to test -> unpublished() is a query scope set in the Article model

//        return view('articles.index')->with('articles', $articles);
        return view('articles.index', compact('articles'));
    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function show($id) {
        $article = Article::findOrFail($id);

        return view('articles.show', compact('article'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create() {
        return view('articles.create');
    }

    /**
     * @param Requests\ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ArticleRequest $request) { // php artisan make:request ArticleRequest to create a validation request
//        $input = Request::all();
//        $article = new Article();
//        #article->title = $input['title'];
//        or
//        $article = new Article(['title'=>$input['title'], ]);
//        Article::create(['title'=>$input['title'],);
//        or
//        $input['published_at'] = Carbon::now();


//        Article::create(Request::all()); // we remove this as ve are get5ting the validated date through $request -> therefor "use Request;" can be removed from above
        Article::create($request->all());

        return redirect('articles');
    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        $article = Article::findOrFail($id);

        return view('articles.edit', compact('article'));

    }

    /**
     * @param $id
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, ArticleRequest $request) {
        $article = Article::findOrFail($id);

        $article->update($request->all());

        return redirect('articles');
    }
}