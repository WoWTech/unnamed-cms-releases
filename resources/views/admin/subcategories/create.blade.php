@extends('layouts.dashboard')

@section('content')
  <header>
    <h2>Create Subcategory for "{{ $category->name }}"</h2>
  </header>

  <div class="content-wrapper">
    <form action="{{ route('admin.subcategories.store', $category) }}" method="POST">

      @include('layouts.input_errors')

      {{ csrf_field() }}
      <input type="hidden" name="parent_id" value="{{ $category->id }}">
      <div class="input-group">
        <label for="name">Title</label>
        <input id="name" type="text" name="name" value="" required>
      </div>
      <div class="input-group">
        <label for="category_slug">Short name for url (like "support" or "main_section")</label>
        <input id="category_slug" type="text" name="category_slug" value="" required>
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
