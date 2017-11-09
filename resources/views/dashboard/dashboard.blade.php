@extends ('layouts.app')



@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"></div>

                    <div class="panel-body">
                        <h3>Dashboard</h3>
                        @if(count($articles) > 0)
                            <table style="width: 1000px" class="table table-striped">
                                <tr>
                                    <th>Title</th>
                                    <th>Body</th>
                                    <th>cover image</th>
                                    <th>Created at</th>
                                    <th style="width: 400px">Actions</th>
                                </tr>
                                @foreach($articles as $article)
                                    <tr>
                                        <td><strong>{{$article->title}}</strong></td>
                                        <td>{{$article->body}}</td>
                                        <td>{{$article->cover_image}}</td>
                                        <td>{{$article->created_at}}</td>
                                        @if(!auth()->guest())
                                            @if(auth()->user()->id == $article->user_id)
                                                <td>
                                                    <a href="{{route('edit', $article->id)}}">
                                                        <button type="submit" class="btn btn-warning pull-right">edit
                                                        </button>
                                                    </a>
                                                    <a href="{{route('delete',$article->id)}}">
                                                        <button type="submit" class="btn btn-danger pull-right">Delete
                                                        </button>
                                                    </a>
                                                    <a href="{{route('CreateART')}}">
                                                        <button type="submit" class="btn btn-primary pull-right">
                                                            Article
                                                        </button>
                                                    </a>

                                                </td>
                                            @endif
                                        @endif

                                    </tr>
                                @endforeach
                            </table>

                            <a href="/blog">
                                <button type="submit" class="btn btn-primary pull-right">Back to Article</button>
                            </a>
                        @else
                            <p>You have no articles</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection




