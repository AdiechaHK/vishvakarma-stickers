@extends('layouts.app')

@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    {{__('cities.items')}}
  </div>
  <div class="panel-body">
    <div>
      <a href="{{ route('cities.index') }}" class="btn btn-default pull-right">
        {{__('crud.form.back', ['item' => __('cities.item')])}}
      </a>
      <h2>
        {{__('crud.form.create', ['item' => __('cities.item')])}}
      </h2>
    </div>
    <div class="clearfix"></div>
    <hr>

    <form action="{{ @$city? route('cities.update', $city->id): route('cities.store') }}" method="POST" class="form-horizontal">
      @if(@$city)
        {{ method_field('PUT') }}
      @endif
      {{ csrf_field() }}
      <div class="form-group {{@$errors && $errors->has('name')?'has-error':''}}">
        <label for="name" class="col-sm-2 control-label">{{__('crud.form.field', ['item' => __('cities.fields.name')])}}</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="name" name="name" placeholder="{{__('cities.fields.name')}}" value="{{ old('name', @$city->name) }}" autofocus="">
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
