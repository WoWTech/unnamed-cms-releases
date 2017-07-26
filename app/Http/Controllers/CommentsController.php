<?php

namespace App\Http\Controllers;

use App\{Post, Comment};
use Laratrust;

class CommentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (!$this->isAdminRequest())
            abort(403, 'Access denied');

        $comments = Comment::with
        (
          [
            'account' => function($query) {
              $query->select('id', 'username');
            },
            'post' => function($query) {
              $query->select('id', 'title');
            }
          ]
        )->select('id', 'account_id', 'post_id', 'content', 'created_at');

        if (request()->keywords)
            $comments->where('content', 'LIKE', '%'.request()->keywords.'%');

        $comments = $comments->paginate(10);

        return view('admin.comments.index', compact('comments'));
    }

    public function edit(Post $post, Comment $comment)
    {
        if (!Laratrust::can('update-comment') && Laratrust::canAndOwns('update-own-comment', $comment))
            return abort(403);

        return $this->isAdminRequest() ? view('admin.comments.edit', compact('comment')) : view('comments.edit', compact('post', 'comment'));
    }

    public function update(Post $post, Comment $comment)
    {

        if (!Laratrust::can('update-comment') && Laratrust::canAndOwns('update-own-comment', $comment))
            return abort(403);

        $this->validateRequest();

        $comment->update(request(['content']));

        return $this->isAdminRequest() ? redirect()->route('admin.comments.index') : redirect()->route('posts.show', $post);
    }

    public function store(Post $post)
    {
        if (!Laratrust::can('create-comment'))
            return abort(403);

        $this->validateRequest();

        Comment::create([
            'content' => request('content'),
            'post_id' => $post->id,
            'account_id' => auth()->id()
        ]);

        return back();
    }

    public function destroy(Post $post, Comment $comment)
    {
        if (!Laratrust::can('delete-comment') && Laratrust::canAndOwns('delete-own-comment', $comment))
            return abort(403);

        $comment->delete();

        return back();
    }

    private function validateRequest()
    {
        $this->validate(request(), [
            'content' => 'min:1|max:1000'
        ]);
    }
}
