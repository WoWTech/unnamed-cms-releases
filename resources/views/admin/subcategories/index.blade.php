@extends('layouts.dashboard')

@section('content')
  <header>
    <h2>{{$category->name}}</h2>
    {{-- @permission('update-category') --}}
      <a href="{{ route('admin.subcategories.create', $category) }}" class="action-badge">+Create new</a>
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
        @foreach($subcategories as $subcategory)
          <tr>
            <td><a href="{{route('admin.topic.index', $subcategory)}}">{{ $subcategory->name }}</a></td>
            <td>{{ $subcategory->category_description }}</td>
            <td>
                <a href="{{ route('admin.subcategories.edit', [$category, $subcategory]) }}">Edit</a>
                <a href="{{ route('admin.subcategories.destroy', [$category, $subcategory]) }}" data-method="DELETE" class="method-link">Delete</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{ $subcategories->appends(request()->except('page'))->links() }}
  </div>
@endsection

@section('javascript')
    <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>
    <script type="text/javascript">
        setActiveLink('forum-subcategories');
    </script>
@endsection
