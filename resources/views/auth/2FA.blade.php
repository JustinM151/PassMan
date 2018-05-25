@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Two Factor Authentication</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('2FA.authenticate') }}">
                            @csrf

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-3 text-center">
                                    <input id="pin" type="text" class="text-center form-control{{ $errors->has('pin') ? ' is-invalid' : '' }}" name="pin" value="{{ old('pin') }}" required autofocus placeholder="ABC123">

                                    @if ($errors->has('pin'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('pin') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">
                                        AUTHENTICATE
                                    </button>
                                    <p class="mt-3">You should have received an SMS from us with a 6 character PIN. Please enter it to continue.</p>
                                    <p>If you have not received a PIN within 5 minutes, you can request a new one.</p>
                                    <a class="btn btn-link" href="{{ route('2FA.resend') }}">Request PIN.</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

