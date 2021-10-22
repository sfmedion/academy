@extends('layouts.app')

@section('title', 'Requests index')

@section('content')

    <div class="container mt-5 px-lg-5">
        <div class="card rounded">
            <div class="card-header">
                <a href="{{ route('requests.create') }}">
                    <button type="button" class="btn btn-primary my-2 float-end">
                        {{ __('app.request_time_off') }}
                    </button>
                </a>
            </div>
            <div class="card-body p-5 text-center">

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col"><strong>{{ __('app.date_submitted') }}</strong></th>
                        <th scope="col"><strong>{{ __('app.dates_requested') }}</strong></th>
                        <th scope="col"><strong>{{ __('app.days_requested') }}</strong></th>
                        <th scope="col"><strong>{{ __('app.status') }}</strong></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($requests->get() as $request)
                        <tr>
                            <th scope="row">{{ $request->human_created_at }}</th>
                            <td>{{ $request->human_date_from }} - {{ $request->human_date_to }}</td>
                            <td>{{ $request->days_requested }}</td>
                            <td
                                @class([
                                    'text-success' => $request->status === \App\Models\Request::STATUS_APPROVED,
                                    'text-danger' => $request->status === \App\Models\Request::STATUS_REJECTED,
                                    'text-warning' => $request->status === \App\Models\Request::STATUS_PENDING,
                                ])
                            >{{ __('app.' . $request->status) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
