@extends('master.world')

@section('content')
    <div class="container-fluid">
        <div class="well well-lg">
            <h2>
                {{$location->name()}}
            </h2>
            <ol class="breadcrumb">
                @foreach($location->breadcrumbs() as $breadcrumb)
                    <li><a href="{{route('location.show', [$world->slug(), $breadcrumb])}}">{{$breadcrumb}}</a></li>
                @endforeach
            </ol>
            <div class="btn-group">
                <a href="{{route('location.create', [$world->slug(), $location->slug()])}}" class="btn btn-default">Új helyszín</a>
                <a href="{{route('location.edit', [$world->slug(), $location->slug()])}}" class="btn btn-default">Helyszín szerkesztése</a>
            </div>
        </div>
    </div>
@endsection