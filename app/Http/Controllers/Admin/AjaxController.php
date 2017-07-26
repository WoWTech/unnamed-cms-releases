<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Account;

class AjaxController extends Controller
{

    public function getUsers()
    {
        $this->validate(request(), [
            'username' => 'required|min:3',
        ]);

        return Account::where('username', 'like', request()->username.'%')->get(['id', 'username']);
    }

}
