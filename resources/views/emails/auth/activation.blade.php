@component('mail::message')

Pozdrav {{ $user->name }} ,

Dobro došli na Pitaj.hr.
Za nastavak korištenja aplikacije potrebno je potvrditi vašu email adressu,

@component('mail::button', ['url' => $activationUrl])
Potvrdi email
@endcomponent

Hvala vam,<br>
{{ config('app.name') }} tim
@endcomponent
