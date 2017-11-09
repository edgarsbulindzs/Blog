@extends('layouts.app')

@section('articles')
    <div class="container">
        <div class="row">
            <form class="form-group-lg "  method="POST" action="{{route('update',$article->id)}}"  enctype="multipart/form-data">
                <label  for="title" >title</label><br/>
                <input style="width: 700px;" type="text" name="title" value="{{ old('title',$article->title)}}"  required><br/>
                <label for="body" id="first_name">body</label><br/>
                <textarea style="width: 700px; height: 300px;" type="text" name="body" id="article-ckeditor"   required>{{ old('body',$article->body)}}</textarea><br/>

                <label for="exampleFormControlFile1" >Image</label>
                <input type="file"  name="cover_image" class="form-control-file" id="exampleFormControlFile1" value="{{ old('storage/cover_image',$article->cover_image)}}" >
                <input type="hidden" name="_token" value="{{csrf_token() }}">

                <button type="submit" class="btn btn-primary form-control-file">
                    Save
                </button>
            </form>
        </div>
    </div>
@endsection