@extends('layouts.app')
@section('articles')

    <h1>Articles</h1>
    @if(count($article) > 0)
        @foreach($article as $articles)
            <div class="well myCenter">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img style="width:100%;" src="storage/storage/cover_images/{{$articles->cover_image}}">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/blog/{{$articles->id}}">{{$articles->title}}</a></h3>
                        <small>Created at {{$articles->created_at}} by {{$articles->user->name}}</small>
                    </div>
                </div>
            </div>
        @endforeach
        {{$article->links()}}
    @else
        <p>No posts found</p>
    @endif
@endsection