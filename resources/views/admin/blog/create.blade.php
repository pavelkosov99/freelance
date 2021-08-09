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
    <h1>Create a blog</h1>
@stop

@section('plugins.Summernote', true)
@section('content')

    <form action="{{route('blog.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <x-adminlte-input name="title" label="Title" placeholder="Enter the title" fgroup-class="col-md-9"/>
        <x-adminlte-input name="subtitle" label="Subtitle" placeholder="Enter the subtitle" fgroup-class="col-md-9"/>

        <div class="ml-2">
            <x-adminlte-text-editor name="text" label="Main text" placeholder="Insert description..." :config="$config"/>
        </div>

        <div style="width: 300px;" class="ml-2">
            <x-adminlte-input-file name="image" label="Upload an image" igroup-size="sm" placeholder="Choose an image...">
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-lightblue">
                        <i class="fas fa-upload"></i>
                    </div>
                </x-slot>
            </x-adminlte-input-file>
        </div>

        <div class="ml-2">
            <x-adminlte-button name="submit" class="btn-flat mt-2 mb-2" type="submit" label="Add a blog" theme="success" icon="fas fa-lg fa-plus"/>
        </div>
    </form>
@stop
