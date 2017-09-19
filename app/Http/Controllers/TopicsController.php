<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Topic, Category, Reply, Account};
use Laratrust;

class TopicsController extends Controller
{

    public function index(Category $category)
    {
        $topics = $category->topics()->with('account');

        if (request()->keywords)
            $topics->where('title', 'LIKE', '%'.request()->keywords.'%');

        $topics = $topics->latest()->paginate(10);

        request()->flashOnly(['keywords']);

        return view('admin.topics.index', compact('topics', 'category'));
    }

    public function store(Category $category)
    {
        if (!Laratrust::can('create-forum-topic'))
            return abort(403);

        $this->validate(request(), [
          'title' => 'required|max:75',
          'content' => 'required|max:2000'
        ]);

        $topic = Topic::create([
          'title'       => request('title'),
          'content'     => request('content'),
          'category_id' => $category->id,
          'account_id'  => \Auth::id()
        ]);

        return redirect()->route('forum.topic', [$category->category_slug, $topic->id]);
    }

    public function store_reply($category, Topic $topic)
    {
        if (!Laratrust::can('create-topic-reply'))
            return abort(403);

        $this->validate(request(), [
            'content' => 'required|max:2000'
        ]);

        $topic->replies()->create([
            'content'  => request('content'),
            'account_id'  => \Auth::id()
        ]);

        return back();
    }

    public function show($category, Topic $topic)
    {
        // if (!Laratrust::can('view-forum-topic'))
        //     return abort(403);

        $replies = $topic->replies()->simplePaginate(10);

        return view('forum.categories.topic', compact('category', 'topic', 'replies'));
    }

    public function edit($category, Topic $topic)
    {
        if (!Laratrust::can('update-forum-topic'))
            return abort(403);

        return view('admin.topics.edit', compact('category', 'topic'));
    }

    public function create(Category $category)
    {
        if (!Laratrust::can('create-forum-topic'))
            return abort(403);

        return view('admin.topics.create', compact('category'));
    }

    public function update($category, Topic $topic)
    {
        if (!Laratrust::can('update-forum-topic'))
            return abort(403);

        $this->validate(request(), [
            'title'      => 'required|max:75',
            'content'    => 'required|max:2000',
            'account_id' => 'integer',
        ]);

        $topic->fill(request(['title', 'content']));

        if (request('account_id'))
            $topic->account()->associate(Account::findOrfail(request('account_id')));

        $topic->save();

        return redirect()->back();
    }

    public function update_reply($category, $topic)
    {
        if (!Laratrust::can('update-topic-reply'))
            return abort(403);

        $this->validate(request(), [
            'content'  => 'required|max:2000',
            'reply_id' => 'required|integer',
        ]);

        $reply = Reply::findOrFail(request('reply_id'));
        $reply->update(request(['content']));

        if (!request()->ajax())
            return redirect()->route('forum.topic', [$category, $topic]);
    }

    public function delete_reply($category, $topic, Reply $reply)
    {
        if (!Laratrust::can('delete-topic-reply'))
            return abort(403);

        $reply->delete();

        return redirect()->route('forum.topic', [$category, $topic]);
    }

    public function destroy($category, Topic $topic)
    {
        if (!Laratrust::can('delete-forum-topic'))
            return abort(403);

        $topic->delete();

        return redirect()->route('admin.topic.index', $category);
    }
}
