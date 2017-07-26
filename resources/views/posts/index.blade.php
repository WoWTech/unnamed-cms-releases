@extends('layouts.app')

@section('content')
  <section class="page-content">

    @foreach($posts as $post)
      @include('posts.post')
    @endforeach

    {{ $posts->links() }}

  </section>
@endsection
