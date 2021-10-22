@extends('layouts.app')

@section('title', __('app.login'))

@section('content')
    <section class="intro">
        <div class="mask d-flex align-items-center h-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card rounded">
                            <div class="card-body p-5 text-center">
                                <div class="my-md-5 pb-5">
                                    <h1 class="fw-bold mb-0">{{ config('app.name') }}</h1>

                                    <i class="fas fa-code fa-3x my-5"></i>

                                    <form action="{{ route('login.post') }}" method="post">
                                        @csrf

                                        <div class="form-outline mb-4">
                                            <input
                                                type="email" name="email" id="typeEmail"
                                                class="form-control form-control-lg @error('email') is-invalid @enderror "
                                            />
                                            <label class="form-label" for="typeEmail">{{ __('app.email') }}</label>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-outline mb-5">
                                            <input
                                                type="password" id="typePassword" name="password"
                                                class="form-control form-control-lg @error('password') is-invalid @enderror "
                                            />
                                            <label class="form-label" for="typePassword">{{ __('app.password') }}</label>
                                            @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <button class="btn btn-primary btn-lg btn-rounded px-5 text-light" type="submit">
                                            {{ __('app.login') }}
                                        </button>
                                    </form>
                                </div>
                                @error('login')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
