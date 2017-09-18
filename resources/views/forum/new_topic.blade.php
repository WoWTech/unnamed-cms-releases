@if (Auth::check())
  <div class="create-topic-block" style="display: none;">
    <div class="user-info">
      <span class="user-avatar" style="background-image:url('/images/user-avatar.png')"></span>
      <div class="account-details">
        <span class="username">
          {{ Auth::user()->username }}
        </span>
        <span class="group">
          {{ Auth::user()->roles()->first()->display_name }}
        </span>
        <span class="posts">
          {{ Auth::user()->posts_count }} posts
        </span>
      </div>
    </div>

    <div class="topic-details">
      <form action="{{ route('forum.topic.store', $category) }}" method="post">
        {{ csrf_field() }}
        <input type="text" name="title">
        <textarea id="" rows="10" name="content"></textarea>
        <input type="submit" name="" class="red-button" value="Post">
      </form>
    </div>

  </div>
@endif
