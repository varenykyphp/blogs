@extends('varenykyAdmin::app')

@section('title', __('VarenykyBlog::admin.blogs.index.title'))

@section('content_header')
    <strong>{{ __('VarenykyBlog::admin.blogs.index.title') }}</strong>
@stop

@section('create-btn', route('admin.blogs.create'))

@section('content')
    <div class="card border p-3">
        <table class="table">
            <thead>
                <tr class="">
                    <th>{{ __('VarenykyBlog::labels.name') }}</th>
                    <th>{{ __('VarenykyBlog::labels.slug') }}</th>
                    <th>{{ __('VarenykyBlog::labels.category') }}</th>
                    <th>{{ __('VarenykyBlog::labels.user') }}</th>
                    <th>{{ __('VarenykyBlog::labels.content') }}</th>
                    <th width="350"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($blogs as $blog)
                    <tr>
                        <td>{{ $blog->name }}</td>
                        <td>{{ $blog->slug }}</td>
                        <td>{{ $blog->categories->name }}</td>
                        <td>{{ $blog->user->name }}</td>
                        <td>{{ implode(' ', array_slice(explode(' ', $blog->content), 0, 3)) }}{{ str_word_count($blog->content) > 3 ? '...' : '' }}</td>
                        <td align="right">
                            @include('varenykyAdmin::actions', ['route' => 'admin.blogs', 'entity' => $blog])
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">{{ __('varenyky::labels.empty') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
