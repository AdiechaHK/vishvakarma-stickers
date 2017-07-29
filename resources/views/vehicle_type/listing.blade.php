@extends('layouts.app')

@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    {{__('vehicle-types.items')}}
  </div>
  <div class="panel-body">
    <div>
      <a href="{{ route('vehicle-types.create') }}" class="btn btn-default pull-right">
        {{__('crud.listing.add_caption', ['item' => __('vehicle-types.item')])}}
      </a>
      <h2>
        {{__('crud.listing.title', ['items' => __('vehicle-types.items')])}}
      </h2>
    </div>
    <div class="clearfix"></div>
    <hr>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>{{__('vehicle-types.fields.index')}}</th>
          <th>{{__('vehicle-types.fields.name')}}</th>
          <th class="action-column">{{__('crud.listing.actions')}}</th>
        </tr>
      </thead>
      <tbody>
        @foreach($vehicleTypes as $indx => $vehicleType)
          <tr>
            <td> {{ $indx + 1 }} </td>
            <td> {{ $vehicleType->name }} </td>
            <td>
              <div class="pull-right">
                <form action="{{ route('vehicle-types.destroy', $vehicleType->id) }}" method="POST" class="pull-right" >
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <input type="submit" value="{{__('crud.delete')}}" class="btn btn-danger ">
                </form>
                <a href="{{route('vehicle-types.edit', $vehicleType->id)}}" class="btn btn-default">{{__('crud.edit')}}</a>
                &nbsp;
              </div>

            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{ $vehicleTypes }}
  </div>
</div>
@endsection
