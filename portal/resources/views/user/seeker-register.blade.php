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
            <div class="card">
                <div class="card-header">Rejestracja</div>
                <form action="{{route('store.seeker')}}" method="post">@csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Imię i nazwisko</label>
                            <input type="text" name="name" class="form-control">
                            @if($errors->has('name'))
                            <span class="text-danger">{{$errors->first('name')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control">
                            @if($errors->has('email'))
                            <span class="text-danger">{{$errors->first('email')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Hasło</label>
                            <input type="text" name="password" class="form-control">
                            @if($errors->has('password'))
                            <span class="text-danger">{{$errors->first('password')}}</span>
                            @endif
                        </div>
                        <br>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Zarejestruj się</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection