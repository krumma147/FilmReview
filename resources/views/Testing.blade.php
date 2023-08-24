<base href="/public">
@extends('Layouts.MoviePage.home')
@section('title','Testing Page')
@section('content')


<div class="container">
    <div class="row" id="allMoviesContainer">
        <!-- Display all movies here using JS -->
    </div>
</div>

<script>
    let fetchMovies = [];

    fetch('http://127.0.0.1:8000/api/movies')
        .then(response => response.json())
        .then(data => {
            // Process the data here
            fetchMovies = data;

            let filteredContainer = document.getElementById('filteredMoviesContainer');
            let allContainer = document.getElementById('allMoviesContainer');

            if (fetchMovies.length > 0) {
                fetchMovies.forEach(movie => {
                    let card = document.createElement('div');
                    card.classList.add('col-md-3', 'col-sm-6', 'mb-3');
                    card.innerHTML = `
                        <a href="/moviedetail/${movie.id}" class="card" style="height: 350px">
                            <div class="card-img">
                                <img src="images/${movie.image_url}" class="rounded mx-auto d-block" style="width: 10rem; height: 15rem">
                            </div>
                            <div class="card-body text-center">
                                <p>${movie.rating}/100</p>
                                <h6 class="card-titler text-wrap overflow-hidden">${movie.title}</h6>
                            </div>
                        </a>
                    `;

                    allContainer.appendChild(card);
                });
            } else {
                allContainer.innerHTML = '<h4 class="text-danger text-center">No movies found</h4>';
            }
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
</script>

<div class="container">
    <h2>Create New Movie</h2>
    <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="overview" class="form-label">Overview</label>
            <textarea class="form-control" id="overview" name="overview" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label for="release_date" class="form-label">Release Date</label>
            <input type="date" class="form-control" id="release_date" name="release_date" required>
        </div>
        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <input type="number" class="form-control" id="rating" name="rating" min="0" max="100" required>
        </div>
        <div class="mb-4 d-flex">
            <label for="category_id">Category:</label>
            <select class="select col-md-3 offset-md-1" name="Categories[]" id="category_id" multiple></select>
        </div>

        <script>
            const categorySelect = document.getElementById('category_id');

            fetch('http://127.0.0.1:8000/api/categories')
                .then(response => response.json())
                .then(data => {
                    data.forEach(category => {
                        const option = document.createElement('option');
                        option.value = category.id;
                        option.textContent = category.name;
                        categorySelect.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error fetching categories:', error);
                });
        </script>
        <div class="mb-3">
            <label for="image_url" class="form-label">Image</label>
            <input type="file" class="form-control" id="image_url" name="image_url" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Movie</button>
    </form>
</div>
@endsection