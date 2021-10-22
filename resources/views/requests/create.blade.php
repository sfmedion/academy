@extends('layouts.app')

@section('title', __('app.request_time_off'))

@section('content')

    <div class="container mt-5 px-lg-5">
        <div class="card rounded">
            <div class="card-body p-5">
                <h4 class="card-title mb-5">{{ __('app.request_time_off') }}</h4>

                <form action="{{ route('requests.store') }}" method="post">
                @csrf

                <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <input type="date" id="date_from" name="date_from" value="{{ old('date_from') }}"
                                       class="form-control active @error('date_from') is-invalid @enderror"/>
                                <label class="form-label" for="date_from">{{ __('app.from') }}</label>
                                @error('date_from')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <input type="date" id="date_to" name="date_to" value="{{ old('date_to') }}"
                                       class="form-control active @error('date_to') is-invalid @enderror"/>
                                <label class="form-label" for="date_to">{{ __('app.to') }}</label>
                                @error('date_to')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Text input -->
                    <div class="form-outline mb-4">
                        <textarea class="form-control @error('reason') is-invalid @enderror" id="reason" name="reason"
                                  rows="4">{{ old('reason') }}</textarea>
                        <label class="form-label" for="reason">{{ __('app.reason') }}</label>
                        @error('reason')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit button -->
                    <a href="{{ route('requests.index') }}">
                        <button type="button" class="btn btn-outline-dark mt-2 float-start">
                            <i class="fas fa-chevron-left me-2"></i> {{ __('app.back') }}
                        </button>
                    </a>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary mt-3 float-end">{{ __('app.create') }}</button>
                </form>
            </div>
        </div>
    </div>

@endsection
