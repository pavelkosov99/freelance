@extends('adminlte::page')

@section('content_header')
    <h1>Create a expert</h1>
@stop

@section('content')

    <form action="{{route('home-page-expert.update', $expert->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-adminlte-input name="title" label="Title" placeholder="Enter the title" fgroup-class="col-md-9" value="{{$expert->title}}"/>
        <x-adminlte-input name="subtitle" label="Subtitle" placeholder="Enter the subtitle" fgroup-class="col-md-9" value="{{$expert->subtitle}}"/>

        <div style="width: 300px;" class="ml-2">
            <x-adminlte-input-file name="image" label="Upload an image" igroup-size="sm" placeholder="Choose an image...">
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-lightblue">
                        <i class="fas fa-upload"></i>
                    </div>
                </x-slot>
            </x-adminlte-input-file>
            <label for="thumbnail"></label>
            <img name="thumbnail" width="500px" height="300px" src="{{ asset($expert->image) }}">
        </div>

        <div class="ml-2">
            <x-adminlte-button name="submit" class="btn-flat mt-2 mb-2" type="submit" label="Edit a expert" theme="success" icon="fas fa-lg fa-plus"/>
        </div>
    </form>
@stop


