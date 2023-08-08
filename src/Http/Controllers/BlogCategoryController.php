<?php

namespace VarenykyBlog\Http\Controllers;

use VarenykyBlog\Models\BlogCategory;
use VarenykyBlog\Models\Blog;
use VarenykyBlog\Repositories\BlogCategoryRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Varenyky\Http\Controllers\BaseController;

class BlogCategoryController extends BaseController
{
    
    public function __construct(BlogCategoryRepository $repository)
    {
        $this->repository = $repository;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categories = $this->repository->getAllPaginated();

        return view('VarenykyBlog::blogs.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('VarenykyBlog::blogs.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|unique:blog_categories|max:255',
        ]);

        $create = $request->except(['_token']);
        $create['slug'] = Str::slug($create['name']);

        $this->repository->create($create);

        return redirect()->route('admin.blogcategories.index')->with('success', __('VarenykyBlog::labels.added'));
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogCategory $blogcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogCategory $blogcategory): View
    {
        return view('VarenykyBlog::blogs.categories.edit', compact('blogcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogCategory $blogcategory): RedirectResponse
    {
        $request->validate([
            'name' => 'required|unique:blog_categories|max:255',
        ]);

        $update = array_filter($request->except(['_token', '_method']));
        $update['slug'] = Str::slug($request->input('name'));
        $this->repository->update($blogcategory->id, $update);

        return redirect()->route('admin.blogcategories.edit', $blogcategory->id)->with('success', __('VarenykyBlog::labels.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogCategory $blogcategory): RedirectResponse
    {
        $blogcategory->delete();

        return redirect()->route('admin.blogcategories.index')->with('success', __('VarenykyBlog::labels.deleted'));
    }
}
