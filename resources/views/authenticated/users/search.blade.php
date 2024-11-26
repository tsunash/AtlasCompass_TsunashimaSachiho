@extends('layouts.sidebar')

@section('content')
<div class="search_content w-100 border d-flex">
  <div class="reserve_users_area">
    @foreach($users as $user)
    <div class="border shadow one_person m-2 p-3 rounded">
      <div>
        <span style="color:gray;">ID : </span><span>{{ $user->id }}</span>
      </div>
      <div><span style="color:gray;">名前 : </span>
        <a href="{{ route('user.profile', ['id' => $user->id]) }}">
          <span>{{ $user->over_name }}</span>
          <span>{{ $user->under_name }}</span>
        </a>
      </div>
      <div>
        <span style="color:gray;">カナ : </span>
        <span>({{ $user->over_name_kana }}</span>
        <span>{{ $user->under_name_kana }})</span>
      </div>
      <div>
        @if($user->sex == 1)
        <span style="color:gray;">性別 : </span><span>男</span>
        @elseif($user->sex == 2)
        <span style="color:gray;">性別 : </span><span>女</span>
        @else
        <span style="color:gray;">性別 : </span><span>その他</span>
        @endif
      </div>
      <div>
        <span style="color:gray;">生年月日 : </span><span>{{ $user->birth_day }}</span>
      </div>
      <div>
        @if($user->role == 1)
        <span style="color:gray;">権限 : </span><span>教師(国語)</span>
        @elseif($user->role == 2)
        <span style="color:gray;">権限 : </span><span>教師(数学)</span>
        @elseif($user->role == 3)
        <span style="color:gray;">権限 : </span><span>講師(英語)</span>
        @else
        <span style="color:gray;">権限 : </span><span>生徒</span>
        @endif
      </div>
      <div>
        @if($user->role == 4)
        <span style="color:gray;">選択科目 :</span>
          @foreach($user->subjects as $subjects)
           <span>{{$subjects->subject}}</span>
          @endforeach
        @endif
      </div>
    </div>
    @endforeach
  </div>
  <div class="search_area w-25">
    <div class="m-5">
      <div>
        <p class="mt-5">検索</p>
        <input type="text" class="free_word form-control" style="background-color:#EEE;" name="keyword" placeholder="キーワードを検索" form="userSearchRequest">
      </div>
      <div>
        <label>カテゴリ</label>
        <select form="userSearchRequest" name="category" class="form-control w-auto" style="background-color:#EEE;">
          <option value="name">名前</option>
          <option value="id">社員ID</option>
        </select>
      </div>
      <div>
        <label>並び替え</label>
        <select name="updown" form="userSearchRequest" class="form-control w-auto" style="background-color:#EEE;">
          <option value="ASC">昇順</option>
          <option value="DESC">降順</option>
        </select>
      </div>
      <div class="m-3">
        <div class=" search_conditions border-bottom position-relative">
          <span>検索条件の追加</span>
          <div class="accordion_btn"></div>
        </div>
        <div class="search_conditions_inner">
          <div>
            <label>性別</label>
              <span>男</span><input type="radio" name="sex" value="1" form="userSearchRequest">
              <span>女</span><input type="radio" name="sex" value="2" form="userSearchRequest">
              <span>その他</span><input type="radio" name="sex" value="3" form="userSearchRequest">
            </div>
          <div>
            <label>権限</label>
            <select name="role" form="userSearchRequest" class="engineer form-control w-auto" style="background-color:#EEE;">
              <option selected disabled>----</option>
              <option value="1">教師(国語)</option>
              <option value="2">教師(数学)</option>
              <option value="3">教師(英語)</option>
              <option value="4" class="">生徒</option>
            </select>
          </div>
          <div class="selected_engineer">
            <label>選択科目</label>
            @foreach($all_subjects as $subject)
             <span>{{$subject->subject}}</span><input type="checkbox" name="subjects[]" value="{{$subject->id}}" form="userSearchRequest">
            @endforeach
          </div>
        </div>
      </div>
      <div>
        <input type="submit" name="search_btn" value="検索" form="userSearchRequest" class="btn user_search_btn w-100 my-3">
      </div>
      <div style="text-align:center;">
        <input type="reset" value="リセット" form="userSearchRequest" class="reset_btn">
      </div>
    </div>
    <form action="{{ route('user.show') }}" method="get" id="userSearchRequest"></form>
  </div>
</div>
@endsection
