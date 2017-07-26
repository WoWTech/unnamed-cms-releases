<article>

  <header>
    <h2><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h2>
    <time datetime="{{ $post->created_at }}">{{ $post->created_at->toFormattedDateString() }}</time>
      <div class='action-buttons'>
        @if (Laratrust::can('update-post') || Laratrust::canAndOwns('update-own-post', $post))
          <a href="{{ route('posts.edit', $post->id) }}" class="edit"></a>
        @endif
        @if (Laratrust::can('delete-post') || Laratrust::canAndOwns('delete-own-post', $post))
          <a href="/posts/{{ $post->id }}" class="delete method-link" data-method="DELETE"></a>
        @endif
      </div>

  </header>

  <p class="article-content">{{ $post->content }}</p>

</article>
