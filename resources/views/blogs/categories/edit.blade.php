@extends('varenykyAdmin::app')

@section('title', __('VarenykyBlog::admin.categories.edit.title'))

@section('content_header')
    <strong>{{ __('VarenykyBlog::admin.categories.edit.title') }}</strong>
@stop

@section('save-btn', route('admin.blogcategories.update', $blogcategory))
@section('back-btn', route('admin.blogcategories.index'))

@section('content')

        <form action="{{ route('admin.blogcategories.update', $blogcategory) }}" method="POST" id="nopulpForm" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card border p-3">
                        <div class="form-group mb-3">
                            <label for="name"
                                class="@if ($errors->has('name')) text-danger @endif">{{ __('VarenykyBlog::labels.name') }}</label>
                            <input id="name" type="text" placeholder="{{ __('VarenykyBlog::labels.name') }}..."
                                name="name" class="form-control @if ($errors->has('name')) is-invalid @endif"
                                value="{{ $blogcategory->name }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="slug"
                                class="@if ($errors->has('slug')) text-danger @endif">{{ __('VarenykyBlog::labels.slug') }}</label>
                            <input id="slug" type="text" placeholder="{{ __('VarenykyBlog::labels.slug') }}..."
                                name="slug" class="form-control @if ($errors->has('slug')) is-invalid @endif"
                                value="{{ $blogcategory->slug }}">
                        </div>
                    </div>
                </div>
            </div>
        </form>
@endsection
