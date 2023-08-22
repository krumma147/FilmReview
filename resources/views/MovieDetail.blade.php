<base href="/public">
@extends('Layouts.MoviePage.home')
@section('title','Movie Page')
@section('content')

	<!-- Start posts-entry -->
    <section class="section sec-halfs py-0 mt-5">
        <div class="container">
            <div class="half-content d-lg-flex align-items-stretch mb-5">
                <div class="img rounded" style="background-image: url('images/{{$movie->image_url}}')" data-aos="fade-in" data-aos-delay="100"></div>
                <div class="text">
                    <h2 class="heading text-primary mb-3 text-center">{{$movie->title}}</h2>
                    <p class="mb-4">
                        Overview: {{$movie->overview}}
                    </p>
                    <p class="mb-4">Categories:
                        @foreach($movie->Categories as $cat)
                        {{$cat->name}}
                        @endforeach
                    </p>
                    <p>Rating: {{$movie->rating}}/100</p>
                </div>
            </div>

            <div class="d-lg-flex align-items-stretch">
                <div class="container">
                    <div class="text">
                        <h2>Reviews: {{ $posts->count() }}</h2>
                        {{-- {{dd($posts)}} --}}
                        @foreach($posts as $post)
                        @php
                            $author = $authors->firstWhere('id', $post->author);
                        @endphp
                            <div class="row mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title d-flex justify-content-between">
                                            <h5>Uploaded by: 
                                                <span class="{{$author->userType == 2 ? "text-danger":"text-info"}}" >
                                                    {{ $author->name }} {{$author->userType == 2 ? "(admin)":""}}
                                                </span>
                                            </h5>
                                            <p class="text-primary mb-3">
                                                Upload Date: {{ $post->created_at }}
                                            </p>
                                        </div>
                                        <div class="card-text">
                                            <p class="text-primary mb-3">
                                                {{ $post->content }}
                                            </p>
                                            <p class="text-primary mb-3">
                                                Rating: {{ $post->Rating }}/5 
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
        </div>
    </section>
	<!-- End posts-entry -->
	<!-- Start posts-entry -->
	
    <section class="section posts-entry">
		<div class="container">
            <h3>Create Review:</h3>
            <form action="/createReview/{{$movie->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-2">
                                    <label for="content" class="form-label">Post Content</label>
                                    <input type="text"
                                        class="form-control" name="content" aria-describedby="helpId" >
                                    <small id="helpId" class="form-text text-muted">Help text</small>
                                </div>


                                <div class="col-md-4 mb-2">
                                    <label for="rating" class="form-label">Movie Rating</label>
                                    <input type="range" id="myRange" class="form-range" min="0" max="5" step="0.5" value="2" name="rating" aria-describedby="helpId">
                                    <p id="rangeValue">Value: </p>
                                </div>
                                <div class="col-md-4">
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </div>
                                </div>           
                            </div>
                        </div>

                    </div>
            </form>
		</div>
	</section>
@endsection