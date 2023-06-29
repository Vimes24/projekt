@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        @if(Session::has('message'))
        <div class="alert alert-warning">{{Session::get('message')}}</div>
        @endif
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Tygodniowa - 10zł</h5>
                    <p class="card-text">Wiadomość testowa</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Test</li>
                    <li class="list-group-item">Test2</li>
                    <li class="list-group-item">Test3</li>
                </ul>
                <div class="card-body text-center">
                    <a href="{{route('pay.weekly')}}" class="card-link">
                        <button class="btn btn-success">Zapłać</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Miesięczna - 30zł</h5>
                    <p class="card-text">Wiadomość testowa</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Test</li>
                    <li class="list-group-item">Test2</li>
                    <li class="list-group-item">Test3</li>
                </ul>
                <div class="card-body text-center">
                    <a href="{{route('pay.monthly')}}" class="card-link">
                        <button class="btn btn-success">Zapłać</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Roczna - 100zł</h5>
                    <p class="card-text">Wiadomość testowa</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Test</li>
                    <li class="list-group-item">Test2</li>
                    <li class="list-group-item">Test3</li>
                </ul>
                <div class="card-body text-center">
                    <a href="{{route('pay.yearly')}}" class="card-link">
                        <button class="btn btn-success">Zapłać</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection