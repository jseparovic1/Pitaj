@component('mail::message')

Pozdrav {{ $user->name }} ,

Dobro došli na Pitaj.hr
Da bi počeli sa korištenjem aplikacije morate potvrditi vašu email adresu.

@component('mail::button', ['url' => $activationUrl])
Potvrdi email
@endcomponent

Hvala vam,<br>
{{ config('app.name') }} tim
@endcomponent
