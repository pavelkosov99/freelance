@php
    $config = [
        "height" => "300",
        "width"  => "950",
    ]
@endphp

@extends('adminlte::page')

@section('content_header')
    <h1>Create a expert</h1>
@stop

@section('plugins.Summernote', true)
@section('content')
    @csrf
    <x-adminlte-input name="title" label="Title" placeholder="Enter the title" fgroup-class="col-md-9"
                      value="{{$expert->title}}" disabled/>
    <x-adminlte-input name="subtitle" label="Subtitle" placeholder="Enter the subtitle" fgroup-class="col-md-9"
                      value="{{$expert->subtitle}}" disabled/>

    <label for="image"></label>
    <img name="image" width="500px" height="300px" src="{{ asset($expert->image) }}">
@stop


