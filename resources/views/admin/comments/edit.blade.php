@extends('layouts.dashboard')

@section('content')
  <header>
    <h2>Edit Comment</h2>
  </header>

  <div class="content-wrapper">
    <form action="{{ route('admin.comments.update', $comment) }}" method="POST">
      
      @include('layouts.input_errors')

      {{ csrf_field() }}
      {{ method_field('PATCH') }}
      <div class="input-group">
        <label for="content">Content</label>
        <textarea id="content" name="content" rows="18" required>{{ $comment->content }}</textarea>
      </div>
      <div class="input-group">
        <input type="submit" name="submit" value="Save" >
      </div>
    </form>
  </div>
@endsection
