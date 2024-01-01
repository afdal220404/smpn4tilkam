@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row mb-3">
                            <label for="token" class="col-md-4 col-form-label text-md-end">{{ __('token') }}</label>

                            <div class="col-md-6">
                                <input id="token" type="password" class="form-control @error('password') is-invalid @enderror" name="token" required autocomplete="new-token">

                                @error('token')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="token-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm token') }}</label>

                            <div class="col-md-6">
                                <input id="token-confirm" type="password" class="form-control" name="token_confirmation" required autocomplete="new-token">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
