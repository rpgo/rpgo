@extends('master.rpgo')

@section('content')
<div class="container-fluid">
    @forelse($worlds as $world)
        <div class="well">
            <div class="media">
                <a class="pull-left hidden-xs" href="{{route('worlds.show', [$world->slug()])}}">
                    <img class="media-object" src="http://placehold.it/130x130">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><a href="{{route('worlds.show', [$world->slug()])}}">{{$world->name()}}</a></h4>
                    <p class="text-right">{{$world->brand() . trans('worlds.createdby') . $world->creator()->name()}}</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium adipisci est explicabo magnam
                        nam optio recusandae, ut voluptate. Animi aperiam at dolorem esse nobis perferendis quibusdam.
                        Dignissimos dolorum odio reprehenderit!</p>
                    <ul class="list-inline list-unstyled">
                        <li><span>{{trans('members.members') . ': ' . count($world->members())}} </span></li>
                        <li>|</li>
                        <li>
                            @foreach($world->members() as $member)
                                <span>{{$member->name()}}</span>
                            @endforeach
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    @empty
        {{trans('worlds.none')}}
    @endforelse
</div>
@endsection