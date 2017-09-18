@extends('layouts.dashboard')

@section('content')
  <header>
    <h2>Edit Category</h2>
  </header>

  <div class="content-wrapper">
    <form action="{{ route('admin.categories.update', $category) }}" method="POST">

      @include('layouts.input_errors')

      {{ csrf_field() }}
      {{ method_field('PATCH') }}
      <div class="input-group">
        <label for="title">Title</label>
        <input id="title" type="text" name="name" value="{{ $category->name }}" required>
      </div>
      <div class="input-group">
        <label for="content">Description</label>
        <textarea id="content" name="category_description" rows="18" required>{{ $category->category_description }}</textarea>
      </div>
      <div class="input-group">
        <input type="submit" name="submit" value="Save Category" >
      </div>
    </form>
  </div>
@endsection
