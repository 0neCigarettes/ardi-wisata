@extends('layouts.master')
@section('content')
<div class="pagetitle">
	<h1>Data Tiket</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">Master</li>
			<li class="breadcrumb-item active">Tiket</li>
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
						<div class="col"><h5 class="card-title">Harga Tiket Masuk</h5></div>
						<div class="col text-end">
							<button class="btn btn-primary rounded-pill mt-3" onclick="modalTiket()">
								<i class="bi bi-plus-circle"></i>
							</button>
						</div>
					</div>

					<!-- Table with stripped rows -->
					<div class="table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">Label</th>
									<th class="text-center" scope="col">Harga</th>
									<th class="text-center" scope="col">Diskon</th>
									<th class="text-center" scope="col">Tanggal_Berakhir_Diskon</th>
									<th class="text-center" scope="col" colspan="3">Aksi</th>
								</tr>
							</thead>
							<tbody>
								@foreach($tiket as $t)
									<tr>
										<td>{{$t->label}}</td>
										<td class="text-center">Rp.{{number_format($t->harga, 0,'.','.')}}</td>
										<td class="text-center">{{$t->diskon}}%</td>
										<td class="text-center"><span class="badge rounded-pill bg-{{$t->expiredDiskon !== null ? 'info': 'danger'}} text-dark">{{$t->expiredDiskon === null ? 'Diskon belum di atur' : ($t->adaDiskon ? 'Berlaku sampai '.date('d-m-Y', strtotime($t->expiredDiskon)) : 'Diskon berakhir!' ) }}</span></td>
										<td class="text-center">
											<a onClick="modalDiskon({{$t}})" class="btn btn-warning">
												Diskon
											</a>
										</td>
										<td class="text-center">
											<a onclick="modalTiket(true, {{$t}})" class="btn btn-secondary">
												<i class="bi bi-pencil-square"></i>
											</a>
										</td>
										<td class="text-center">
											<a href="{{ route('deleteTiket', $t->id)}}" class="btn btn-danger" onClick="return konfirmasi()">
												<i class="bi bi-trash-fill"></i>
											</a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<!-- End Table with stripped rows -->

				</div>
			</div>
		</div>
	</div>

	<!-- Modal add -->
	<div class="modal fade" id="modalTiket" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="formTiket" method="POST">
					@csrf
					<div class="modal-header">
						<h5 class="modal-title">Tambah Harga Tiket</h5>
						<button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="col-12 mb-3">
							<input type="text" name="o[label]" class="form-control" id="label" placeholder="Input label harga, contoh: dewasa, anak-anak" required />
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

	<!-- Modal Diskon -->
	<div class="modal fade" id="modalDiskon" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="formDiskon" method="POST">
					@csrf
					<div class="modal-header">
						<h5 class="modal-title" id="modalTitleDiskon"></h5>
						<button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button><br>
					</div>
					<div class="modal-body">
						<div class="col-12 mb-3 text-info">
							<p class="text-warning">Keterangan: </p>
							<p>
								1. Input diskon tanpa tanda baca atau '%', dengan range 0-100 . Contoh: 10 <br>
								2. Diskon bersifat persentase,  Rumus: <br> Harga Normal - ((Harga Normal / 100) X Diskon)
							</p>
						</div>
						<div class="col-12 mt-3">
							<label for="hargaInDiskon">Harga Normal</label>
							<input type="text" class="form-control" id="hargaInDiskon" readonly />
						</div>
						<div class="col-12 mt-3">
							<label for="diskonUpdate">Diskon %</label>
							<input type="number" min="0" max="100" name="o[diskon]" oninput="getPotongan()" class="form-control" id="diskonUpdate" required />
						</div>
						<div class="col-12 mt-3">
							<label for="hargaInDiskon">Harga Diskon</label>
							<input type="text" class="form-control" id="totalDiskon" readonly />
						</div>
						<div class="col-12 mt-3">
							<label for="expiredPromo">Tanggal Akhir Berlaku Diskon</label>
							<input type="date" name="o[expiredDiskon]" id="expiredPromo" class="form-control" id="totalDiskon" required />
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
	function modalTiket(editMode = false, params = null) {
		if (editMode && params !== null) {
			const data = params;
			$('#formTiket').attr('action', '{{route('updateTiket', 'id')}}'.replace('id', data.id));
			$('#label').val(data.label);
			$('#harga').val(data.harga);
			$('#modalTiket').modal('show');
			return;
		}

		$('#formTiket').attr('action', '{{ route('addTiket')}}');
		$('#modalTiket').modal('show');
		return;
	}

	function modalDiskon(params = null) {
		if(params) {
			const data = params;
			$('#modalTitleDiskon').html(`Update Diskon Tiket: ${data.label}`);
			$('#formDiskon').attr('action', '{{route('adminUpdateDiskonTiket', ':id')}}'.replace(':id', data.id));
			$('#diskonUpdate').val(data.diskon);
			$('#hargaInDiskon').val(data.harga);
			$('#expiredPromo').val(data.expiredDiskon);
			$('#modalDiskon').modal('show');
			getPotongan()
			return;
		}
		return;
	}

	function getPotongan () {
		const harga = parseInt($('#hargaInDiskon').val() || 0);
		const diskon = parseInt($('#diskonUpdate').val() || 0);
		const totalDiskon = (harga / 100) * diskon;
		$('#totalDiskon').val(`Rp.${formatRp((harga-totalDiskon))}`);
		return;
	}
</script>
@endsection
