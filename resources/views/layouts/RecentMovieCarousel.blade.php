@if(isset($topMovies) && count($topMovies) > 0)
<div id="carouselRecentMovies" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    @foreach ($recentMovies as $index => $movie)
    @if($index == 0)
    <div class="carousel-item active">
      <div class="col-md-3">
          <div class="card" style="height: 580px">
              <div class="card-img">
                  <img src="images/{{$movie->image_url}}" class="img-fluid rounded mx-auto d-block" >
              </div>
              <div class="card-body">
                  <a href="moviedetail/{{$movie->id}}">
                      <h4 class="card-title text-center">{{$movie->title}}</h4>
                  </a>
              </div>
          </div>
      </div>
  </div>
  @else
      <div class="carousel-item">
          <div class="col-md-3">
              <div class="card" style="height: 580px">
                  <div class="card-img">
                      <img src="images/{{$movie->image_url}}" class="img-fluid rounded mx-auto d-block">
                  </div>
                  <div class="card-body">
                      <a href="moviedetail/{{$movie->id}}">
                          <h4 class="card-title text-center">{{$movie->title}}</h4>
                      </a>
                  </div>
              </div>
          </div>
      </div>
  @endif
  @endforeach
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselRecentMovies" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselRecentMovies" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
@else
<div class="container text-center my-3">
    <h4>Nothing to show yet!</h4>
</div>
@endif