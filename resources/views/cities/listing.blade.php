@extends('layouts.app')

@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    {{__('cities.items')}}
  </div>
  <div class="panel-body">
    <div>
      <a href="{{ route('cities.create') }}" class="btn btn-default pull-right">
        {{__('crud.listing.add_caption', ['item' => __('cities.item')])}}
      </a>
      <h2>
        {{__('crud.listing.title', ['items' => __('cities.items')])}}
      </h2>
    </div>
    <div class="clearfix"></div>
    <hr>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>{{__('cities.fields.index')}}</th>
          <th>{{__('cities.fields.name')}}</th>
          <th class="action-column">{{__('crud.listing.actions')}}</th>
        </tr>
      </thead>
      <tbody>
        @foreach($cities as $indx => $city)
          <tr>
            <td> {{ $indx + 1 }} </td>
            <td> {{ $city->name }} </td>
            <td>
              <div class="pull-right">
                <form action="{{ route('cities.destroy', $city->id) }}" method="POST" class="pull-right" >
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <input type="submit" value="{{__('crud.delete')}}" class="btn btn-danger ">
                </form>
                <a href="{{route('cities.edit', $city->id)}}" class="btn btn-default">{{__('crud.edit')}}</a>
                &nbsp;
              </div>

            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{ $cities }}
  </div>
</div>
@endsection
