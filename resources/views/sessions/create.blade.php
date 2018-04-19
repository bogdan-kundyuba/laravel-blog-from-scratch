@extends('layouts.master')

@section('content')

<div class="col-md-8">

    <h1>Войти</h1>

    <form method="POST" action="/public/login">
        @csrf
        <div class="form-group">
            <label for="email">Email Address:</label>
            <input type="text" class="form-control" name="email"> 
        </div> 

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password"> 
        </div> 

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>   
        
        @include('layouts.errors')
        
    </form>
</div>
@endsection
