@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-lg-5">
                <div class="card-header"><strong>Password:</strong> {{$portal->name}} / {{$portal->url}}</div>

                <div class="card-body">
                    <div class="form-group">
                        <label>Username:</label>
                        <input type="text" name="name" class="form-control" value="{{$password->username}}">
                    </div>

                    <div class="form-group">
                        <label>Password:</label>
                        <div class="input-group mb-3">
                            <input id="password" type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password" value="{{$password->password}}">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary showPassword" type="button" data-target="#password">SHOW PASSWORD</button>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea id="description" name="description" class="form-control">{{$password->description}}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
