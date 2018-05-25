@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">
                    User Information
                </div>
                <div class="card-body">
                    <form action="{{route('users.update', $user)}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="patch">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name:</label>
                                    <input type="text" name="name" class="form-control" value="{{!empty(old('name')) ? old('name'):$user->name}}" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email:</label>
                                    <input type="email" name="email" class="form-control" value="{{!empty(old('email')) ? old('email'):$user->email}}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 offset-md-4">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-secondary btn-block">UPDATE</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-default">
                <div class="card-header">Two Factor Authentication</div>

                <div class="card-body">
                    <form action="{{route('users.update2FA', $user)}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Enable 2FA:</label>
                            <select id="enforce_2fa" name="enforce_2fa" class="form-control">
                                <option value="0" {{$user->enforce_2fa ? '':'selected'}}>DISABLED</option>
                                <option value="1" {{$user->enforce_2fa ? 'selected':''}}>ENABLED</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" style="max-width: 55px;" name="country_code" placeholder="1" maxlength="3" value="{{$user->country_code ? $user->country_code:''}}" required>
                                <input type="text" class="form-control" name="sms_number" placeholder="(555) 555-5555" aria-label="SMS Number" value="{{!empty(old('sms_number')) ? old('sms_number'):$user->sms_number}}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-secondary btn-block">UPDATE</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <div class="card card-default mt-3">
                <div class="card-header">Change Password</div>

                <div class="card-body">
                    <form action="{{route('users.updatePassword', $user)}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Password Confirmation:</label>
                            <input type="text" name="url" class="form-control">
                        </div>

                        <div class="row">
                            <div class="col-md-6 offset-md-3">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-secondary btn-block">UPDATE</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
