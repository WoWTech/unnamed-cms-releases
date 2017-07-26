<div class="add-comment">
    <img src="../images/user_avatar.png" alt="" class="avatar">
    <div class="input-comment-area">
      <span class="username">{{ Auth::user()->username }}</span>
      <form action="{{ route('posts.comments.store', $post) }}" method="post">
        {{ csrf_field() }}

        @include('layouts.input_errors')
        
        <textarea name="content" id="" cols="30" rows="10" required></textarea>
        <div class="action">
          <input type="submit" class="blue-bg">
        </div>
      </form>
    </div>
</div>
