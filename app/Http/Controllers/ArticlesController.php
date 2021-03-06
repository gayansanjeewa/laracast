<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\ArticleRequest;
use App\Tag;
use App\User;
use Auth;
use Carbon\Carbon;
//use Request;
//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    public function __construct(){
//        $this->middleware('auth', ['only' => 'create']); // Apply Only to create action
        $this->middleware('auth', ['except' => 'index']); // Apply to all Except the index
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index() {
//        $articles = Article::all(); // display all
//        $articles = Article::latest('published_at')->where('published_at', '<=', Carbon::now())->get(); // only display published items
//        or apply query scope

//        return \Ath|User::find()->name; // get the authenticated user's name

        $articles = Article::latest('published_at')->published()->get(); // published() is a query scope set in the Article model
//        $articles = Article::latest('published_at')->unpublished()->get(); // just to test -> unpublished() is a query scope set in the Article model


//        $latest = Article::latest()->first(); // created a view-composer to handle this, that is allow partials to always receive data

//        return view('articles.index')->with('articles', $articles);
        return view('articles.index', compact('articles', 'latest'));
    }

    /**
     * @param Article $article
     * @return \Illuminate\View\View
     * @internal param $id
     */
//    public function show($id) { // $id no longer exists after route model binding
    public function show(Article $article) { // Route model binding

//        dd($id);// do this after route model binding and you no longer get an id, instead we get a Article object which relevant to the given id,

//        $article = Article::findOrFail($id);

        return view('articles.show', compact('article'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function create() {
//        $tags = Tag::lists('name'); // give a list of names
        $tags = Tag::lists('name', 'id'); // key value pairs
        return view('articles.create', compact('tags'));
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
//        $article = Article(['title'=>$input['title'], ]);
//        Article::create(['title'=>$input['title'],);
//        or
//        $input['published_at'] = Carbon::now();


//        Article::create(Request::all()); // we remove this as ve are get5ting the validated date through $request -> therefor "use Request;" can be removed from above
//        Article::create($request->all());

        // save authenticated users is with the form data
//        Auth::user()->articles->save(New Article($request->all()));
//        if clean the above code a little bit,
//        $article = New Article($request->all()); // Article::create([]) would also work
//        Auth::user()->articles()->save($article);

        // same as above 2 lines
//        $article = Auth::user()->articles()->create($request->all());


        // Setting flash messages
        // Using the Session facade
//        \Session::flash('flash_message', 'Your article has been created!'); // Session::put() is also available, but Session::flash is temporal
        // Following is using session() helper function rater than doing to use Session and doing the above
//        session()->flash('flash_message', 'Your article has been created!');
//        session()->flash('flash_message_important', true);
//        return redirect('articles');

        // storing tags
//        $tagIds = $request->input('tags');
//        $article->tags()->attach($request->input('tag_list'));
//        refactor above
//        $this->syncTags($article, $request->input('tag_list'));

//        equivalent to all above
//        $article = Auth::user()->articles()->create($request->all());
//        $this->syncTags($article, $request->input('tag_list'));
        $this->createArticle($request);


//        above equivalent to the following method
        return redirect('articles')->with([
            'flash_message' => 'Your article has been created!',
            'flash_message_important' => true
        ]);

        // can use instead on the above
        // custom function trough laracasts Flash facade.
//        flash('Your article has been created!'); // default information message
////        ex:
////        flash()->success('Your article has been created!');
//        return redirect('articles');
    }


    /**
     * @param Article $article
     * @return \Illuminate\View\View
     */
//    public function edit($id) {
    public function edit(Article $article) {// Route model binding
//        $article = Article::findOrFail($id);
        $tags = Tag::lists('name', 'id');
        return view('articles.edit', compact('article', 'tags'));

    }

    /**
     * @param Article $article
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
//    public function update($id, ArticleRequest $request) {
    public function update(Article $article, ArticleRequest $request) {// Route model binding
//        $article = Article::findOrFail($id);

        $article->update($request->all());
//        $article->tags()->attach($request->input('tag_list'));
//        $article->tags()->sync($request->input('tag_list')); // sync : if exists let it be, otherwise modify
//        refactor above
        $this->syncTags($article, $request->input('tag_list'));

        return redirect('articles');
    }

    /**
     * Sync up the list of tags in the database
     * @param Article $article
     * @param array $tags
     * @internal param ArticleRequest $request
     */
    public function syncTags(Article $article, array $tags)
    {
        $article->tags()->sync($tags);
    }

    /**
     * Save the article
     *
     * @param ArticleRequest $request
     * @return mixed
     */
    private function createArticle(ArticleRequest $request)
    {
        $article = Auth::user()->articles()->create($request->all());
        $this->syncTags($article, $request->input('tag_list'));
        return $article;
    }
}