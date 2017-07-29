@extends('layouts.app')

@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    {{__('vehicle-types.items')}}
  </div>
  <div class="panel-body">
    <div>
      <a href="{{ route('vehicle-types.index') }}" class="btn btn-default pull-right">
        {{__('crud.form.back', ['item' => __('vehicle-types.item')])}}
      </a>
      <h2>
        {{__('crud.form.create', ['item' => __('vehicle-types.item')])}}
      </h2>
    </div>
    <div class="clearfix"></div>
    <hr>

    <form action="{{ @$vehicleType? route('vehicle-types.update', $vehicleType->id): route('vehicle-types.store') }}" method="POST" class="form-horizontal">
      @if(@$vehicleType)
        {{ method_field('PUT') }}
      @endif
      {{ csrf_field() }}
      <div class="form-group {{@$errors && $errors->has('name')?'has-error':''}}">
        <label for="name" class="col-sm-2 control-label">{{__('crud.form.field', ['item' => __('vehicle-types.fields.name')])}}</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="name" name="name" placeholder="{{__('vehicle-types.fields.name')}}" value="{{ old('name', @$vehicleType->name) }}" autofocus="">
          @if(@$errors && $errors->has('name'))
          <span class="help-block">
            {{ $errors->first('name') }}
          </span>
          @endif
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">{{__('crud.form.save')}}</button>
        </div>
      </div>
    
    </form>

  </div>
</div>
@endsection
