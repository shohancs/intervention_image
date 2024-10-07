@extends('backend.layout.template')

@section('page-title')
<title>Student | Home</title>
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
						<h5 class="mb-0">Edit Student</h5>
					</div>
				</div>

			</div>
			<hr>

			@include('backend.includes.message')

			<section class="py-3 pb-4">
				<div class="container-fluid" style="border: 2px solid #ccc; border-radius: 10px; padding: 30px;">
					<div class="row">
						<div class="col-lg-12">
							<!-- Form Part -->
							<form action="{{ route('student.update', $editStudent->id) }}" method="POST" enctype="multipart/form-data">
								@csrf
								<div class="mb-3">
									<label for="">Enter Student Name</label>
									<input type="text" name="name" class="form-control" autocomplete="off" placeholder="student name..." value="{{ $editStudent->name }}">
								</div>

								<div class="mb-3">
									<label for="">Student Image</label>
									<input type="file" name="image" class="form-control">
								</div>

								<div class="mb-3">
									<label for="">Status</label>
									<select class="form-select" name="status">
										<option value="1">Please Select the Status</option>
										<option value="1" @if ( $editStudent->status == 1 ) selected @endif >Active</option>
										<option value="0" @if ( $editStudent->status == 0 ) selected @endif >InActive</option>
									</select>
								</div>

								<div class="mb-3">
									<div class="d-grid gap-2">
										<input type="submit" name="updateStudent" class="btn btn-success" value="Update Student">
									</div>
								</div>	

							</form>
							<!-- Form Part -->
						</div>
					</div>
				</div>
			</section>			
				
			</div>
	</div>
</div>




@endsection


@section('page-scripts')

@endsection