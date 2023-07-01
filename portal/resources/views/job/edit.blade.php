@extends('layouts.admin.main')

@section('content')
<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <h1>Zaktualizuj ogłoszenie</h1>
            @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            <form action="{{route('job.update', [$listing->id])}}" method="post" enctype="multipart/form-data">@csrf
            @method('PUT')    
            <div class="form-group">
                    <label for="title">Zdjęcie</label>
                    <input type="file" name="feature_image" id="feature_image" class="form-control">
                    @if($errors->has('feature_image'))
                        <div class="error">{{$errors->first('feature_image')}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="title">Tytuł</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{$listing->title}}">
                    @if($errors->has('title'))
                    <div class="error">{{$errors->first('title')}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="description">Opis</label>
                    <textarea id="description" name="description" class="form-control summernote">{{$listing->description}}</textarea>
                    @if($errors->has('description'))
                    <div class="error">{{$errors->first('description')}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="description">Zakres obowiązków</label>
                    <textarea id="description" name="roles" class="form-control summernote">{{$listing->roles}}</textarea>
                    @if($errors->has('roles'))
                    <div class="error">{{$errors->first('roles')}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Rodzaj pracy</label>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="job_types" id="Fulltime" value="Fulltime"
                        {{ $listing->job_type === 'Fulltime' ? 'checked' : '' }}>
                        <label for="Fulltime" class="form-check-label">Cały etat</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="job_types" id="Parttime" value="Parttime"
                        {{ $listing->job_type === 'Parttime' ? 'checked' : '' }}>
                        <label for="Parttime" class="form-check-label">Połowa etatu</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="job_types" id="Casual" value="Casual"
                        {{ $listing->job_type === 'Casual' ? 'checked' : '' }}>
                        <label for="Casual" class="form-check-label">Zlecenie</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="job_types" id="Contract" value="Contract"
                        {{ $listing->job_type === 'Contract' ? 'checked' : '' }}>
                        <label for="Contract" class="form-check-label">Kontrakt</label>
                    </div>
                    @if($errors->has('job_type'))
                    <div class="error">{{$errors->first('job_type')}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="address">Adres</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{$listing->address}}>
                    @if($errors->has('address'))
                    <div class="error">{{$errors->first('address')}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="salary">Wynagrodzenie</label>
                    <input type="text" name="salary" id="salary" class="form-control" value="{{$listing->salary}}>
                    @if($errors->has('salary'))
                    <div class="error">{{$errors->first('salary')}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="date">Koniec ważności ogłoszenia</label>
                    <input type="text" name="date" id="datepicker" class="form-control" value="{{$listing->application_close_date}}>
                    @if($errors->has('date'))
                    <div class="error">{{$errors->first('date')}}</div>
                    @endif
                </div>
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-success">Zaktualizuj</button>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    .note-insert {
        display: none !important;
    }

    .error {
        color: red;
        font-weight: bold;
    }
</style>

@endsection