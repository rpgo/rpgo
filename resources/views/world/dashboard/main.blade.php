@extends('master.world')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li><a href="">Nav item</a></li>
            </ul>
            <ul class="nav nav-sidebar">
                <li><a href="">Nav item again</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Admin-panel</h1>

            <div class="row">
                <div class="col-xs-9">
                </div>
                <form action="{{route('world.publish', [$world->slug()])}}" method="POST" class="form-inline col-xs-6">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @if(! $world->isPublished())
                    <div class="form-group">
                        <label for="submit-btn">Az oldalad még nincs élesítve.</label>
                        <button type="submit" id="submit-btn" class="btn btn-sm btn-primary">Élesítem!</button>
                    </div>
                    @endif
                </form>
            </div>

            <h2 class="sub-header">Section title</h2>
        </div>
    </div>
</div>
@endsection