@extends('layouts.admin.main')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        @if(Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        @if(Session::has('error'))
        <div class="alert alert-danger">{{Session::get('error')}}</div>
        @endif
        <form action="{{route('user.update.profile')}}" method="post" enctype="multipart/form-data">@csrf
            <div class="col-md-8">
                <div class="form-group">
                    <label for="logo">Logo</label>
                    <input type="file" class="form-control" id="logo" name="profile_pic">
                    @if(auth()->user()->profile_pic)
                    <img src="{{Storage::url(auth()->user()->profile_pic)}}" width="150" class="mt-3">
                    @endif
                </div>
                <div class="form-group">
                    <label for="name">Nazwa jednostki</label>
                    <input type="text" class="form-control" name="name" value="{{auth()->user()->name}}">
                </div>

                <div class="form-group">
                    <label for="description">O instytucji</label>
                    <textarea id="description" name="about" class="form-control summernote">{{auth()->user()->about}}</textarea>
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
</div>

@endsection