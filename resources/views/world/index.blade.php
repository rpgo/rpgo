@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Világok</h3>
            </div>
            <div class="panel-body table-responsive">
                @if($worlds->count())
                <table class="table table-striped">
                    <tr>
                        <td>
                            Név
                        </td>
                        <td>
                            Alkotó
                        </td>
                    </tr>
                    @foreach($worlds as $world)
                        <tr>
                            <td>
                                <a href="http://{{$world->slug}}.rpgo.hu">{{$world->name}}</a>
                            </td>
                            <td>
                                {{$world->creator->name}}
                            </td>
                        </tr>
                    @endforeach
                </table>
                @else
                    Nincs egyetlen világ sem.
                @endif
            </div>
        </div>
    </div>
@endsection