<x-mail::message>
# Introduction

Cześć, <b>{{$name}}</b>.
Twoja subskrypcja dzisiaj straciła ważność. Kliknij przycisk poniżej by ją odnowić.

<x-mail::button :url="{{route('subscribe')}}">
Aktywuj ponownie
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
