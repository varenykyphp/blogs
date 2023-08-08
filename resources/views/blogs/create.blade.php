@extends('varenykyAdmin::app')

@section('title', __('VarenykyBlog::admin.blogs.create.title'))

@section('content_header')
    <strong>{{ __('VarenykyBlog::admin.blogs.create.title') }}</strong>
@stop

@section('save-btn', route('admin.blogs.store'))
@section('back-btn', route('admin.blogs.index'))

@section('content')

        <form action="{{ route('admin.blogs.store') }}" method="POST" id="nopulpForm" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card border p-3">
                        <div class="form-group mb-3">
                            <label for="name"
                                class="@if ($errors->has('name')) text-danger @endif">{{ __('VarenykyBlog::labels.name') }}</label>
                            <input id="name" type="text" placeholder="{{ __('VarenykyBlog::labels.name') }}..."
                                name="name" class="form-control @if ($errors->has('name')) is-invalid @endif"
                                value="{{ old('name') }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="blog_category_id" class="form-label">{{ __('VarenykyBlog::labels.category') }}</label>
                            <select name="blog_category_id" class="form-select" aria-label="Default select example">
                                <option>{{ __('varenyky::labels.choice') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="content" class="@if ($errors->has('content')) text-danger @endif">{{ __('VarenykyBlog::labels.content') }}</label>
                            <textarea id="content" name="content" rows="4"
                                      class="form-control @if ($errors->has('content')) is-invalid @endif"
                                      placeholder="{{ __('VarenykyBlog::labels.content') }}...">{{ old('content') }}</textarea>
                            @if ($errors->has('content'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('content') }}</strong>
                                </span>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </form>
@endsection
