@extends('layouts.master')
@section('content')
	<div class="pagetitle">
		<h1>Data Harga Parkir</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item">Master</li>
				<li class="breadcrumb-item active">Parkir</li>
			</ol>
		</nav>
	</div><!-- End Page Title -->

	@include('pages.components._alert')

	<section class="section">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col"><h5 class="card-title">Harga Parkir Kendaraan</h5></div>
							<div class="col text-end">
								<button class="btn btn-primary rounded-pill mt-3" data-bs-toggle="modal" data-bs-target="#basicModal">
									<i class="bi bi-plus-circle"></i>
								</button>
							</div>
						</div>

						<!-- Table with stripped rows -->
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">Label</th>
									<th class="text-end" scope="col">Harga</th>
									<th class="text-center" scope="col">Aksi</th>
								</tr>
							</thead>
							<tbody>
								@foreach($datas as $d)
									<tr>
										<td>{{$d->label}}</td>
										<td class="text-end">Rp.{{number_format($d->harga, 0,'.','.')}}</td>
										<td class="text-center">
											<a onClick="editParkir({{$d}})" class="btn btn-secondary">
												<i class="bi bi-pencil-square"></i>
											</a>
											<a href="{{ route('deleteParkir', $d->id)}}" class="btn btn-danger" onClick="return konfirmasi()">
												<i class="bi bi-trash-fill"></i>
											</a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						<!-- End Table with stripped rows -->

					</div>
				</div>
			</div>
		</div>

	<!-- Modal add -->
	<div class="modal fade" id="basicModal" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="{{ route('addParkir')}}">
					@csrf
					<div class="modal-header">
						<h5 class="modal-title">Tambah Harga Parkir</h5>
						<button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="col-12 mb-3">
							<input type="text" name="o[label]" class="form-control" id="label" placeholder="Input label harga, contoh: Motor, Mobil, Mini bus, Bus" required />
						</div>
						<div class="col-12">
							<input type="number" name="o[harga]" class="form-control" id="harga" placeholder="Input harga tanpa 'Rp.' dan tanda baca, contoh: 10000, 10500" required />
						</div>
					</div>
					<div class="modal-footer">
						<button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Modal Edit -->
	<div class="modal fade" id="modalEdit" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" id="formEdit">
					@csrf
					<div class="modal-header">
						<h5 class="modal-title">Edit Harga Parkir</h5>
						<button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="col-12 mb-3">
							<input type="text" name="o[label]" class="form-control" id="editLabel" placeholder="Label" required />
						</div>
						<div class="col-12">
							<input type="number" name="o[harga]" class="form-control" id="editHarga" placeholder="harga" required />
						</div>
					</div>
					<div class="modal-footer">
						<button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	</section>
@endsection
@section('js')
<script>
	function editParkir(params) {
		const data = params;
		$('#formEdit').attr('action', '{{route('updateParkir', 'id')}}'.replace('id', data.id));
		$('#editLabel').val(data.label);
		$('#editHarga').val(data.harga);
		$('#modalEdit').modal('show');
	}
</script>
@endsection
