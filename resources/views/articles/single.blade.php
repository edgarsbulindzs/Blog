@extends('layouts.app')

@section('articles')



    <div class="row">
        <div class="col-sm-8">

            <h1>{{$article->title}}</h1>
            <img style="width: 100px;" src="storage/storage/cover_images/{{$article->cover_image}}">
            <img href="storage/storage/cover_images/{{$article->cover_image}}">
            <br><br>
            <div>
                {{$article->body}}
            </div>
            <hr>
            <small>Written on {{$article->created_at}} by {{$article->user->name}}</small>
            <hr>
        </div>
        <div class="col-sm-6">

            @if(!auth()->guest())
                @if(auth()->user()->id == $article->user_id)



                    <form method="post" action="{{route('delete',$article->id)}}">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger pull-right" title="Delete">Delete</button>
                    </form>
                    <a href="{{route('edit', $article->id)}}">
                        <button type="submit" class="btn btn-primary pull-right">edit</button>
                    </a>
                    <a href="/blog">
                        <button type="submit" class="btn btn-primary pull-right">Article</button>
                    </a>
        </div>
                @endif
            @endif

        </div>
    </div>





    @endsection
