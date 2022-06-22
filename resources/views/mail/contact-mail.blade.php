@component('mail::message')
# Introduction

<p><b>User Name:</b> {{$data['name']}} </p>
<br>
<p><b>Email:</b>  {{$data['email']}} </p>
<br>
<p><b>Message:</b> {{$data['message']}} </p>

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
