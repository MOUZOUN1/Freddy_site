@component('mail::message')
# Vérification de connexion

Bonjour {{ $user->prenom }} {{ $user->nom }},

Votre code de vérification est :

# **{{ $user->two_factor_code }}**

Il est valable pour une durée limitée.

Merci,<br>
{{ config('app.name') }}
@endcomponent
