@extends('adminlte::page')

@section('content_header')
    <h1>Create a slide</h1>
@stop

@section('content')
    @csrf
    <x-adminlte-input name="title" label="Title" placeholder="Enter the title" fgroup-class="col-md-9"
                      value="{{$slide->title}}" disabled/>
    <x-adminlte-input name="subtitle" label="Subtitle" placeholder="Enter the subtitle" fgroup-class="col-md-9"
                      value="{{$slide->subtitle}}" disabled/>

    <label for="image"></label>
    <img name="image" width="500px" height="300px" src="{{ asset($slide->image) }}">
@stop


