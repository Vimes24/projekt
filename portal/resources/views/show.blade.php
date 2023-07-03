@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <img src="{{Storage::url($listing->feature_image)}}" class="card-img-top" alt="Cover Image" style="height: 150px; object-fit: cover;">
                <div class="card-body">
                    <h2 class="card-title">{{$listing->title}}</h2>
                    @if(Session:has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                    @endif
                    <span class="badge bg-primary">{{$listing->job_type}}</span>
                    <p>Wynagrodzenie: ${{number_format($listing->salary,2)}}</p>
                    <p>Adres: {{$listing->address}}</p>
                    <h4 class="mt-4">Opis</h4>
                    <p class="card-text">{!!listing->description!!}</p>

                    <h4>{!!$listing->roles!!}</h4>
                    lorem

                    <p class="card-text mt-4">Koniec ważności ogłoszenia: {{$listing->application_close_date}}</p>
                    @if(Auth::check())
                    @if(auth()->user()->resume)
                    <form action="{{route('application.submit',[$listing->id])}}" method="post">@csrf
                        <button href="#" class="btn btn-primary mt-3">Aplikuj</button>
                    </form>
                    @else
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Aplikuj
                    </button>
                    @endif
                    @else
                    <p>Proszę się zalogować!</p>
                    @endif
                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <form action="{{route('application.submit',[$listing->id])}}" method="post">@csrf
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Zamieść</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="file" />
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
                                        <button type="submit" id="btnApply" disabled class="btn btn-primary">Potwierdź</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const inputElement = document.querySelector('input[type="file"]');

    const pond = FilePond.create(inputElement);

    pond.setOptions({
        server: {
            url: '/',
            process: {
                method: 'POST',
                withCredentials: false,
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                ondata: (formData) => {
                    console.log(pond.getFiles()[0].file)
                    formData.append('file', pond.getFiles()[0].file, pond.getFiles()[0].file.name)

                    return formData
                },
                onload: (response) => {
                    document.getElementById('btnApply').removeAttribute('disabled')
                },
                onerror: (response) => {
                    console.log('Błąd przy zamieszczaniu...', response)
                },
            },
        },
    }, );
</script>

@endsection