@extends('backend.layout.template')

@section('page-title')
<title>Admin Dashboard | Home</title>
@endsection


@section('page-css')

@endsection


@section('body-content')

<div class="page-content">
	<div class="row row-cols-12 row-cols-md-12 row-cols-lg-12 row-cols-xl-12">

		<div class="card radius-10">
			<div class="card-body">
				<div class="d-flex align-items-center">
					<div>
						<h5 class="mb-0">All Students</h5>
					</div>
				</div>

			</div>
			<hr>
				<div class="table-responsive">
					<table class="table table-hover table-bordered">
						<thead class="table-light">
							<tr>
								<th class="text-center">Sl.</th>
								<th class="text-center">Image</th>
								<th class="text-center">Student Name</th>
								<th class="text-center">Status</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>

						<tbody>

							@if ( $readStudents->count() == 0 )
								<div class="alert alert-danger text-center" role="alert">
									Sorry No Data Found in our Database!
								</div>
							@else

							@php $i=1; @endphp
							@foreach( $readStudents as $readStudent ) 

							<tr>
								<td class="text-center">{{ $i }}</td>
								<td class="text-center">
									@if ( !is_null( $readStudent->image ) )
										<img src="{{ asset('uploads/students/' . $readStudent->image ) }}" alt="" width="50">
									@else
										<p>Not Available</p>
									@endif
								</td>
								<td class="text-center">{{ $readStudent->name }}</td>
								<td class="text-center">
									@if ( $readStudent->status == 1 )
										<span class="badge text-bg-success">Active</span>
									@elseif ( $readStudent->status == 0 )
										<span class="badge text-bg-danger">InActive</span>
									@endif
								</td>								
								<td class="text-center">
									<div>
										<a href="{{ route('student.edit', $readStudent->id) }}" class="btn btn-primary">Edit</a>
										<a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#trashData{{ $readStudent->id }}">Trash</a>
									</div>
									<!-- Modal Start -->
									<div class="modal fade" id="trashData{{ $readStudent->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
									  <div class="modal-dialog">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h1 class="modal-title fs-5" id="exampleModalLabel">Through into <span class="text-danger">{{ $readStudent->name }}</span> Trash Folder?</h1>
										        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									      </div>
									      <div class="modal-body">
									        <form action="{{ route('student.trash', $readStudent->id) }}" method="POST">
									        	@csrf
									        	<input type="submit" class="btn btn-danger" value="Trash">
									        	<button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
									        </form>
									      </div>
									    </div>
									  </div>
									</div>
									<!-- Modal End -->

								</td>
							</tr>

							@php $i++; @endphp
							@endforeach

							@endif

							
						</tbody>
					</table>
				</div>
			</div>
	</div>
</div>




@endsection


@section('page-scripts')

@endsection