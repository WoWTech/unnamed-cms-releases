@extends('forum.layout')

@section('content')
  @foreach ($categories as $category)

  <section>
    <header>
      <h2>{{$category->name}}</h2>
    </header>
    <div class="categories">
      @foreach ($category->forums as $forum)
        @include('forum.forum')
      @endforeach
    </div>
  </section>
@endforeach
@endsection
