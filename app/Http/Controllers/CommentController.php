<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Comment;
use App\Post;
use Session;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){

        $this->middleware('auth',['except'=>'store']);
    }
    public function index()
    {
        //
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
    public function store(Request $request,$post_id)
    {
        $this->validate($request,array(
            'name' => 'required|max:255',
            'email'=>  'required|email|max:255',
            'comment'=> 'required|min:5|max:1000'
            ));
        $post= Post::find($post_id);
        $comment = new Comment();
        $comment->name=$request->name;
        $comment->email = $request->email;
        $comment->comment=$request->comment;
        $comment->approved= true;
        $comment->post()->associate($post);
        $comment->save();
        $comment->save();
        Session::flash('success', 'Comment was added');
        return redirect()->route('blog.single', [$post->slug]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('comments.edit')->withComment($comment);
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
        $comment = Comment::find($id);

        $this->validate($request,array('comment' => 'required'));
        $comment->comment = $request->comment;
        $comment->save();
        Session::flash('success','Comment Updated');
        return redirect()->route('posts.show',$comment->post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function delete($id){
    $comment = Comment::find($id);
    $post=Post::find($comment->post->id);
    return view('comments.delete')->withComment($comment)->withPost($post);
}

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $post_id= $comment->post->id;
        $comment->delete();
        Session::flash('success','Delted Comment');
        return redirect()->route('posts.show', $post_id);
    }

    }
