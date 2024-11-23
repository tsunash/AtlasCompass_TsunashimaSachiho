@extends('layouts.sidebar')

@section('content')
<div class="board_area w-100 border m-auto d-flex">
  <div class="post_view w-75 mt-5">
    <p class="w-75 m-auto">投稿一覧</p>
    @foreach($posts as $post)
    <div class="post_area border w-75 m-auto p-3">
      <p><span>{{ $post->user->over_name }}</span><span class="ml-3">{{ $post->user->under_name }}</span>さん</p>
      <p><a href="{{ route('post.detail', ['id' => $post->id]) }}">{{ $post->post_title }}</a></p>
      <div class="post_bottom_area d-flex">
        <div>
          @foreach($post->subCategories as $category)
          <div class="sub_category_icon rounded">{{ $category->sub_category}}</div>
          @endforeach
        </div>
        <div class="d-flex post_status">
          <div class="mr-5">
            <i class="fa fa-comment"></i><span class="comment_counts">{{$post->comment_count}}</span>
          </div>
          <div>
            @if(Auth::user()->is_Like($post->id))
            <p class="m-0"><i class="fas fa-heart un_like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}">{{$post->like_count}}</span></p>
            @else
            <p class="m-0"><i class="fas fa-heart like_btn" post_id="{{ $post->id }}"></i><span class="like_counts{{ $post->id }}">{{$post->like_count}}</span></p>
            @endif
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <div class="other_area w-25 mt-5 mr-5">
    <div class="mt-4">
      <div class="btn post_btn w-100 mb-4"><a href="{{ route('post.input') }}">投稿</a></div>
      <div class="btn-group w-100 mb-4">
        <input class="form-control bg-transparent" type="text" placeholder="キーワードを検索" name="keyword" form="postSearchRequest">
        <input class="btn search_btn" type="submit" value="検索" form="postSearchRequest">
      </div>
      <div class="d-flex mb-4">
        <input type="submit" name="like_posts" class="btn like_posts_btn w-50 mr-1" value="いいねした投稿" form="postSearchRequest">
        <input type="submit" name="my_posts" class="btn my_posts_btn w-50" value="自分の投稿" form="postSearchRequest">
      </div>

      <p>カテゴリー検索</p>
      <ul>
        @foreach($categories as $category)
        <li class="main_categories" category_id="{{ $category->id }}">
          <div class="position-relative border-bottom ">
            <a class="btn btn-link category_conditions">
              <span>{{ $category->main_category }}</span><div class="accordion_btn"></div>
            </a>
          </div>
          <div class="category_conditions_inner category_num{{ $category->id }}">
            <ul>
              @foreach($category->subCategories as $subCategory)
              <li class="border-bottom m-3">
                <input type="submit" name="category_word" class="category_btn" value="{{$subCategory->sub_category}}" form= "postSearchRequest">
              </li>
              @endforeach
            </ul>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
  <form action="{{ route('post.show') }}" method="get" id="postSearchRequest"></form>
</div>
@endsection
