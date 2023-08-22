<base href="/public">
@extends('Layouts.MoviePage.home')
@section('title','Movie Page')
@section('content')

<!-- Start posts-entry -->
<section class="section posts-entry">
    <div class="container">
        <div class="row mb-4">
            <div class="col-sm-6">
                <h2 class="posts-entry-title">Recently Added</h2>
            </div>
            <div class="col-sm-6 text-sm-end"><a href="category.html" class="read-more">View All</a></div>
        </div>
        <div class="row g-3">
            <div class="col">
                @include('layouts.MovieCarousel')
            </div>
        </div>
    </div>
</section>
<!-- End posts-entry -->

<!-- Start posts-entry -->
<section class="section posts-entry">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('layouts.MoviePage.sideNav')
            </div>

            <div class="col-md-9">
                @include('layouts.MoviePage.grid')
            </div>
        </div>
    </div>
</section>

@endsection