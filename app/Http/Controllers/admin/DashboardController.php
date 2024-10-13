<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();
        $publishedNews = 7;
        $pendingNews = 10;
        $categories = 4;
        $roles = 3;
        $permissions = 10;

        return view('categories', compact('publishedNews', 'pendingNews', 'categories', 'roles', 'permissions', 'user'));

    }
}
