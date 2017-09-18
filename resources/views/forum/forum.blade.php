<a class="category" href="{{route('forum') . "/{$forum->category_slug}"}}">
  <span class="category-logo" style="background-image:url('images/cat-img.png')"></span>
  <div class="category-details">
    <h3>{{$forum->name}}</h3>
    <span class="category-description">
      {{$forum->category_description}}
    </span>
  </div>
</a>
