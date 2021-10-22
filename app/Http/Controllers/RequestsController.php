<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequestFormRequest;
use App\Mail\RequestCreation;
use App\Models\Request;
use Illuminate\Support\Facades\Mail;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        return view('requests.index', ['requests' => auth()->user()->requests()->orderByDesc('created_at')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create(): \Illuminate\Contracts\View\View
    {
        return view('requests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateRequestFormRequest $request): \Illuminate\Http\RedirectResponse
    {
        $request = Request::create(
            array_merge(
                $request->only(['date_from', 'date_to', 'reason']),
                ['status' => Request::STATUS_PENDING, 'user_id' => auth()->id()]
            )
        );

        //-- Send mail to inform admin for the newly created request
        Mail::to($request->employee->admin->email)->send(new RequestCreation($request));

        return redirect()->route('requests.index');
    }
}
