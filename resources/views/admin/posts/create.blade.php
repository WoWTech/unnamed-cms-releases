@extends('layouts.dashboard')

@section('content')
  <header>
    <h2>Create Post</h2>
  </header>

  <div class="content-wrapper">
    <form action="{{ route('admin.posts.store') }}" method="POST">

      @include('layouts.input_errors')
      
      {{ csrf_field() }}
      <div class="input-group">
        <label for="title">Title</label>
        <input id="title" type="text" name="title" value="" required>
      </div>
      <div class="input-group">
        <label for="content">Content</label>
        <textarea id="content" name="content" rows="18" required></textarea>
      </div>
      <div class="input-group">
        <input type="submit" name="submit" value="Create Post" >
      </div>
    </form>
  </div>
@endsection
