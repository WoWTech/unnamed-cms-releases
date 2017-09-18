@extends('layouts.dashboard')

@section('content')
  <header>
    <h2>Create Category</h2>
  </header>

  <div class="content-wrapper">
    <form action="{{ route('admin.categories.store') }}" method="POST">

      @include('layouts.input_errors')

      {{ csrf_field() }}
      <div class="input-group">
        <label for="name">Title</label>
        <input id="name" type="text" name="name" value="" required>
      </div>
      <div class="input-group">
        <label for="category_description">Description</label>
        <textarea id="category_description" name="category_description" rows="18"></textarea>
      </div>
      <div class="input-group">
        <input type="submit" name="submit" value="Create Post" >
      </div>
    </form>
  </div>
@endsection
