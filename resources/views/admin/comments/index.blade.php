@extends('layouts.dashboard')

@section('content')
  <header>
    <h2>Comments</h2>
  </header>

  <form action="{{ route('admin.comments.index') }}" method="get">
    <input type="text" name="keywords" class="search-bar" placeholder="Search" value="{{ old('keywords') }}">
  </form>

  <div class="content-wrapper">
    <table>
      <thead>
        <tr>
          <th>Post title</th>
          <th>Content</th>
          <th>Author</th>
          <th>Date</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($comments as $comment)
          <tr>
            <td>{{ !is_null($comment->post) ? $comment->post->title : "Not connected with any post" }}</td>
            <td>{{ $comment->getDescription('content', 100) }}</td>
            <td>{{ !is_null($comment->account) ? $comment->account->username : "Not connected with any account" }}</td>
            <td>{{ $comment->created_at->toFormattedDateString() }}</td>
            <td>
              @permission('update-comment')
                <a href="{{ route('admin.comments.edit', $comment) }}">Edit</a>
              @endpermission
              @permission('delete-comment')
                <a href="{{ route('admin.comments.destroy', $comment) }}" data-method="DELETE" class="method-link">Delete</a>
              @endpermission
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{ $comments->appends(request()->except('page'))->links() }}
  </div>
@endsection

@section('javascript')
    <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>
    <script type="text/javascript">
        setActiveLink('comments');
    </script>
@endsection
