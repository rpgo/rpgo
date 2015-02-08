@extends('master.world')

@section('content')

    <div class="container-fluid">

        <ul>
            @foreach($locations as $location)
                <li>{{$location->name}}</li>
            @endforeach
        </ul>

    </div>

@endsection