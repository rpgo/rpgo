@extends('master.world')

@section('content')
    <div class="container-fluid">
        <div class="well well-lg">
            {{$world->name . trans('worlds.createdby') . $world->creator->name}}
        </div>
    </div>
@endsection