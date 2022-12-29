@extends('layouts.welcome')

@section('content')

<div class="container mt-5 align-items-center">
    @if(Route::has('login'))
        <div class="auth">
            @auth
                <h1>Welcome Back, {{ auth()->user()->name }}</h1>
                <a href="{{ url('/home') }}" class="btn btn-primary">Home</a>
            @else
                <div class="row">
                    <div class="col d-flex justify-content-center">
                        <div class="card">
                            <div class="card-header">{{ __('Sistem Informasi Pegawai') }}</div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="row mb-2">
                                        <label for="email">{{ __('Email Address :') }}</label>
                                        <div class="col">
                                            <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required
                                            autocomplete="email" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label for="password">{{ __('Password :') }}</label>
                                        <div class="col">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col mb-4 text-start" style="width: 100%">
                                        <a href="#" class="text-decoration-none">Lupa Password ?</a>
                                    </div>

                                    <div class="row mb-0">
                                        <div class="col">
                                            <button type="submit" class="button">
                                                {{ __('Login') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endauth
        </div>
</div>
@endif
@endsection
