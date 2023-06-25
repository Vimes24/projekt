@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="card">
            <div class="card-header">Zweryfikuj konto</div>
            <div class="card-body">
                <p>Twoje konto nie zostało zweryfikowane. Zweryfikuj je teraz. Możesz ponowić prośbę przesłania linku do weryfikacji.
                    <a href="{{route('resend.email')}}">Prześlij ponownie link weryfikujący</a>
                </p>
            </div>
        </div>
    </div>
</div>

@endsection