@extends('Layouts.AdminHome')
@section('title','Movies')
@section('content')

<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Movies</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="/movies/create" class="btn btn-primary">New Film</a>
                {{-- <input type="submit" value="Create" class="btn btn-primary" onclick="return window.location.href='/movies/create'" ></input> --}}
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<section class="content">
					<!-- Default box -->
	<div class="container-fluid">
		<div class="card">
			<div class="card-header">
				<div class="card-tools">
					<div class="input-group input-group" style="width: 250px;">
						<input type="text" name="table_search" class="form-control float-right" placeholder="Search">
					
						<div class="input-group-append">
							<button type="submit" class="btn btn-default">
							<i class="fas fa-search"></i>
							</button>
						</div>
						</div>
				</div>
			</div>
			<div class="card-body table-responsive p-0">								
				<table class="table table-hover text-nowrap">
                    @if(count($movies) == 0 || $movies == null)
                        <h4 class="text-danger text-center">The List is empty</h4>
                    @else

                    <thead>
						<tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Status</th>
                            <th scope="col">Overview</th>
                            <th scope="col">Language</th>
                            <th scope="col">Categories</th> 
                            <th scope="col">Image</th> 
                            <th scope="col">Release Date</th>
                            <th scope="col">Actions</th>
						</tr>
					</thead>
					<tbody>
                        @foreach($movies as $movie)
                        <tr class="text-center">
                            <td scope="row">{{$movie->id}}</td>
                            <td>
                                <a href="/movies/{{$movie->id}}">
                                    {{$movie->title}}
                                </a>
                            </td>
                            <td>{{$movie->status}}</td>
                            <td>{{$movie->overview}}</td>
                            <td>{{$movie->language}}</td>
                            
                            
                            <td>
                                @foreach($movie->Categories as $cat)
                                <a href="/categories/{{$cat->id}}">
                                    {{$cat->name}}
                                </a>
                                @endforeach
                            </td>

                            <td>
                                <img src="{{asset('images/' . $movie->image_url)}}" alt="{{$movie->name}} movie image" style="height: 50px; width: 50px" />
                            </td>

                            <td>{{$movie->release_date}}</td>

                            <td class="d-flex">
                                <input type="submit" value="Edit" class="btn btn-primary mt-2 me-2" onclick="return window.location.href='/movies/{{$movie->id}}/edit'" ></input>
                                <form action="movies/{{$movie->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete" class="btn btn-danger mt-2" onclick="return confirm('Are you sure?')" ></input>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @endif
					</tbody>
				</table>										
			</div>
			<div class="card-footer clearfix">
				<ul class="pagination pagination m-0 float-right">
					<li class="page-item"><a class="page-link" href="#">«</a></li>
					<li class="page-item"><a class="page-link" href="#">1</a></li>
					<li class="page-item"><a class="page-link" href="#">2</a></li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
					<li class="page-item"><a class="page-link" href="#">»</a></li>
				</ul>
			</div>
		</div>
	</div>
					<!-- /.card -->
</section>
@endsection
