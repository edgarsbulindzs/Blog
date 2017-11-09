@extends('layouts.app')
@section('articles')
<div class="container">
    <h1>Articles</h1>

    <div style="text-align: center;" class="row">

    @if(count($article) > 0)
        @foreach($article as $articles)
            <div class="well ">
                <div class="row imgP">

                    <div class="col-md-4 col-sm-4 ">
                        <div>
                        <img class="myimg" src="storage/storage/cover_images/{{$articles->cover_image}}" alt="{{$articles->cover_image}}">
                        </div>
                    </div>
                    <div class="col-md-2 col-md-4">
                        <h3><a class="styleli" href="/blog/{{$articles->id}}">{{$articles->title}}</a></h3>
                        <small>Created at {{$articles->created_at}} by {{$articles->user->username}}</small>
                    </div>
                </div>


            </div>
        @endforeach
        {{$article->links()}}
    </div>
    @else
        <p>No posts found</p>
    @endif
</div>

@endsection