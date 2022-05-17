@extends('layouts.master')
@section('content')
	<div class="pagetitle">
		<h1>Data Pegawai</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item active">Pegawai</li>
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
							<div class="col"><h5 class="card-title">#Pegawai</h5></div>
							<div class="col text-end">
								<button class="btn btn-primary rounded-pill mt-3" onclick="modal()">
									<i class="bi bi-plus-circle"></i>
								</button>
							</div>
						</div>
						<form action="{{ route('adminPegawai')}}">
							<div class="row mt-3">
								<div class="col-lg-4 col-md-4 col-sm-12 mt-3">
									<select name="code" id="code" class="form-select">
										<option value="all" selected>Semua</option>
										@foreach($role as $r)
										<option value="{{$r['id']}}" {{ isset($query['code']) ? ((string) $query['code'] === (string) $r['id'] ? 'selected' : '') : '' }}>{{$r['label']}}</option>
										@endforeach
									</select>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-12 mt-3">
									<input type="text" class="form-control" name="name" value="{{ $query['name'] ?? '' }}" placeholder="cari nama pegawai..">
								</div>
								<div class="col-lg-4 col-md-4 col-sm-12 mt-3">
									<button class="btn btn-outline-primary rounded" type="submit">
										<i class="bi bi-search"></i>
									</button>
								</div>
							</div>
						</form>

						<!-- Table with stripped rows -->
						<div class="table-responsive mt-3">
							<table class="table table-striped">
								<thead>
									<tr>
										<th scope="col">Role</th>
										<th class="text-center" scope="col">Nama</th>
										<th class="text-center" scope="col">Alamat</th>
										<th class="text-center" scope="col">Email</th>
										<th class="text-center" scope="col">Tanggal Input</th>
										<th class="text-center" scope="col">Aksi</th>
									</tr>
								</thead>
								<tbody>
									@foreach($data as $d)
										<tr>
											@if($d['role'] == 2)
											<td>Pegawai Tiket</td>
											@elseif($d['role'] == 3)
											<td>Kasir <span class="badge rounded-pill bg-info text-dark">{{$d->warung['nama']}}</span></td>
											@endif
											<td class="text-center">{{$d->name}}</td>
											<td class="text-center">{{$d->address}}</td>
											<td class="text-center">{{$d->email}}</td>
											<td class="text-center">{{date('d-M-Y H:i:s', strtotime($d->created_at))}}</td>
											<td class="text-center">
												<a onclick="modal(true, {{$d}})" class="btn btn-secondary">
													<i class="bi bi-pencil-square"></i>
												</a>
												<a href="{{ route('adminDeletePegawai', $d->id)}}" class="btn btn-danger" onclick="return konfirmasi()">
													<i class="bi bi-trash-fill"></i>
												</a>
												<a href="{{ route('adminResetPassword', $d->id)}}" class="btn btn-warning" onclick="return konfirmasi('Reset password?')">
													reset password
												</a>
											</td>
										</tr>
									@endforeach
								</tbody><!-- End Table with stripped rows -->
							</table>
							{{ $data->appends($query)->links() }}
						</div>
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
							<input type="text" name="o[name]" class="form-control" id="name" placeholder="Tulis nama pegawai..." required />
						</div>
						<div class="col-12 mb-3">
							<input type="text" name="o[email]" class="form-control" id="email" placeholder="Tulis email pegawai..." required />
						</div>
						<div class="col-12 mb-3">
							<textarea name="o[address]" id="address" class="form-control" placeholder="Tulis alamat.. (Boleh kosong)" cols="50" rows="3"></textarea>
						</div>
						<div class="col-12 mb-3">
							<select id="select-role"name="o[role]" onchange="showWarung()" class="form-select" required >
								<option value="" selected disabled>pilih role...</option>
								@foreach($role as $r)
								<option value="{{$r['id']}}">{{$r['label']}}</option>
								@endforeach
							</select>
						</div>
						<div class="col-12 mb-3" id="field-warung">
							<select id="select-warung"name="o[idWarung]" class="form-select">
								<option value="" selected disabled>pilih warung...</option>
								@foreach($warung as $w)
								<option value="{{$w->id}}">{{$w->nama}} - {{$w->kode}}</option>
								@endforeach
							</select>
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
		showWarung();

		$('#modal-title').html('Tambah Pegawai');
		$('#form').attr('action', '{{ route('adminAddPegawai')}}');
		$('#basicModal').modal('show');

		if(editMode) {
			const data = params;
			$('#modal-title').html('Edit Data');
			$('#form').attr('action', '{{route('adminUpdatePegawai', ':id')}}'.replace(':id', data.id));
			$('#name').val(data.name);
			$('#email').val(data.email);
			$('#address').val(data.address);
			$('#select-role').val(data.role).change();
			if (data.role === 3) {
				$('#field-warung').show();
				$('#select-warung').val(data.idWarung).change();
			}
			$('#basicModal').modal('show');
		}
	}

	function showWarung() {
		const role = parseInt($('#select-role').val());
		const fieldWarung = $('#field-warung').hide();
		if(role === 3) {
			fieldWarung.show();
			$('#select-warung').attr({"required": true});
		}
	}
	showWarung();
</script>
@endsection
