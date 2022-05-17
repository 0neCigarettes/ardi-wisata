@extends('layouts.master')
@section('content')
	<div class="pagetitle">
		<h1>Data Warung</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item active">Warung</li>
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
							<div class="col"><h5 class="card-title">Data Warung</h5></div>
							<div class="col text-end">
								<button class="btn btn-primary rounded-pill mt-3" onclick="modal()">
									<i class="bi bi-plus-circle"></i>
								</button>
							</div>
						</div>

						<!-- Table with stripped rows -->
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">Kode</th>
									<th class="text-center" scope="col">Nama Warung</th>
									<th class="text-center" scope="col">Keterangan</th>
									<th class="text-center" scope="col">Aksi</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data as $d)
									<tr>
										<td>{{$d->kode}}</td>
										<td class="text-center">{{$d->nama}}</td>
										<td class="text-center">{{$d->keterangan}}</td>
										<td class="text-center">
											<a onclick="modal(true, {{$d}})" class="btn btn-secondary">
												<i class="bi bi-pencil-square"></i>
											</a>
											<a href="{{ route('adminDeleteWarung', $d->id)}}" class="btn btn-danger" onClick="return konfirmasi()">
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

	<!-- Modal -->
	<div class="modal fade" id="basicModal" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="form" method="POST">
					@csrf
					<div class="modal-header">
						<h5 class="modal-title" id="modal-title"></h5>
						<button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="col-12 mb-3">
							<input type="text" name="o[nama]" class="form-control" id="nama" placeholder="Tulis nama warung" required />
						</div>
						<div class="col-12 mb-3">
							<textarea class="form-control" placeholder="Tulis keterangan" name="o[keterangan]" id="keterangan" cols="50" rows="3"></textarea>
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
</section>
@endsection
@section('js')
<script>
	function modal(editMode = false, params = null) {
		if(editMode) {
			const data = params;
			$('#modal-title').html('Edit Data');
			$('#form').attr('action', '{{route('adminUpdateWarung', ':id')}}'.replace(':id', data.id));
			$('#nama').val(data.nama);
			$('#keterangan').val(data.keterangan);
			$('#basicModal').modal('show');
		} else {
			$('#modal-title').html('Tambah Warung');
			$('#form').attr('action', '{{ route('adminAddWarung')}}');
			$('#basicModal').modal('show');
		}
	}
</script>
@endsection
