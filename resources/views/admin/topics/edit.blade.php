@extends('layouts.dashboard')

@section('content')
  <header>
    <h2>Edit Topic</h2>
  </header>

  <div class="content-wrapper">
    <form action="{{ route('admin.topic.update', [$category, $topic]) }}" method="POST">

      @include('layouts.input_errors')

      {{ csrf_field() }}
      {{ method_field('PATCH') }}
      <div class="input-group">
        <label for="title">Title</label>
        <input id="title" type="text" name="title" value="{{ $topic->title }}" required>
      </div>
      <div class="input-group">
        <label for="content">Content</label>
        <textarea id="content" name="content" rows="18" required>{{ $topic->content }}</textarea>
      </div>
      <div class="input-group">
        <label for="author">Topic author</label>
        <input id="username-autocomplete" type="text" name="username" value="{{ $topic->account->username }}" required>
        <input id="acc" type="hidden" name="account_id" value="{{ $topic->account->id }}" required>
      </div>
      <div class="input-group">
        <input type="submit" name="submit" value="Edit Topic" >
      </div>
    </form>
  </div>
@endsection
