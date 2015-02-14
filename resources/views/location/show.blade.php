@extends('master.world')

@section('content')
    <div class="container-fluid">
        <h2 class="page-header">
            {{$location->name()}}
        </h2>
        <div class="row">
            <ol class="breadcrumb">
                @foreach($location->breadcrumbs() as $breadcrumb)
                    <li><a href="{{route('location.show', [$world->slug(), join('/', $breadcrumb->path())])}}">{{$breadcrumb->name()}}</a></li>
                @endforeach
            </ol>
        </div>
        <div class="well well-lg">
            <div class="row">
                <div class="btn-group">
                    <a href="{{route('location.create', [$world->slug(), join('/',$location->path())])}}" class="btn btn-default">Új helyszín</a>
                    <a href="{{route('location.edit', [$world->slug(), join('/',$location->path())])}}" class="btn btn-default">Helyszín szerkesztése</a>
                </div>
            </div>
            <div class="row">
                <div class="sub-header">
                    <h3>Helyszínek</h3>
                </div>
                @foreach($location->locations() as $sublocation)
                    <div class="well"><a href="{{route('location.show', [$world->slug(), join('/', $sublocation->path())])}}">{{$sublocation->name()}}</a></div>
                @endforeach
            </div>
        </div>
    </div>
@endsection