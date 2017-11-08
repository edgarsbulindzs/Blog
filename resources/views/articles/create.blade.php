@extends('layouts.app')

@section('content')

<p>dasdasdasdasdas</p>

<div class="container">
    <div class="row">
        <form class="form-group-lg"  method="POST" action="{{route('CreateART')}}" enctype="multipart/form-data">

            <label for="title" id="">title</label><br/>
            <input style="width: 700px;" type="text" name="title"><br/>

            <label for="body" id="first_name">Article Body</label><br/>
            <textarea style="width: 700px; height: 300px;"  type="text" name="body" ></textarea><br/>

                <div class="form-group">
                    <label for="exampleFormControlFile1" >Example file input</label>
                    <input type="file" name="cover_image" class="form-control-file" id="exampleFormControlFile1">
                </div>

            <input type="hidden" name="_token" value="{{csrf_token() }}">
            <button type="submit" class="btn btn-primary">
                Submit
            </button>
        </form>
    </div>
</div>
    @endsection