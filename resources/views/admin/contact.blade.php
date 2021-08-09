@extends('adminlte::page')

@section('content_header')
    <h1>Create a contact</h1>
@stop

@section('content')

    <form action="{{route('contact.store')}}" method="POST">
        @csrf
        @forelse($contact as $data)
            <x-adminlte-input name="address" label="address" placeholder="Enter the address" fgroup-class="col-md-9" value="{{$data->address}}"/>
            <x-adminlte-input name="map" label="map" placeholder="Enter the map" fgroup-class="col-md-9" value="{{$data->map}}"/>
            <x-adminlte-input name="phone" label="phone" placeholder="Enter the phone" fgroup-class="col-md-9" value="{{$data->phone}}"/>
            <x-adminlte-input name="whatsapp" label="whatsapp" placeholder="Enter the whatsapp" fgroup-class="col-md-9" value="{{$data->whatsapp}}"/>
            <x-adminlte-input name="instagram" label="instagram" placeholder="Enter the instagram" fgroup-class="col-md-9" value="{{$data->instagram}}"/>
            <x-adminlte-input name="facebook" label="facebook" placeholder="Enter the facebook" fgroup-class="col-md-9" value="{{$data->facebook}}"/>
            <x-adminlte-input name="mail" label="mail" placeholder="Enter the mail" fgroup-class="col-md-9" value="{{$data->mail}}" type="email"/>
        @empty
            <x-adminlte-input name="address" label="address" placeholder="Enter the address" fgroup-class="col-md-9" value="No data"/>
            <x-adminlte-input name="map" label="map" placeholder="Enter the map" fgroup-class="col-md-9" value="No data"/>
            <x-adminlte-input name="phone" label="phone" placeholder="Enter the phone" fgroup-class="col-md-9" value="No data"/>
            <x-adminlte-input name="whatsapp" label="whatsapp" placeholder="Enter the whatsapp" fgroup-class="col-md-9" value="No data"/>
            <x-adminlte-input name="instagram" label="instagram" placeholder="Enter the instagram" fgroup-class="col-md-9" value="No data"/>
            <x-adminlte-input name="facebook" label="facebook" placeholder="Enter the facebook" fgroup-class="col-md-9" value="No data"/>
            <x-adminlte-input name="mail" label="mail" placeholder="Enter the mail" fgroup-class="col-md-9" value="No data" type="email"/>
        @endforelse
        <div class="ml-2">
            <x-adminlte-button name="submit" class="btn-flat mt-2 mb-2" type="submit" label="Save" theme="success" icon="fas fa-lg fa-save"/>
        </div>
    </form>
@stop



