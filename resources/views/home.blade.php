@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-lg-5">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    <div class="row mb-5">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Search Portals</h5>
                                    <form action="{{route('portals.search')}}" method="get">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="url" placeholder="Portal URL" aria-label="Portal URL">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-primary" type="submit">Search</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="name" placeholder="Portal Name" aria-label="Portal Name">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-primary" type="submit">Search</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5>Search Usernames</h5>
                                    <form action="{{route('passwords.search')}}" method="get">
                                        {{csrf_field()}}
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Username" aria-label="Username">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-primary" type="submit">Search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <passport-clients></passport-clients>

            <passport-authorized-clients></passport-authorized-clients>

            <passport-personal-access-tokens></passport-personal-access-tokens>
        </div>
    </div>
</div>
@endsection
