@php
    $config = [
        "height" => "300",
        "width"  => "950",

        "toolbar" => [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontname'],
            ['forecolor'],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']],
        ],
    ]
@endphp

@extends('adminlte::page')

@section('content_header')
    <h1>Create a department</h1>
@stop

@section('plugins.Summernote', true)
@section('content')
    @csrf
    <x-adminlte-input name="title" label="Title" placeholder="Enter the title" fgroup-class="col-md-9"
                      value="{{$department->title}}" disabled/>
    <x-adminlte-input name="subtitle" label="Subtitle" placeholder="Enter the subtitle" fgroup-class="col-md-9"
                      value="{{$department->subtitle}}" disabled/>

    <div class="ml-2">
        <x-adminlte-text-editor name="text" label="Main text" placeholder="Insert description..." :config="$config"
                                disabled> {{$department->text}} </x-adminlte-text-editor>
    </div>

    <label for="image"></label>
    <img name="image" width="500px" height="300px" src="{{ asset($department->image) }}">
@stop


