@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="well well-lg">
            {{$world->name . Lang::get('worlds.createdby') . $world->creator->name}}
        </div>
    </div>
@endsection