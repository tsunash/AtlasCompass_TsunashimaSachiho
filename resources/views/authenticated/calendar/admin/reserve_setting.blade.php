@extends('layouts.sidebar')
@section('content')
<div class="w-100 h-auto d-flex" style="align-items:center; justify-content:center;">
  <div class="w-100 min-vh-100 border p-5" >
    <div class="shadow pt-5 pb-5" style="border-radius:5px; background:#FFF;">
     <p class="text-center">{{ $calendar->getTitle() }}</p>
     {!! $calendar->render() !!}
     <div class="adjust-table-btn mt-3 mx-auto text-right">
       <input type="submit" class="btn btn-primary" value="登録" form="reserveSetting" onclick="return confirm('登録してよろしいですか？')">
     </div>
    </div>

  </div>
</div>
@endsection
