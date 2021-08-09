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
    <h1>Create a welcome part</h1>
@stop

@section('plugins.Summernote', true)
@section('content')

    <form action="{{route('home-page-welcome.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @forelse($welcome as $data)
        <x-adminlte-input name="title" label="Title" placeholder="Enter the title" fgroup-class="col-md-9" value="{{$data->title}}"/>
        <x-adminlte-input name="subtitle" label="Subtitle" placeholder="Enter the subtitle" fgroup-class="col-md-9" value="{{$data->subtitle}}"/>

        <div class="ml-2">
            <x-adminlte-text-editor name="text" label="Main text" placeholder="Insert description..." :config="$config">{{$data->text}}</x-adminlte-text-editor>
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

        <label for="thumbnail"></label>
        <img name="thumbnail" width="500px" height="300px" src="{{ asset($data->image) }}">
        @empty
            <x-adminlte-input name="title" label="Title" placeholder="Enter the title" fgroup-class="col-md-9" value="No data"/>
            <x-adminlte-input name="subtitle" label="Subtitle" placeholder="Enter the subtitle" fgroup-class="col-md-9" value="No data"/>

            <div class="ml-2">
                <x-adminlte-text-editor name="text" label="Main text" placeholder="Insert description..." :config="$config">No data</x-adminlte-text-editor>
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
        @endforelse
        <div class="ml-2">
            <x-adminlte-button name="submit" class="btn-flat mt-2 mb-2" type="submit" label="Submit" theme="success" icon="fas fa-lg fa-plus"/>
        </div>
    </form>
@stop
