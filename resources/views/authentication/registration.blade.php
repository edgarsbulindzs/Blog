@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <form class="form-group-lg"  method="POST" action="/registration">

                <label for="username" id="">username</label><br/>
                <input type="text" name="username" value="username"><br/>

                <label for="first_name" id="first_name">first name</label><br/>
                <input type="text" name="first_name" value="first_name"><br/>

                <label for="last_name">last name</label><br/>
                <input type="text" name="last_name" value="last_name"><br/>

                <label for="country">country</label><br/>
                <input type="text" name="country" value=""><br/>

                <label for="city">city</label><br/>
                <input type="text" name="city" value=""><br/>

                <label for="password">password</label><br/>
                <input type="password" name="password" value=""><br/>

                <input type="hidden" name="_token" value="{{csrf_token() }}">
                <button type="submit" class="btn btn-primary">
                    Register
                </button>
            </form>
        </div>
    </div>


    @endsection