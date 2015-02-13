@extends('master.world')

@section('content')
    <div class="container-fluid">
        <div class="well well-lg">
            {{$location->name()}}
        </div>
    </div>
@endsection