@extends('master.rpgo')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{trans('worlds.create.title')}}</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="{{ route('worlds.store') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{trans('worlds.name')}}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" maxlength="40" value="{{ old('name') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{trans('worlds.brand')}}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="brand"  maxlength="10" value="{{ old('brand') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{trans('worlds.slug')}}</label>
                                <div class="input-group col-md-6">
                                    <input type="text" class="form-control" name="slug" maxlength="20" pattern="^[a-z0-9]+$" title="subdomain without special characters" value="{{old('slug')}}" aria-describedby="slug-ending">
                                    <span class="input-group-addon" id="slug-ending">.rpgo.hu</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">{{trans('members.name')}}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="admin" maxlength="40" value="{{old('slug')}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{trans('worlds.create.submit')}}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection