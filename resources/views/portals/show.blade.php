@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-lg-5">
                <div class="card-header"><strong>Portal:</strong> {{$portal->name}} ({{$portal->url}}</div>

                <div class="card-body">
                    <div class="form-group">
                        <label>Portal Name:</label>
                        <input type="text" name="name" class="form-control" value="{{$portal->name}}">
                    </div>

                    <div class="form-group">
                        <label>Description:</label>
                        <textarea name="description" class="form-control">{{$portal->description}}</textarea>
                    </div>
                    <h3>Passwords</h3>
                    <table class="table table-striped">
                        <th>Username</th>
                        <th>Password</th>
                    @foreach($portal->passwords as $password)
                        <tr>
                            <td><p class="form-text"><a href="{{route('passwords.show',[$password])}}">{{$password->username}}</a></p></td>
                            <td>
                                <div class="input-group mb-3">
                                    <input id="password-{{$password->id}}" type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password" value="{{$password->password}}">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary showPassword" type="button" data-target="#password-{{$password->id}}">SHOW PASSWORD</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-default mb-5">
                <div class="card-header">Random Password</div>

                <div class="card-body">
                    <form action="{{route('passwords.storeRandom')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="portal_id" value="{{$portal->id}}">
                        <div class="form-group">
                            <label>Username:</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Length:</label>
                            <input type="text" name="length" class="form-control" placeholder="32">
                        </div>

                        <div class="form-group">
                            <label>Exclude Characters:</label>
                            <input type="text" name="restrict" class="form-control" placeholder="XYZ!@# etc.">
                        </div>

                        <div class="form-group">
                            <label>Description:</label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">GENERATE PASSWORD</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card card-default mb-5">
                <div class="card-header">Manually Create Password</div>

                <div class="card-body">
                    <form action="{{route('passwords.store')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="portal_id" value="{{$portal->id}}">
                        <div class="form-group">
                            <label>Username:</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Confirm Password:</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Description:</label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">CREATE PASSWORD</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
