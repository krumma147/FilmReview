{{-- <section>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Categories</span>
        </div>
        @foreach($categories as $cat)
        <div class="container-fluid">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="cat{{$cat->id}}">
                <label class="form-check-label" for="flexCheckDefault">
                  {{$cat->name}}
                </label>
            </div>
        </div>
        @endforeach
      </nav>
</section> --}}
<section>
    <form action="{{ route('filterMovies') }}" method="GET">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Categories</span>
            </div>
            @foreach($categories as $cat)
            <div class="container-fluid">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="categories[]" value="{{ $cat->id }}" id="cat{{ $cat->id }}">
                    <label class="form-check-label" for="cat{{ $cat->id }}">
                        {{ $cat->name }}
                    </label>
                </div>
            </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Filter</button>
        </nav>
    </form>
</section>