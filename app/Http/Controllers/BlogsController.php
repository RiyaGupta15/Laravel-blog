<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Session;
use App\Models\User;
use App\Mail\BlogPublished;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function index() {
        //$blogs = Blog::where('status', 1)->latest()->get();
        $blogs = Blog::latest()->get();
        return view('blogs.index')->withBlogs($blogs);
    }

    public function create() {
        $categories = Category::latest()->get();
        return view('blogs.create')->withCategories($categories);
    }

    public function store(Request $request) {
        //validate
        $rules = [
            'title'=> ['required', 'min:5', 'max:100'],
            'body'=> ['required', 'min: 200'],
        ];

        $this->validate($request, $rules);


        $input = $request->all();

        //image upload
        if($file = $request->file('featured_image')) {
            $name = uniqid() . $file->getClientOriginalName();
            $name = strtolower(str_replace(' ', '-', $name));
            $file->move('images/featured_image/', $name);
            $input['featured_image'] = $name;
        }

        //$blog = Blog::create($input);

        $blogByUser = $request->user()->blogs()->create($input);
        if ($request->category_id) {
            $blogByUser->category()->sync($request->category_id);
        }

        //Mail
        $users = User::all();
        foreach($users as $user)
        Mail::to($user->email)->queue(new BlogPublished($blogByUser, $user));

        Session::flash('success', 'Blog was created successfully!');
        return redirect('/blogs');
    }

    public function show($id) {
        $blog = Blog::findOrFail($id);
        //$blog = Blog::whereSlug($slug)->first();
        return view('blogs.show')->withBlog($blog);
    }

    public function edit($id) {
        $categories = Category::latest()->get();
        $blog = Blog::findOrFail($id);

        $bc = array();
        foreach ($blog->category as $c) {
            $bc[] = $c->id - 1;
        }
        $filtered = Arr::except($categories, $bc);
        return view('blogs.edit')->withBlog($blog)->withCategories($categories)->withFiltered($filtered);
    }

    public function update(Request $request, $id) {

        $input = $request->all();
        $blog = Blog::findOrFail($id);


        //image upload
        if($file = $request->file('featured_image')) {
            if($blog->featured_image) {
                unlink('images/featured_image/'.$blog->featured_image);
            }
            $name = uniqid() . $file->getClientOriginalName();
            $name = strtolower(str_replace(' ', '-', $name));
            $file->move('images/featured_image/', $name);
            $input['featured_image'] = $name;
        }

        $blog->update($input);
        if($request->category_id) {
            $blog->category()->sync($request->category_id);
        }
        return redirect('blogs');
    }

    public function delete($id) {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect('blogs');
    }

    public function trash() {
        $trashedBlogs = Blog::onlyTrashed()->get();
        return view('blogs.trash')->withTrashedBlogs($trashedBlogs);
    }

    public function restore($id) {
        $restoredBlog = Blog::onlyTrashed()->findOrFail($id);
        $restoredBlog->restore($restoredBlog);
        return redirect('blogs');
    }

    public function permanentDelete($id) {
        $permanentDeleteBlog = Blog::onlyTrashed()->findOrFail($id);
        $permanentDeleteBlog->forceDelete($permanentDeleteBlog);
        return back();
    }
}
