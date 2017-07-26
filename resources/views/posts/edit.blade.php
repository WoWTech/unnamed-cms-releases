@extends('layouts/app')

@section('content')

  <section class="page-content">
    <header>
      <h2>Add post</h2>
    </header>

    <form action="{{ route('posts.update', $post) }}" method="post">

      @include('layouts.input_errors')

      {{ csrf_field() }}
      {{ method_field('PATCH') }}
      <div class="input-group">
        <label for="username">Title</label>
        <input name="title" type="text" name="title" value="{{ $post->title }}" required>
      </div>

      <div class="input-group">
        <label for="content">Content</label>
        <textarea title="content" name="content" required>{{ $post->content }}</textarea>
      </div>

      <div class="input-group">
        <input type="submit" value="Post" class="flex-left">
      </div>

    </form>
  </section>

@endsection
