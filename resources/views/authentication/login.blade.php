@extends('layouts.app')
@section('content')

<div class="container">
        <div class="row">

            <form class="form-group-lg"  method="POST" action="{{route('authen')}}">


                <label for="username" id="">username</label><br/>
                <input type="text" name="username" value="username"><br/>


                @if ($errors->has('username'))
                    @foreach( $errors->get('password') as $error )
                        <li>  {{ $error }}</li>
                    @endforeach
                @endif
                <label for="password" id="password">password</label><br/>
                <input type="password" name="password" ><br/>

                <input type="hidden" name="_token" value="{{csrf_token() }}">
                <button type="submit" class="btn btn-primary">
                    login
                </button>

    </form>

        </div>
    </div>

@endsection