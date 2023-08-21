@if(isset($posts) && count($posts) > 0)
<div id="carouselPosts" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ($posts as $index => $post)
        @php
            $author = $authors->firstWhere('id', $post->author);
        @endphp
        @if($index == 0)
            <div class="carousel-item active">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body text-center">
                            @if($author)
                                @if ($author->userType == 2)
                                    <h4 class="card-title text-danger">{{ $author->name }}</h4>
                                @elseif($author->userType == 1)
                                    <h4 class="card-title text-info">{{ $author->name }}</h4>
                                @else
                                    <h4 class="card-title">Author not found</h4>
                                @endif
                            @else
                                <h4 class="card-title">Author not found</h4>
                            @endif
                            <p class="card-text">{{ $post->content }}</p>
                            <p class="card-text">Rating: {{ $post->Rating }}/5</p>
                        </div>
                    </div>
                </div>
            </div>
        @else
        <div class="carousel-item">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        @if($author)
                            @if ($author->userType == 2)
                                <h4 class="card-title text-danger ">{{ $author->name }}</h4>
                            @elseif($author->userType == 1)
                                <h4 class="card-title text-info ">{{ $author->name }}</h4>
                            @else
                                <h4 class="card-title">Author not found</h4>
                            @endif
                        @else
                            <h4 class="card-title">Author not found</h4>
                        @endif
                        <p class="card-text">{{ $post->content }}</p>
                        <p class="card-text">Rating: {{ $post->Rating }}/5</p>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselPosts" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselPosts" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  @else
  <div class="container text-center my-3">
      <h4>Nothing to show yet!</h4>
  </div>
@endif

<script>
    let items = document.querySelectorAll('.carousel .carousel-item')

    items.forEach((el) => {
        const minPerSlide = 4
        let next = el.nextElementSibling
        for (var i=1; i<minPerSlide; i++) {
            if (!next) {
        // wrap carousel by using first child
        next = items[0]
    }
    let cloneChild = next.cloneNode(true)
    el.appendChild(cloneChild.children[0])
    next = next.nextElementSibling
    }
    })
</script>


