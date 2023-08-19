
@if(isset($posts) && count($posts) > 0)
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($posts as $index => $post)
                @php
                    $author = $authors->firstWhere('id', $post->author);
                @endphp
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <div class="card">
                        <div class="card-body">
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
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
@else
    <div class="container text-center my-3">
        <h4>Nothing to show yet!</h4>
    </div>
@endif


{{-- @foreach ($movies as $index => $movie)
        <div class="card">
            <div class="card-img">
                <img src="{{$movie->image_url}}" class="img-fluid">
            </div>
            <div class="card-body">
                <h4 class="card-title">{{$movie->title}}</h4>
            </div>
        </div>
        @endforeach --}}

<script>
    let items = document.querySelectorAll('.carouselPost .carouselPost-item')

    items.forEach((el) => {
        const minPerSlide = 4
        let next = el.nextElementSibling
        for (var i=1; i<minPerSlide; i++) {
            if (!next) {
        // wrap carouselPost by using first child
        next = items[0]
    }
    let cloneChild = next.cloneNode(true)
    el.appendChild(cloneChild.children[0])
    next = next.nextElementSibling
    }
    })
</script>