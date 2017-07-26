@extends('layouts.dashboard')

@section('content')
  <header>
    <h2>Edit Post</h2>
  </header>

  <div class="content-wrapper">
    <form action="{{ route('admin.posts.update', $post) }}" method="POST">

      @include('layouts.input_errors')

      {{ csrf_field() }}
      {{ method_field('PATCH') }}
      <div class="input-group">
        <label for="title">Title</label>
        <input id="title" type="text" name="title" value="{{ $post->title }}" required>
      </div>
      <div class="input-group">
        <label for="content">Content</label>
        <textarea id="content" name="content" rows="18" required>{{ $post->content }}</textarea>
      </div>
      <div class="input-group">
        <label for="author">Post author</label>
        <input id="username-autocomplete" type="text" name="username" value="{{ $post->account->username }}" required>
        <input id="acc" type="hidden" name="account_id" value="{{ $post->account->id }}" required>
      </div>
      <div class="input-group">
        <input type="submit" name="submit" value="Create Post" >
      </div>
    </form>
  </div>
@endsection
