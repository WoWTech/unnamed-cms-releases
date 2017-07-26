@extends('layouts.app')

@section('content')
  <section class="view-post">
    <article>

      <header>
        <h2>{{ $post->title }}</h2>
        <time datetime="{{ $post->created_at }}">{{ $post->created_at->toFormattedDateString() }}</time>
      </header>

      <p class="article-content">{{ $post->content }}</p>

      @if($comments->isNotEmpty() || Laratrust::can('create-comment'))
        <section class="page-content">
          <header>
            <h2>Comments</h2>
          </header>

          @foreach($comments as $comment)
            @include('posts.comment')
          @endforeach

          {{ $comments->links()}}

          @permission('create-comment')
            @include('posts.add_comment');
          @endpermission

        </section>
      @endif

    </article>
  </section>

@endsection
