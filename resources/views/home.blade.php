@extends('layouts.app')

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">Dashboard</div>

    <div class="panel-body">
        You are logged in!
        <br><br>
        <a href="{{ route('stickers.index') }}">Click to see all stickers</a>
    </div>
</div>
@endsection
