@extends('master.world')

@section('content')
    <div class="container-fluid">
        <div class="well well-lg">
            {{$location->name()}}
            <div class="btn-group">
                <a href="{{route('location.create', [$world->slug(), $location->slug()])}}" class="btn btn-default">Új helyszín</a>
                <a href="{{route('location.edit', [$world->slug(), $location->slug()])}}" class="btn btn-default">Helyszín szerkesztése</a>
            </div>
        </div>
    </div>
@endsection