@extends('master.rpgo')

@section('content')
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">{{Lang::get('worlds.worlds')}}</h3>
            </div>
            <div class="panel-body table-responsive">
                @if($worlds->count())
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>
                                {{Lang::get('worlds.world')}}
                            </th>
                            <th>
                                {{Lang::get('worlds.creator')}}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($worlds as $world)
                        <tr>
                            <td>
                                <a href="{{route('worlds.show',[$world->slug])}}">{{$world->name}}</a>
                            </td>
                            <td>
                                {{$world->creator->name}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @else
                    {{Lang::get('worlds.none')}}
                @endif
            </div>
        </div>
        <div>
            <a href="{{route('worlds.create')}}" class="btn btn-primary pull-right">{{trans('worlds.create.title')}}</a>
        </div>
    </div>
@endsection