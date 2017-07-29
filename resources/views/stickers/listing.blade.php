@extends('layouts.app')

@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    {{__('stickers.items')}}
  </div>
  <div class="panel-body">
    <div>
      <a href="{{ route('stickers.create') }}" class="btn btn-default pull-right">
        {{__('crud.listing.add_caption', ['item' => __('stickers.item')])}}
      </a>
      <h2>
        {{__('crud.listing.title', ['items' => __('stickers.items')])}}
      </h2>
    </div>
    <div class="clearfix"></div>
    <hr>
    <table class="table table-bordered">
      <thead>
        <tr>

          <th>{{__('stickers.fields.index')}}</th>
          <th>{{__('stickers.fields.name')}}</th>
          <th>{{__('stickers.fields.father_name')}}</th>
          <th>{{__('stickers.fields.surname')}}</th>
          <th>{{__('stickers.fields.vehicle_number')}}</th>
          <th class="action-column">{{__('crud.listing.actions')}}</th>
        </tr>
      </thead>
      <tbody>
        @foreach($stickers as $indx => $sticker)
          <tr>
            <td> {{ $indx + 1 }} </td>
            <td> {{ $sticker->name }} </td>
            <td> {{ $sticker->father_name }} </td>
            <td> {{ $sticker->surname }} </td>
            <td> {{ $sticker->vehicle_number }} </td>
            <td>
              <div class="pull-right">
                <form action="{{ route('stickers.destroy', $sticker->id) }}" method="POST" class="pull-right" >
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <input type="submit" value="{{__('crud.delete')}}" class="btn btn-danger ">
                </form>
                <a href="{{route('stickers.edit', $sticker->id)}}" class="btn btn-default">{{__('crud.edit')}}</a>
                &nbsp;
              </div>

            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{ $stickers }}
  </div>
</div>
@endsection
