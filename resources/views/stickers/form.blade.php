@extends('layouts.app')

@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    {{__('stickers.items')}}
  </div>
  <div class="panel-body">
    <div>
      <a href="{{ route('stickers.index') }}" class="btn btn-default pull-right">
        {{__('crud.form.back', ['item' => __('stickers.item')])}}
      </a>
      <h2>
        {{__('crud.form.create', ['item' => __('stickers.item')])}}
      </h2>
    </div>
    <div class="clearfix"></div>
    <hr>

    <form action="{{ @$sticker? route('stickers.update', $sticker->id): route('stickers.store') }}" method="POST" class="form-horizontal">
      @if(@$sticker)
        {{ method_field('PUT') }}
      @endif
      {{ csrf_field() }}

      {{-- Vehicle owner name --}}
      <div class="form-group {{@$errors && $errors->has('name')?'has-error':''}}">
        <label for="name" class="col-sm-3 control-label">{{__('crud.form.field', ['item' => __('stickers.fields.name')])}}</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="name" name="name" placeholder="{{__('stickers.fields.name')}}" value="{{ old('name', @$sticker->name) }}" autofocus="">
          @if(@$errors && $errors->has('name'))
          <span class="help-block">
            {{ $errors->first('name') }}
          </span>
          @endif
        </div>
      </div>


      {{-- Vehicle owner father name --}}
      <div class="form-group {{@$errors && $errors->has('father_name')?'has-error':''}}">
        <label for="father_name" class="col-sm-3 control-label">{{__('crud.form.field', ['item' => __('stickers.fields.father_name')])}}</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="father_name" name="father_name" placeholder="{{__('stickers.fields.father_name')}}" value="{{ old('father_name', @$sticker->father_name) }}">
          @if(@$errors && $errors->has('father_name'))
          <span class="help-block">
            {{ $errors->first('father_name') }}
          </span>
          @endif
        </div>
      </div>


      {{-- Vehicle owner surname --}}
      <div class="form-group {{@$errors && $errors->has('surname')?'has-error':''}}">
        <label for="surname" class="col-sm-3 control-label">{{__('crud.form.field', ['item' => __('stickers.fields.surname')])}}</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="surname" name="surname" placeholder="{{__('stickers.fields.surname')}}" value="{{ old('surname', @$sticker->surname) }}">
          @if(@$errors && $errors->has('surname'))
          <span class="help-block">
            {{ $errors->first('surname') }}
          </span>
          @endif
        </div>
      </div>


      {{-- Vehicle number --}}
      <div class="form-group {{@$errors && $errors->has('vehicle_number')?'has-error':''}}">
        <label for="vehicle_number" class="col-sm-3 control-label">{{__('crud.form.field', ['item' => __('stickers.fields.vehicle_number')])}}</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="vehicle_number" name="vehicle_number" placeholder="{{__('stickers.fields.vehicle_number')}}" value="{{ old('vehicle_number', @$sticker->vehicle_number) }}">
          @if(@$errors && $errors->has('vehicle_number'))
          <span class="help-block">
            {{ $errors->first('vehicle_number') }}
          </span>
          @endif
        </div>
      </div>

      {{-- Mobile number --}}
      <div class="form-group {{@$errors && $errors->has('mobile_number')?'has-error':''}}">
        <label for="mobile_number" class="col-sm-3 control-label">{{__('crud.form.field', ['item' => __('stickers.fields.mobile_number')])}}</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="{{__('stickers.fields.mobile_number')}}" value="{{ old('mobile_number', @$sticker->mobile_number) }}">
          @if(@$errors && $errors->has('mobile_number'))
          <span class="help-block">
            {{ $errors->first('mobile_number') }}
          </span>
          @endif
        </div>
      </div>
      
      {{-- City --}}
      <div class="form-group {{@$errors && $errors->has('city_id')?'has-error':''}}">
        <label for="city_id" class="col-sm-3 control-label">{{__('crud.form.field', ['item' => __('stickers.fields.city_id')])}}</label>
        <div class="col-sm-9">

          <select name="city_id" id="city_id" class="form-control">
            <option value=""> {{ __('crud.select', ['item' => __('stickers.fields.city_id')])}} </option>
            @foreach(App\City::all() as $city)
              <option value="{{ $city->id }}" {!! old('city_id', @$sticker->city_id) == $city->id ? 'selected':'' !!} > {{ $city->name }} </option>
            @endforeach
          </select>

          @if(@$errors && $errors->has('city_id'))
          <span class="help-block">
            {{ $errors->first('city_id') }}
          </span>
          @endif
        </div>
      </div>

      {{-- Vehicle type --}}
      <div class="form-group {{@$errors && $errors->has('vehicle_type_id')?'has-error':''}}">
        <label for="vehicle_type_id" class="col-sm-3 control-label">{{__('crud.form.field', ['item' => __('stickers.fields.vehicle_type_id')])}}</label>
        <div class="col-sm-9">

          <select name="vehicle_type_id" id="vehicle_type_id" class="form-control">
            <option value=""> {{ __('crud.select', ['item' => __('stickers.fields.vehicle_type_id')])}} </option>
            @foreach(App\VehicleType::all() as $vehicleType)
              <option value="{{ $vehicleType->id }}" {!! old('vehicle_type_id', @$sticker->vehicle_type_id) == $vehicleType->id ? 'selected':'' !!}> {{ $vehicleType->name }} </option>
            @endforeach
          </select>

          @if(@$errors && $errors->has('vehicle_type_id'))
          <span class="help-block">
            {{ $errors->first('vehicle_type_id') }}
          </span>
          @endif
        </div>
      </div>
      
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
          <button type="submit" class="btn btn-default">{{__('crud.form.save')}}</button>
        </div>
      </div>
    
    </form>

  </div>
</div>
@endsection
