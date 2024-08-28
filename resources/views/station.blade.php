@extends('layouts.app')
@section('title',  "{$station->availableBikes} - {$station->name}")
@section('content')
<div class="flex flex-col items-center">
    <x-station-card-small :station="$station"/>
</div>
@endsection
