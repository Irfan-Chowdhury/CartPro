@component('mail::message')

<p>Dear {{$data['fullname']}} , <br>
    {{$data['message']}} : <b>{{$data['reference_no']}}</b>
</p>

<br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
