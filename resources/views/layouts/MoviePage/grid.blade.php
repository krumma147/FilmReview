@if(isset($filteredMovies))
<div class="card-footer custom-pagination">
    <ul class="pagination">
        {{ $filteredMovies->links() }}
    </ul>
</div>
<div class="container">
    <div class="row">
        @foreach($filteredMovies as $movie)
        <div class="col-md-3 col-sm-6 mb-3">
            <a href="/moviedetail/{{$movie->id}}" class="card" style="height: 350px">
            {{-- <div class="card" style="height: 350px"> --}}
                <div class="card-img">
                    <img src="images/{{$movie->image_url}}" class="rounded mx-auto d-block" style="width: 10rem; height: 15rem">
                </div>
                <div class="card-body text-center">
                    <p>{{$movie->rating}}/100</p>
                    <h6 class="card-titler text-wrap overflow-hidden">{{$movie->title}}</h6>
                </div>
            {{-- </div> --}}
            </a>
        </div>
        @endforeach
    </div>
  </div>
@else
<div class="container">
    <div class="row">
        @foreach($movies as $movie)
        <div class="col-md-3 col-sm-6 mb-3">
            <a href="/moviedetail/{{$movie->id}}" class="card" style="height: 350px">
            {{-- <div class="card" style="height: 350px"> --}}
                <div class="card-img">
                    <img src="images/{{$movie->image_url}}" class="rounded mx-auto d-block" style="width: 10rem; height: 15rem">
                </div>
                <div class="card-body text-center">
                    <p>{{$movie->rating}}/100</p>
                    <h6 class="card-titler text-wrap overflow-hidden">{{$movie->title}}</h6>
                </div>
            {{-- </div> --}}
            </a>
        </div>
        @endforeach
    </div>
</div>
@endif