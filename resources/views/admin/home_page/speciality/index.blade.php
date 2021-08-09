@extends('adminlte::page')

@section('content_header')
    <h1>Create a speciality</h1>
@stop

@section('content')

    <form action="{{route('home-page-speciality.store')}}" method="POST">
        @csrf
        @forelse($speciality as $data)
        <x-adminlte-input name="title_1" label="Title 1" placeholder="Enter the title 1" fgroup-class="col-md-9" value="{{$data->title_1}}"/>
        <x-adminlte-input name="subtitle_1" label="Subtitle 1" placeholder="Enter the subtitle 1" fgroup-class="col-md-9" value="{{$data->subtitle_1}}"/>

        <x-adminlte-input name="title_2" label="Title 2" placeholder="Enter the subtitle 2" fgroup-class="col-md-9" value="{{$data->title_2}}"/>
        <x-adminlte-input name="subtitle_2" label="Subtitle 2" placeholder="Enter the subtitle 2" fgroup-class="col-md-9" value="{{$data->subtitle_2}}"/>

        <x-adminlte-input name="title_3" label="Title 3" placeholder="Enter the subtitle 2" fgroup-class="col-md-9" value="{{$data->title_3}}"/>
        <x-adminlte-input name="subtitle_3" label="Subtitle 3" placeholder="Enter the subtitle 2" fgroup-class="col-md-9" value="{{$data->subtitle_3}}"/>
        @empty
            <x-adminlte-input name="title_1" label="Title 1" placeholder="Enter the title 1" fgroup-class="col-md-9" value="No data"/>
            <x-adminlte-input name="subtitle_1" label="Subtitle 1" placeholder="Enter the subtitle 1" fgroup-class="col-md-9" value="No data"/>

            <x-adminlte-input name="title_2" label="Title 2" placeholder="Enter the subtitle 2" fgroup-class="col-md-9" value="No data"/>
            <x-adminlte-input name="subtitle_2" label="Subtitle 2" placeholder="Enter the subtitle 2" fgroup-class="col-md-9" value="No data"/>

            <x-adminlte-input name="title_3" label="Title 3" placeholder="Enter the subtitle 2" fgroup-class="col-md-9" value="No data"/>
            <x-adminlte-input name="subtitle_3" label="Subtitle 3" placeholder="Enter the subtitle 2" fgroup-class="col-md-9" value="No data"/>
        @endforelse
        <div class="ml-2">
            <x-adminlte-button name="submit" class="btn-flat mt-2 mb-2" type="submit" label="Save" theme="success" icon="fas fa-lg fa-save"/>
        </div>
    </form>
@stop


