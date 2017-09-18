@extends('forum.layout')

@section('content')
  <section class="category">
    <header>
      <span class="logo" style="background-image:url('/images/cat-img.png')"></span>
      <h2>{{ $category->name }}</h2>

      <aside>
        <input type="text" name="search">
        <a href="javascript:void(0)" id="new-topic" class="new-topic red-button {{ !Auth::check() ? 'disabled' : '' }}">New topic</a>
      </aside>
    </header>

    <div class="content">
      @include('forum.new_topic')
      <table>
        <tbody>
          @if ($topics->isEmpty())
            <div class="no-topics">
              No topics in this category :(
            </div>
          @endif
          @foreach ($topics as $topic)
            <tr class="topic" data-id="{{ $topic->id }}">
              <td class="topic-title">
                @if (Laratrust::canAndOwns(['update-own-topic', 'delete-own-topic'], $topic) || Laratrust::can(['update-forum-topic', 'delete-forum-topic']))
                  <div class="manage-topic"></div>
                  <div class="manage-topic-actions" onmouseleave="closeActionsMenu(this)" style="display: none;">
                    <ul>
                      @if (Laratrust::canAndOwns('update-own-topic', $topic) || Laratrust::can('update-forum-topic'))
                        <li><a href="{{ route('admin.topic.edit',    [$category->category_slug, $topic]) }}" class="method-link">Edit</a></li>
                      @endif
                      @if (Laratrust::canAndOwns('delete-own-topic', $topic) || Laratrust::can('delete-forum-topic'))
                        <li><a href="{{ route('admin.topic.destroy', [$category, $topic]) }}" class="method-link" data-method='DELETE'>Delete</a></li>
                      @endif
                    </ul>
                  </div>
                @endif
                <i class="topic-icon"></i>
                <a href="{{ route('forum.topic', [$category->category_slug, $topic])}}">{{ $topic->title }}</a>
              </td>
              <td class="topic-replies">
                <i class="replies-icon"></i>
                {{ $topic->replies->count() }}
              </td>
              <td class="topic-author">
                {{ $topic->account->username }}
              </td>
              <td class="topic-timestamp">
                <time>{{ $topic->updated_at->diffForHumans() }}</time>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      {{ $topics->links() }}
    </div>

  </section>
@endsection

@section('javascript')
  <script type="text/javascript">
    $('#new-topic').click(function() {
        let display = $('.create-topic-block').css('display') == 'none' ? 'flex' : 'none';
        $('.create-topic-block').css('display', display);
    });
    $(".manage-topic").click(function() {
      if ($(this).next('.manage-topic-actions').length > 0) {
          $(this).next('.manage-topic-actions').css('display', 'block');
          return;
      }
    });
   function closeActionsMenu(element)
   {//do something
      $(element).css('display', 'none');
   };
  </script>
  <script src="/js/app.js" charset="utf-8"></script>
@endsection
