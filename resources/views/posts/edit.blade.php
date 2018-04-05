@extends('layouts.app')

@section('title', '| Edit Blog Post')

@section('stylesheets')

    {!! Html::style('css/select2.min.css') !!}

@endsection

@section('content')

    <div class="row">
        {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PATCH', 'files' => true]) !!}
        <div class="col-md-8">
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title', null, ["class" => 'form-control input-lg']) }}

            {{ Form::label('slug', 'Slug:', ['class' => 'form-spacing-top']) }}
            {{ Form::text('slug', null, ["class" => 'form-control']) }}

            {{ Form::label('category_id', "Category:", ['class' => 'form-spacing-top']) }}
            {{--  $categories and not $cats since we renamed it while passing to the view withCategories  --}}
            {{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}

            {{ Form::label('tags', 'Tags:', ['class' => 'form-spacing-top']) }}
            {{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}

            {{ Form::label('featured_image', 'Update Featured Image:', ['class' => 'form-spacing-top']) }}
            {{ Form::file('featured_image') }}
            {{--TODO switch to TinyMCE WYSIWYG text editor, configure it acording to needs.--}}
            {{ Form::label('body', 'Body:', ['class' => 'form-spacing-top']) }}
            {{ Form::textarea('body', null, ['class' => 'form-control', 'id' => 'article-ckeditor']) }}
        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd>{{ date('M j, Y H:i', strtotime($post->created_at)) }}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{ date('M j, Y H:i', strtotime($post->updated_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.show', 'Cancel', [$post->id], ['class' => 'btn btn-danger btn-block']) !!}
                    </div>
                    <div class="col-sm-6">
                        {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div> <!-- end of .row (form) -->

@stop

@section('scripts')

    {!! Html::script('js/select2.min.js') !!}

    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script> CKEDITOR.replace( 'article-ckeditor' );</script>

@endsection