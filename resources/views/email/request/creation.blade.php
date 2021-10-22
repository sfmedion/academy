@component('mail::message')
Dear supervisor, employee **{{ $request->employee->firstname }} {{ $request->employee->lastname }}**
requested for some time off, starting on **{{ $request->human_date_from }}** and ending
on **{{ $request->human_date_to }}**, stating the reason:

_{{ $request->reason }}_

@component('mail::button', ['url' => ''])
    Approve request
@endcomponent
@component('mail::button', ['url' => ''])
    Reject request
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
