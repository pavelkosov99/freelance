@extends('adminlte::page')

@section('content_header')
    <h1>Change password</h1>
@stop

@section('content')

    <form action="{{route('change_password.store')}}" method="POST">
        @csrf
            <x-adminlte-input name="pass" label="Password" placeholder="Enter new password" fgroup-class="col-md-9"/>
            <x-adminlte-input name="repeat_pass" label="Repeat Password" placeholder="Please repeat the password" fgroup-class="col-md-9" />
        <div class="ml-2">
            <x-adminlte-button name="submit" class="btn-flat mt-2 mb-2" type="submit" label="Save" theme="success" icon="fas fa-lg fa-save"/>
        </div>
    </form>
@stop


