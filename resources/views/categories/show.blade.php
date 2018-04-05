@extends('layouts.app')
<?php $titleCategory = htmlspecialchars($category->name); ?>
@section('title', "| $titleCategory Tag")

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $category->name }} Category <small>{{ $category->posts()->count() }} Posts</small></h1>
        </div>
        <div class="col-md-2">
            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary pull-right btn-block" style="margin-top:20px;">Edit</a>
        </div>
        <div class="col-md-2">
            {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE']) !!}
            {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-block', 'style' => 'margin-top:20px;'])}}
            {!! Form::close() !!}
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Categories</th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                @foreach($category->posts as $post)
                    <tr>
                        <th>{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>@foreach($post->tags as $category)
                                <span class="label label-default">{{ $category->name }}</span>
                            @endforeach
                        </td>
                        <td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-xs">View</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection