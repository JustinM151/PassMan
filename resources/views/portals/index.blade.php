@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-lg-5">
                <div class="card-header">Portals</div>

                <div class="card-body">
                    <template>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <th>Name</th>
                                <th>URL</th>
                                <th>Description</th>
                                @foreach($portals as $portal)
                                    <tr class="cclickable-row" data-href="{{url('/portals/'.$portal->id)}}">
                                        <td><a href="{{url('/portals/'.$portal->id)}}">{{$portal->name}}</a></td>
                                        <td><a href="{{url('/portals/'.$portal->id)}}">{{$portal->url}}</a></td>
                                        <td><a href="{{url('/portals/'.$portal->id)}}">{{$portal->description}}</a></td>
                                    </tr>
                                @endforeach
                            </table>
                            {{$portals->links()}}
                        </div>
                    </template>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-default">
                <div class="card-header">Create Portal</div>

                <div class="card-body">
                    <form action="{{route('portals.store')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Portal Name:</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Portal URL:</label>
                            <input type="text" name="url" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Description:</label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">ADD PORTAL</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
