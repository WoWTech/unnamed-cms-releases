<div class="comment">
  <img src="../images/user_avatar.png" alt="" class="avatar">
  <div class="comment-content">
    <div class="comment-header">
      {{ $comment->account->username }}
      <time datetime="{{ $comment->created_at }}">{{ $comment->created_at->diffForHumans() }}</time>

        <div class='action-buttons'>
          @if (Laratrust::can('update-comment') || Laratrust::canAndOwns('update-own-comment', $comment))
            <a href="{{ route('posts.comments.edit', [$post, $comment]) }}" class="edit"></a>
          @endif
          @if (Laratrust::can('delete-comment') || Laratrust::canAndOwns('delete-own-comment', $comment))
            <a href="{{ route('posts.comments.destroy', [$post, $comment]) }}" class="delete method-link" data-method="DELETE"></a>
          @endif
        </div>

    </div>
    <div class="comment-body">{{ $comment->content }}</div>
  </div>
</div>
