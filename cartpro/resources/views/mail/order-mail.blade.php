@component('mail::message')

<p>Dear {{$data['fullname']}} , <br>
    {{$data['message']}} : <b>{{$data['order_id']}}</b>
</p>

<br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
