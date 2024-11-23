@extends('layouts.sidebar')

@section('content')
<div class="pt-5" style="background:#ECF1F6;">
  <div class="border shadow w-75 mx-auto mb-5 pb-5" style="border-radius:5px; background:#FFF;">
    <div class="mt-5 mx-5" style="border-radius:5px;">
      <p class="text-center">{{ $calendar->getTitle() }}</p>
      <div class="">
        {!! $calendar->render() !!}
      </div>
      <div class="text-right mx-auto pt-3">
        <input type="submit" class="btn btn-primary" value="予約する" form="reserveParts">
      </div>
    </div>
    <div class="modal js-modal">
      <div class="modal__bg js-modal-close"></div>
      <div class="modal__content">
        <p class="modal-inner-date">予約日：<span></span></p>
        <p class="modal-inner-part">時間：<span></span></p>
        <p>上記の予約をキャンセルしてもよろしいですか？</p>
        <a class="btn btn-primary js-modal-close" href="">閉じる</a>
        <input type="hidden" name="date" form="deleteParts">
        <input type="hidden" name="part" form="deleteParts">
        <input type="submit" class="btn btn-danger js-cancel" value="キャンセル" form="deleteParts">
      </div>
    </div>
  </div>
</div>
@endsection
