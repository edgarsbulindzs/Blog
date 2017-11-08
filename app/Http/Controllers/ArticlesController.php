<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;



class ArticlesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('Login', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $article = Article::orderBy('created_at','desc')->paginate(10);
        return view('articles.blog')->with('article', $article);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        // Handle File Upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // faila nosaukums ko saglabāt
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Ubildes augsupielade
            $path = $request->file('cover_image')->storeAs('public/storage/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        // izveido article
        $article = new Article;
        $article->title = $request->input('title');
        $article->body = $request->input('body');
        $article->user_id = auth()->user()->id;
        $article->cover_image = $fileNameToStore;
        $article->save();
        return redirect('/blog')->with('success', 'Article Created');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        return view('articles.single')->with('article', $article);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        // Check for correct user
        if(auth()->user()->id !==$article->user_id){
            return redirect('/blog')->with('error', 'Unauthorized Page');
        }
        return view('articles.edit')->with('article', $article);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // Handle File Upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }
        // Create Post
        $articles = Article::find($id);
        $articles->title = $request->input('title');
        $articles->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $articles->cover_image = $fileNameToStore;
        }
        $articles->save();
        return redirect('/blog')->with('success', 'Article Updated');
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        // Check for correct user
        if(auth()->user()->id !==$article->user_id){
            return redirect('/blog')->with('error', 'Unauthorized Page');
        }
        if($article->cover_image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/cover_images/'.$article->cover_image);
        }

        $article->delete();
        return redirect('/blog')->with('success', 'article Removed');
    }
}