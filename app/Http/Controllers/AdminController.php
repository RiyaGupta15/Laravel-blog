<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class AdminController extends Controller
{
    public function index() {
        return view('admin.dashboard');
    }

    public function blogs() {
        $publishedBlogs = Blog::where('status', 1)->latest()->get();
        $draftedBlogs = Blog::where('status', 0)->latest()->get();
        return view('admin.blogs')->withPublishedBlogs($publishedBlogs)->withDraftedBlogs($draftedBlogs);
    }
}
