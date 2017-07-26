<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\{Account, Post, Comment};

class DashboardController extends Controller
{

    public function index()
    {
        $posts = Post::with(['account' => function($query)
        {
            $query->select('username', 'id');
        }])->orderBy('created_at', 'DESC')->limit(5)->get();

        $comments = Comment::with(['account' => function($query)
        {
            $query->select('username', 'id');
        }])->orderBy('created_at', 'DESC')->limit(5)->get();

        $users = Account::orderBy('joindate', 'DESC')->limit(5)->get(['username', 'email', 'joindate']);

        return view('admin.index', compact('posts', 'users', 'comments'));
    }
    
}
