@extends('master.world')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="active"><a href="#">{{ trans('dashboard.menu.overview') }}</a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li><a href="">Nav item</a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li><a href="">Nav item again</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">{{trans('dashboard.title')}}</h1>

            <div class="row">
                <div class="col-xs-9">
                </div>
                <form action="{{route('world.publish', [$world->slug()])}}" method="POST" class="form-inline">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @if(! $world->isPublished())
                    <div class="form-group">
                        <span>{{ trans('dashboard.publication.unpublished') }}</span>
                        <button type="submit" id="submit-btn" class="btn btn-sm btn-primary">{{trans('dashboard.publication.publish')}}</button>
                    </div>
                    @endif
                </form>
            </div>

            <h2 class="sub-header">Section title</h2>
        </div>
    </div>
</div>
@endsection