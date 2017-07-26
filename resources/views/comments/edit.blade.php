@extends('layouts/app')

@section('content')

  <section class="page-content">
    <header>
      <h2>Edit comment</h2>
    </header>

    <form action="{{ route('posts.comments.update', [$post, $comment]) }}" method="post">

      @include('layouts.input_errors')

      {{ csrf_field() }}
      {{ method_field('PATCH') }}
      <div class="input-group">
        <label for="content">Content</label>
        <textarea title="content" name="content" required>{{ $comment->content }}</textarea>
      </div>

      <div class="input-group">
        <input type="submit" value="Save" class="flex-left">
      </div>

    </form>
  </section>

@endsection
