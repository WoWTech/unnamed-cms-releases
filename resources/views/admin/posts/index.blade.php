@extends('layouts.dashboard')

@section('content')
  <header>
    <h2>Posts</h2>
    <a href="{{ route('admin.posts.create') }}" class="action-badge">+Create new</a>
  </header>

  <form action="{{ route('admin.posts.index') }}" method="get">
    <input type="text" name="keywords" class="search-bar" placeholder="Search" value="{{ old('keywords') }}">
  </form>

  <div class="content-wrapper">
    <table>
      <thead>
        <tr>
          <th>Title</th>
          <th>Content</th>
          <th>Username</th>
          <th>Date</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($posts as $post)
          <tr>
            <td>{{ $post->title }}</td>
            <td>{{ $post->getDescription('content') }}</td>
            <td>{{ $post->account->username }}</td>
            <td>{{ $post->created_at->toFormattedDateString() }}</td>
            <td>
              @permission('update-post')
                <a href="{{ route('admin.posts.edit', $post) }}">Edit</a>
              @endpermission
              @permission('delete-post')
              <a href="{{ route('admin.posts.destroy', $post) }}" data-method="DELETE" class="method-link">Delete</a>
              @endpermission
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{ $posts->appends(request()->except('page'))->links() }}
  </div>
@endsection

@section('javascript')
    <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>
    <script type="text/javascript">
        setActiveLink('posts');
    </script>
@endsection
