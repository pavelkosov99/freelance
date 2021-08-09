@php
    $heads = [
        'ID',
        'title',
        'Created / Updated at',
        ['label' => 'Actions', 'width' => 5],
    ];
@endphp

@extends('adminlte::page')

@section('content')
    <a href="{{route('home-page-department.create')}}">
        <x-adminlte-button class="btn-flat mt-2 mb-2" type="submit" label="Add a department" theme="success"
                           icon="fas fa-lg fa-plus"/>
    </a>

    <x-adminlte-datatable id="table" :heads="$heads">
        @forelse($departments as $department)
            <tr>
                <td>{{ $department->id }}</td>
                <td>{{ $department->title }}</td>
                <td>{{ $department->created_at}} / {{$department->updated_at}}</td>
                <td>
                    <div style="display: flex;">
                        <div style="margin-right: auto">
                            <form action="{{route('home-page-department.destroy', $department->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                    <i style="height: 15px" class="fa fa-lg fa-fw fa-trash"></i>
                                </button>
                            </form>
                        </div>

                        <div style="margin-right: auto">
                            <a href="{{route('home-page-department.edit', $department->id)}}">
                                <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                    <i style="height: 15px" class="fa fa-lg fa-fw fa-pen"></i>
                                </button>
                            </a>
                        </div>

                        <div style="margin-right: auto">
                            <a href="{{route('home-page-department.show', $department->id)}}">
                                <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                    <i style="height: 15px" class="fa fa-lg fa-fw fa-eye"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td>No data</td>
                <td>No data</td>
                <td>No data</td>
                <td>No data</td>
            </tr>
        @endforelse
    </x-adminlte-datatable>
@stop
