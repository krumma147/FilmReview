<style>
    @media (max-width: 767px) {
		.carousel-inner .carousel-item > div {
			display: none;
		}
		.carousel-inner .carousel-item > div:first-child {
			display: block;
		}
	}

	.carousel-inner .carousel-item.active,
	.carousel-inner .carousel-item-next,
	.carousel-inner .carousel-item-prev {
		display: flex;
	}

	/* medium and up screens */
	@media (min-width: 768px) {

		.carousel-inner .carousel-item-end.active,
		.carousel-inner .carousel-item-next {
			transform: translateX(25%);
		}

		.carousel-inner .carousel-item-start.active, 
		.carousel-inner .carousel-item-prev {
			transform: translateX(-25%);
		}
	}

	.carousel-inner .carousel-item-end,
	.carousel-inner .carousel-item-start { 
		transform: translateX(0);
	}
</style>
@if( isset($topMovies) && count($topMovies) > 0 )
    <div class="container text-center my-3">
        <div class="row mx-auto my-auto justify-content-center">
            <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    @foreach ($topMovies as $index => $movie)
                    @if($index == 0)
                    <div class="carousel-item active">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img">
                                    <img src="images/{{$movie->image_url}}" class="img-fluid" style="width: 10rem; height: 15rem">
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">{{$movie->title}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                        <div class="carousel-item">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-img">
                                        <img src="images/{{$movie->image_url}}" class="img-fluid" style="width: 10rem; height: 15rem">
                                    </div>
                                    <div class="card-body">
                                        <a href="">
                                            <h4 class="card-title">{{$movie->title}}</h4>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @endforeach
                </div>
                <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>
        </div>		
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