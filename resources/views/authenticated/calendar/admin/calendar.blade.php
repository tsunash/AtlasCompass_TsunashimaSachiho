@extends('layouts.sidebar')

@section('content')
<div class="w-75 m-auto">
  <div class="w-100 border shadow h-auto p-5 my-5"  style="border-radius:5px; background:#FFF;">
      <p class="text-center">{{ $calendar->getTitle() }}</p>
      <p>{!! $calendar->render() !!}</p>
  </div>
</div>
@endsection
