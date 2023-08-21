@if(isset($topMovies) && count($topMovies) > 0)
<div id="carouselTopMovies" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      @foreach ($topMovies as $index => $movie)
                      @if($index == 0)
                      <div class="carousel-item active">
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
                      @else
                          <div class="carousel-item">
                              <div class="col-md-3">
                                  <div class="card">
                                      <div class="card-img">
                                          <img src="images/{{$movie->image_url}}" class="rounded mx-auto d-block" style="width: 10rem; height: 15rem">
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
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselTopMovies" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselTopMovies" data-bs-slide="next">
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