@extends('layouts.dashboard')

@section('content')
  <header>
    <h2>Edit Subcategory for "{{ $category->name }}"</h2>
  </header>

  <div class="content-wrapper">
    <form action="{{ route('admin.subcategories.update', [$category, $subcategory]) }}" method="POST">

      @include('layouts.input_errors')

      {{ csrf_field() }}
      {{ method_field('PATCH') }}
      <div class="input-group">
        <label for="title">Title</label>
        <input id="title" type="text" name="name" value="{{ $subcategory->name }}" required>
      </div>
      <div class="input-group">
        <label for="category_slug">Short name for url (like "support" or "main_section")</label>
        <input id="category_slug" type="text" name="category_slug" value="{{ $subcategory->category_slug }}" required>
      </div>
      <div class="input-group">
        <label for="content">Description</label>
        <textarea id="content" name="category_description" rows="18" required>{{ $subcategory->category_description }}</textarea>
      </div>
      <div class="input-group">
        <input type="submit" name="submit" value="Save Subcategory" >
      </div>
    </form>
  </div>
@endsection
