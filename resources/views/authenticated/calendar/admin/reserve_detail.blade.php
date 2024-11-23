@extends('layouts.sidebar')

@section('content')
<div class="vh-100 d-flex" style="align-items:center; justify-content:center;">
  <div class="w-50 m-auto h-75">
    <p><span>{{ $formattedDate }}</span><span class="ml-3">{{ $part }}部</span></p>
    <div class="border rounded shadow p-2 bg-white">
      <table class="table">
        <thead style="background-color:#03AAD2; color:#FFF;">
          <tr class="text-center">
            <th class="w-25 p-1">ID</th>
            <th class="w-25 p-1">名前</th>
            <th class="w-25 p-1">場所</th>
          </tr>
        </thead>
        <tbody>
        @foreach($reservePersons as $reservePerson)
          @foreach($reservePerson->users as $user)
           <tr class="text-center table_row">
              <td class="w-25">{{$user->id }}</td>
              <td class="w-25">{{$user->over_name}}              {{$user->under_name}}</td>
              <td class="w-25">リモート</td>
            </tr>
          @endforeach
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
