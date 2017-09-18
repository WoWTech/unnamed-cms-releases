@extends('layouts.dashboard')

@section('content')
  <header>
    <h2>Categories</h2>
    {{-- @permission('update-forum-category') --}}
      <a href="{{ route('admin.categories.create') }}" class="action-badge">+Create new</a>
    {{-- @endpermission --}}
  </header>

  <form action="{{ route('admin.comments.index') }}" method="get">
    <input type="text" name="keywords" class="search-bar" placeholder="Search" value="{{ old('keywords') }}">
  </form>

  <div class="content-wrapper">
    <table>
      <thead>
        <tr>
          <th>Title</th>
          <th>Description</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($categories as $category)
          <tr>
            <td><a href="{{route('admin.subcategories.index', $category)}}">{{ $category->name }}</a></td>
            <td>{{ $category->category_description }}</td>
            <td>
                <a href="{{ route('admin.categories.edit', $category) }}">Edit</a>
                <a href="{{ route('admin.categories.destroy', $category) }}" data-method="DELETE" class="method-link">Delete</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{ $categories->appends(request()->except('page'))->links() }}
  </div>
@endsection

@section('javascript')
    <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>
    <script type="text/javascript">
        setActiveLink('forum-categories');
    </script>
@endsection
