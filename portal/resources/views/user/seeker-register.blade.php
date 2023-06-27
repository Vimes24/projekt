@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h1>Szukasz nowego miejsca pracy?</h1>
            <h3>Zarejestruj się</h3>
            <img src="{{asset('image/register.png')}}">
        </div>

        <div class="col-md-6">
            <div class="card" id="card">
                <div class="card-header">Rejestracja</div>
                <form action="#" method="post" id="registrationForm">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Imię i nazwisko</label>
                            <input type="text" name="name" class="form-control" required>
                            @if($errors->has('name'))
                            <span class="text-danger">{{$errors->first('name')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control" required>
                            @if($errors->has('email'))
                            <span class="text-danger">{{$errors->first('email')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Hasło</label>
                            <input type="text" name="password" class="form-control" required>
                            @if($errors->has('password'))
                            <span class="text-danger">{{$errors->first('password')}}</span>
                            @endif
                        </div>
                        <br>
                        <div class="form-group">
                            <button class="btn btn-primary" id="btnRegister">Zarejestruj się</button>
                        </div>
                    </div>
                </form>
            </div>
            <div id="message"></div>
        </div>
    </div>
</div>

<script>
    var url = "{{route('store.seeker')}}"
    document.getElementById("btnRegister").addEventListener("click", function(event) {
        var form = document.getElementById("registrationForm");
        var card = document.getElementById("card");
        var messageDiv = document.getElementById('message');
        messageDiv.innerHTML = '';
        var formData = new FormData(form);
        var button = event.target;
        button.disabled = true;
        button.innerHTML = 'Wysyłam email...'

        fetch(url, {
            method: "POST",
            headers:{
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            },
            body: formData
        }).then(response => {
            if(response.ok){
                return response.json();
            } else{
                throw new Error('Error')
            }
        }).then(data => {
            button.innerHTML = 'Register'
            button.disabled = false
            messageDiv.innerHTML = '<div class="alert alert-success">Rejestracja przebiegła pomyślnie. Proszę sprawdzić email celem weryfikacji.</div>'
            card.style.display = 'none'
        }).catch(error => {
            button.innerHTML = 'Register'
            button.disabled = false
            messageDiv.innerHTML = '<div class="alert alert-danger">Coś poszło nie tak. Proszę spróbować ponownie.</div>'
        })
    })
</script>

@endsection