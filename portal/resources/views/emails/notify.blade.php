<x-mail::message>
# Introduction

Gratulacje. Jesteś teraz użytkownikiem premium.
<p>Dane płatności:</p>
<p>Plan: {{$plan}}</p>
<p>Plan kończy się: {{$billing_ends}}</p>

<x-mail::button :url="''">
Wstaw ogłoszenie
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
