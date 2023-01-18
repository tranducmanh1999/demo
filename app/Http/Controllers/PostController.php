<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Repositories\Post\PostRepository;
use App\Repositories\Like\LikeRepository;
use Illuminate\Http\Request;
use App\Models\LikeUser;
use Auth;
use App\Models\Share;
use App\Models\User;
use Carbon\Carbon;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    protected $postRepo,$likeRepo,$userId;
    public function __construct(PostRepository $postRepo, LikeRepository $likeRepo){
        $this->postRepo = $postRepo;
        $this->likRepo = $likeRepo;
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->postRepo->getAll();
        return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user =  Auth::id();
        $created_at = Carbon::now();
        $updated_at = Carbon::now();
        return view('post.create', compact('user','created_at','updated_at'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        Post::create($request->all());
        return redirect()->route('post.index')
                        ->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $countLike = LikeUser::with(['post','user'])->where('like_user.post_id','=',$id)->get();
        $countShare = Share::with('post')->where('share.post_id','=',$id)->get();
        return view('post.show',compact('post','countLike','countShare'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return redirect()->route('post.index')
        ->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('post.index')
        ->with('success','Post deleted successfully');
    }
}