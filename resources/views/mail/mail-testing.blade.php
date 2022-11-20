@component('mail::message')

<p>Hello , <br>
    This mail is send for testing purpose. If you get this mail then your mail setting is working fine.
</p>

<br>

Thanks,<br>
{{ env('MAIL_FROM_NAME') }}

@endcomponent
