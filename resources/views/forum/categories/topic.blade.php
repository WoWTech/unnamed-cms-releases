@extends('forum.layout')

@section('content')
  <section class="category">
    <header>
      <span class="logo" style="background-image:url('/images/cat-img.png')"></span>
      <h2>{{ $topic->title }}</h2>

      <aside>
        <a href="#" id="new-topic" class="new-topic red-button">New reply</a>
      </aside>
    </header>

    <div class="content topic-replies">
      <div class="topic-reply">
        <div class="manage-reply"></div>
        <div class="manage-topic-actions" onmouseleave="closeActionsMenu(this)" style="display: none;">
          <ul>
            @if (Laratrust::canAndOwns('update-own-topic', $topic) || Laratrust::can('update-forum-topic'))
              <li><a href="{{ route('admin.topic.edit',    [$category, $topic]) }}" class="method-link">Edit</a></li>
            @endif
            @if (Laratrust::canAndOwns('delete-own-topic', $topic) || Laratrust::can('delete-forum-topic'))
              <li><a href="{{ route('admin.topic.destroy', [$category, $topic]) }}" class="method-link" data-method='DELETE'>Delete</a></li>
            @endif
          </ul>
        </div>
        <div class="user-info">
          <span class="user-avatar" style="background-image:url('/images/user-avatar.png')"></span>
          <div class="account-details">
            <span class="username">
              {{ $topic->account->username }}
            </span>
            <span class="group">
              {{ $topic->account->top_role }}
            </span>
            <span class="posts">
              {{ $topic->account->posts_count }} posts
            </span>
          </div>
        </div>

        <div class="reply-content">
          <time>{{ $topic->created_at->diffForHumans() }}</time>
          <p>{{ $topic->content }}</p>
        </div>

      </div>
      @foreach ($replies as $reply)
        <div class="topic-reply">
          @if (Laratrust::canAndOwns(['update-own-topic-reply', 'delete-own-topic-reply'], $reply) || Laratrust::can(['edit-topic-reply', 'delete-topic-reply']))
            <div class="manage-reply"></div>
            <div class="manage-topic-actions" onmouseleave="closeActionsMenu(this)" style="display: none;">
              <ul>
                @if (Laratrust::canAndOwns('update-own-reply', $reply) || Laratrust::can('update-topic-reply'))
                  <li><a href="javascript:void(0)" data-id="{{ $reply->id }}" class="method-link edit-link">Edit</a></li>
                @endif
                @if (Laratrust::canAndOwns('delete-own-reply', $reply) || Laratrust::can('delete-topic-reply'))
                  <li><a href="{{ route('forum.topic.reply.destroy', [$category, $topic, $reply]) }}" class="method-link" data-method='DELETE'>Delete</a></li>
                @endif
              </ul>
            </div>
          @endif
          <div class="user-info">
            <span class="user-avatar" style="background-image:url('/images/user-avatar.png')"></span>
            <div class="account-details">
              <span class="username">
                {{ $reply->account->username }}
              </span>
              <span class="group">
                {{ $reply->account->top_role }}
              </span>
              <span class="posts">
                {{ $reply->account->posts_count }} posts
              </span>
            </div>
          </div>

          <div class="reply-content"data-id="{{ $reply->id }}">
            <time>{{ $reply->created_at->diffForHumans() }}</time>
            <p>{{ $reply->content }}</p>
          </div>

        </div>
      @endforeach

      {{ $replies->links() }}
      @if (Auth::check())
        @permission('create-topic-reply')
          <section class="reply">
              <div class="user-info">
                <span class="user-avatar" style="background-image:url('/images/user-avatar.png')"></span>
                <div class="account-details">
                  <span class="username">
                    {{ Auth::user()->username }}
                  </span>
                  <span class="group">
                    {{ Auth::user()->top_role }}
                  </span>
                  <span class="posts">
                    {{ Auth::user()->posts_count }} posts
                  </span>
                </div>
              </div>
              <div class="reply-content" style="align-items: flex-end">
                <form action="{{ route('forum.topic.reply.create', [$topic->category->category_slug, $topic->id])}}" method="post">
                    {{ csrf_field() }}
                    <textarea name="content" id="" rows="10"></textarea>
                    <input type="submit" class="red-button right" value="Post reply">
                </form>
              </div>
          </section>
        @endpermission
      @else
        <section class="guest-reply">

          <header>
            <h3>Join the Conversation</h3>
          </header>
          <div class="guest-reply-content">

            <div class="user-info">
              <span class="user-avatar" style="background-image:url('/images/user-avatar.png')"></span>
              <div class="account-details">
                <div class="empty-username"></div>
                <div class="empty-group"></div>
              </div>
            </div>

            <div class="guest-reply-content">
              <div class="empty-textarea">
                <p>Have something to say? Log in to join the conversation.</p>
                <div class="buttons">
                  <a href="#" class="login-button">Login</a>
                  <p>OR</p>
                  <a href="#" class="register-button">Register</a>
                </div>
              </div>
            </div>

          </div>
        </section>
      @endif
    </div>

  </section>

@endsection
@section('javascript')
<script src="/js/app.js" charset="utf-8"></script>
<script>
  $(document).on('submit', '.ajax-edit', function(event) {
      event.preventDefault();

      let id = $(this).data('id');
      console.log($(this).serialize());
      $.ajax({
          url: $(this).attr('action'),
          method: 'POST',
          data: $(this).serialize()
      }).done(function(data, status) {
          console.log(status);
      }).fail(function(data) {
        console.log(data.responseText);
      });

      $(`.reply-content[data-id=${id}]`).append(`<p>${$('textarea', this).val()}`);
      $(this).remove();
  });
  $('.edit-link').click(function() {
      let id = $(this).data('id');
      let content = $(`.reply-content[data-id=${id}]>p`).html();
      let $form = $("<form action='{{ route('forum.topic.reply.update', [$category, $topic]) }}' data-id='" + id + "' class='ajax-edit' method='POST'></form>");
      $form.append('{{ method_field('PATCH') }}');
      $form.append('{{ csrf_field() }}');
      $form.append(`<textarea name="content">${content}</textarea>`);
      $form.append(`<input type="hidden" name="reply_id" value="${id}">`);
      $form.append(`<input type="submit">`);
      $(`.reply-content[data-id=${id}]>p`).css('display', 'none');

      $(`.reply-content[data-id=${id}]`).append($form);
  });

  $(".manage-reply").click(function() {
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
@endsection
