@extends('layouts.dashboard')

@section('content')
  <header>
    <h2>Dashboard</h2>
  </header>

  <div class="content">

    <div class="card">
      <header>
        New posts
      </header>

      <div class="card-body">
        <table>
          <thead>
            <tr>
              <th>Title</th>
              <th>User</th>
              <th>Date</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($posts as $post)
              <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->account->username }}</td>
                <td>{{ $post->created_at->toFormattedDateString() }}</td>
                <td>
                  @permission('update-post')
                    <a href="{{ route('admin.posts.edit', $post) }}">Edit</a>
                  @endpermission
                  @permission('delete-post')
                    <a href="{{ route('admin.posts.destroy', $post) }}" class="method-link" data-method="DELETE">Delete</a>
                  @endpermission
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <div class="card">
      <header>
        New comments
      </header>

      <div class="card-body">
        <table>
          <thead>
            <tr>
              <th>Comment</th>
              <th>User</th>
              <th>Date</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($comments as $comment)
              <tr>
                <td>{{ $comment->content }}</td>
                <td>{{ $comment->account->username }}</td>
                <td>{{ $comment->created_at->toFormattedDateString() }}</td>
                <td>
                  @permission('update-comment')
                    <a href="{{ route('admin.comments.edit', $comment) }}">Edit</a>
                  @endpermission
                  @permission('delete-comment')
                    <a href="{{ route('admin.comments.destroy', $comment)}}" class="method-link" data-method="DELETE">Delete</a>
                  @endpermission
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <div class="card">
      <header>
        Registered users
      </header>

      <div class="card-body">
        <table>
          <thead>
            <tr>
              <th>Username</th>
              <th>Email</th>
              <th>Date</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
              <tr>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->joindate->toFormattedDateString() }}</td>
                <td>
                  @permission('update-user')
                    <a href="{{ route('admin.accounts.edit', $user) }}">Edit</a>
                  @endpermission
                  @permission('delete-user')
                    <a href="{{ route('admin.accounts.destroy', $user)}}" class="method-link" data-method="DELETE">Delete</a>
                  @endpermission
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

  </div>
@endsection

@section('javascript')
  <script type="text/javascript">
      setActiveLink('dashboard');
  </script>
@endsection
