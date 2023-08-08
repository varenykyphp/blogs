@extends('varenykyAdmin::app')

@section('title', __('VarenykyBlog::admin.categories.index.title'))

@section('content_header')
    <strong>{{ __('VarenykyBlog::admin.categories.index.title') }}</strong>
@stop

@section('create-btn', route('admin.blogcategories.create'))

@section('content')
    <div class="card border p-3">
        <table class="table">
            <thead>
                <tr class="">
                    <th>{{ __('VarenykyBlog::labels.name') }}</th>
                    <th>{{ __('VarenykyBlog::labels.slug') }}</th>
                    <th width="350"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td align="right">
                            @include('varenykyAdmin::actions', ['route' => 'admin.blogcategories', 'entity' => $category])
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">{{ __('VarenykyBlog::labels.empty') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
