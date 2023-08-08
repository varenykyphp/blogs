@extends('varenykyAdmin::app')

@section('title', __('VarenykyBlog::admin.categories.create.title'))

@section('content_header')
    <strong>{{ __('VarenykyBlog::admin.categories.create.title') }}</strong>
@stop

@section('save-btn', route('admin.blogcategories.store'))
@section('back-btn', route('admin.blogcategories.index'))

@section('content')

        <form action="{{ route('admin.blogcategories.store') }}" method="POST" id="nopulpForm" enctype="multipart/form-data">
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
                    </div>
                </div>
            </div>
        </form>
@endsection
