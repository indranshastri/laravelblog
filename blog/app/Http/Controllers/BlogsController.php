<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Http\Requests;
use League\CommonMark\CommonMarkConverter;
use Carbon\carbon;

class BlogsController extends Controller
{
    protected $limit=3;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //\DB::enableQueryLog();
        $categories = Category::with(["posts"=>function($query){
          $query->where("published_at","<=",Carbon::now());
          //$query->published();
        }])->orderBy("title","asc")->get();
        $posts = Post::with('author')->lastestFirst()->published()->simplePaginate($this->limit);
        //$posts = Post::with('author')->lastestFirst()->published()->simplePaginate($this->limit);
        return view("blog.index",compact("posts","categories"));
        //view("blog.index",compact("posts"))->render();
      //  dd(\DB::getQueryLog());
    }

    public function category($id)
    {
        //\DB::enableQueryLog();
        $categories = Category::with(["posts"=>function($query){
            $query->where("published_at","<=",Carbon::now());
        }])->orderBy("title","asc")->get();
        $posts = Post::with('author')->lastestFirst()->published()->where("category_id",$id)->simplePaginate($this->limit);
        return view("blog.index",compact("posts","categories"));
        //view("blog.index",compact("posts"))->render();
      //  dd(\DB::getQueryLog());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //$post = Post::findOrFail($id);
        return view("blog.show",compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
