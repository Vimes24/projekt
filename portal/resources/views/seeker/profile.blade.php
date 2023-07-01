@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        @if(Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        @if(Session::has('error'))
        <div class="alert alert-danger">{{Session::get('success')}}</div>
        @endif
        <h2>Zaktualizuj profil</h2>
        <form action="{{route('user.update.profile')}}" method="post" enctype="multipart/form-data">@csrf
            <div class="col-md-8">
                <div class="form-group">
                    <label for="name">Zdjęcie profilowe</label>
                    <input type="file" class="form-control" id="name" name="profile_pic">
                    @if(auth()->user()->profile_pic)
                    <img src="{{Storage::url(auth()->user()->profile_pic)}}" width="150" class="mt-3">
                    @endif
                </div>
                <div class="form-group">
                    <label for="name">Twoje dane</label>
                    <input type="text" class="form-control" name="name" value="{{auth()->user()->name}}">
                </div>
                <div class="form-group mt-4">
                    <button class="btn btn-success" type="submit">Aktualizuj</button>
                </div>
            </div>
        </form>
    </div>

    <div class="row justify-content-center">
        <h2>Zmień hasło</h2>

        <form action="{{route('user.password')}}" method="post">@csrf
            <div class="col-md-8">
                <div class="form-group">
                    <label for="current_password">Aktualne hasło</label>
                    <input type="password" name="current_password" class="form-control" id="current_password">
                </div>
                <div class="form-group">
                    <label for="password">Nowe hasło</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Powtórz hasło</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                </div>
                <div class="form-group mt-4">
                    <button class="btn btn-success" type="submit">Aktualizuj</button>
                </div>
            </div>
        </form>
    </div>

    <div class="row justify-content-center">
        <h2>Zaktualizuj swoje dane pracownika</h2>

        <form action="{{route('upload.resume')}}" method="post" enctype="multipart/form-data">@csrf
            <div class="col-md-8">
                <div class="form-group">
                    <label for="resume">Zamieść dane</label>
                    <input type="file" name="resume" class="form-control" id="resume">
                </div>
                <div class="form-group mt-3">
                    <button type="subumit" class="btn btn-success">Zamieść</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection