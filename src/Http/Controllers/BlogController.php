<?php

namespace VarenykyBlog\Http\Controllers;

use VarenykyBlog\Models\Blog;
use VarenykyBlog\Models\BlogCategory;
use VarenykyBlog\Repositories\BlogRepository;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Varenyky\Http\Controllers\BaseController;

class BlogController extends BaseController
{
    
    public function __construct(BlogRepository $repository)
    {
        $this->repository = $repository;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $blogs = $this->repository->getAllPaginated();

        return view('VarenykyBlog::blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = BlogCategory::all();

        return view('VarenykyBlog::blogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $create = $request->except(['_token']);
        $create['slug'] = Str::slug($create['name']);
        $create['user_id'] = auth()->user()->id;

        $this->repository->create($create);

        return redirect()->route('admin.blogs.index')->with('success', __('VarenykyBlog::labels.added'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog): View
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog): View
    {
        $categories = BlogCategory::all();
        
        return view('VarenykyBlog::blogs.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog): RedirectResponse
    {

        $update = array_filter($request->except(['_token', '_method']));
        $update['slug'] = Str::slug($request->input('name'));
        $this->repository->update($blog->id, $update);

        return redirect()->route('admin.blogs.edit', $blog->id)->with('success', __('VarenykyBlog::labels.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog): RedirectResponse
    {
        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', __('VarenykyBlog::labels.deleted'));
    }
}
