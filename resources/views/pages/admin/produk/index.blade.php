@extends('layouts.master')
@section('content')
	<div class="pagetitle">
		<h1>Data Produk</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item active">Produk</li>
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
							<div class="col"><h5 class="card-title">#Produk</h5></div>
							<div class="col text-end">
								<button class="btn btn-primary rounded-pill mt-3" onclick="modal()">
									<i class="bi bi-plus-circle"></i>
								</button>
							</div>
						</div>
						<form action="{{ route('adminProduk')}}">
							<div class="row mt-3">
								<div class="col-lg-4 col-md-4 col-sm-12 mt-3">
									<select name="idWarung" id="idWarung" class="form-select">
										<option value="all" selected>Semua</option>
										@foreach($warung as $w)
										<option value="{{$w->id}}" {{ isset($query['idWarung']) ? ((string) $query['idWarung'] === (string) $w['id'] ? 'selected' : '') : '' }}>{{$w->nama}}</option>
										@endforeach
									</select>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-12 mt-3">
									<input type="text" class="form-control" name="keyword" value="{{ $query['keyword'] ?? '' }}" placeholder="cari nama produk..">
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
										<th scope="col">Warung</th>
										<th class="text-center" scope="col">Kode_Poduk</th>
										<th class="text-center" scope="col">Produk</th>
										<th class="text-center" scope="col">Jumlah_Satuan</th>
										<th class="text-center" scope="col">Harga</th>
										<th class="text-center" scope="col">Harga_Modal</th>
										<th class="text-center" scope="col">Diskon</th>
										<th class="text-center" scope="col">Tanggal_Akhir_Promo</th>
										<th class="text-center" scope="col">Stok</th>
										<th class="text-center" scope="col">Keterangan</th>
										<th class="text-center" scope="col" colspan="5">Aksi</th>
									</tr>
								</thead>
								<tbody>
									@foreach($data as $d)
										<tr>
											<td>{{$d->namaWarung}}</td>
											<td class="text-center">{{$d->kode}}</td>
											<td class="text-center">{{$d->nama}} <span class="badge rounded-pill bg-info text-dark">{{$d->adaPromo ? 'Promo' : ''}}</span></td>
											<td class="text-center">{{$d->jumlahSatuan}}</td>
											<td class="text-center">Rp.{{number_format($d->harga, 0,'.','.')}}</td>
											<td class="text-center">Rp.{{number_format($d->modal, 0,'.','.')}}</td>
											<td class="text-center">{{$d->diskon}} %</td>
											<td class="text-center"><span class="badge rounded-pill bg-{{$d->expiredPromo !== null ? 'info': 'danger'}} text-dark">{{$d->expiredPromo === null ? 'Belum di atur' : ($d->adaPromo ? 'Berlaku sampai '.date('d-m-Y', strtotime($d->expiredPromo)) : 'Diskon berakhir' ) }}</span></td>
											<td class="text-center">{{$d->stok}}</td>
											<td>{{$d->keterangan}}</td>
											<td class="text-center">
												<a onclick="modal(true, {{$d}})" class="btn btn-secondary">
													<i class="bi bi-pencil-square"></i>
												</a>
											</td>
											<td class="text-center">
												<a onclick="modalStok({{$d}})" class="btn btn-warning">
													Stok
												</a>
											</td>
											<td class="text-center">
												<a onclick="modalDiskon({{$d}})" class="btn btn-warning">
													Diskon
												</a>
											</td>
											<td class="text-center">
												<a href="{{ route('adminDeleteProduk', $d->id)}}" class="btn btn-danger" onClick="return konfirmasi()">
													<i class="bi bi-trash-fill"></i>
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
							<input type="text" name="o[nama]" class="form-control" id="nama" placeholder="Tulis nama produk" required />
						</div>
						<div class="col-12 mb-3">
							<input type="text" name="o[jumlahSatuan]" class="form-control" id="jumlahSatuan" placeholder="Jumlah satuan, contoh: 450 mili (Boleh kosong)" />
						</div>
						<div class="col-12 mb-3">
							<input type="number" name="o[harga]" class="form-control" id="harga" placeholder="Tulis harga" required />
						</div>
						<div class="col-12 mb-3">
							<input type="number" name="o[modal]" class="form-control" id="modal" placeholder="Tulis harga modal" required />
						</div>
						<div class="col-12 mb-3">
							<input type="number" name="o[stok]" class="form-control" id="stok" placeholder="Tulis stok" required />
						</div>
						<div class="col-12 mb-3">
							<textarea class="form-control" placeholder="Tulis keterangan" name="o[keterangan]" id="keterangan" cols="50" rows="3"></textarea>
						</div>
						<div class="col-12 mb-3">
							<select id="select-warung"name="o[idWarung]" class="form-select" required>
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

	<!-- Modal Stok -->
	<div class="modal fade" id="modalStok" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="formStok" method="POST">
					@csrf
					<div class="modal-header">
						<h5 class="modal-title" id="modalTitleStok"></h5>
						<button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="col-12 mb-3">
							<input type="number" name="o[stok]" class="form-control" id="stokUpdate" required />
						</div>
					</div>
					<div class="modal-footer">
						<button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary">Update Stok</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Modal Promo -->
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
							<input type="date" name="o[expiredPromo]" id="expiredPromo" class="form-control" id="totalDiskon" required />
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

		$('#modal-title').html('Tambah Produk');
		$('#form').attr('action', '{{ route('adminAddProduk')}}');
		$('#basicModal').modal('show');

		if(editMode) {
			const data = params;
			$('#modal-title').html('Edit Data');
			$('#form').attr('action', '{{route('adminUpdateProduk', ':id')}}'.replace(':id', data.id));
			$('#nama').val(data.nama);
			$('#jumlahSatuan').val(data.jumlahSatuan);
			$('#harga').val(data.harga);
			$('#modal').val(data.modal);
			$('#stok').val(data.stok);
			$('#keterangan').val(data.keterangan);
			$('#select-warung').val(data.idWarung).change();
			$('#basicModal').modal('show');
		}
	}

	function modalStok(params = null) {
		if(params) {
			const data = params;
			$('#modalTitleStok').html(`Update Stok Produk: ${data.nama}`);
			$('#formStok').attr('action', '{{route('adminUpdateStokProduk', ':id')}}'.replace(':id', data.id));
			$('#stokUpdate').val(data.stok);
			$('#modalStok').modal('show');
		}
	}

	function modalDiskon(params = null) {
		if(params) {
			const data = params;
			$('#modalTitleDiskon').html(`Update Diskon Produk: ${data.nama}`);
			$('#formDiskon').attr('action', '{{route('adminUpdatePromoProduk', ':id')}}'.replace(':id', data.id));
			$('#diskonUpdate').val(data.diskon);
			$('#hargaInDiskon').val(data.harga);
			$('#expiredPromo').val(data.expiredPromo);
			$('#modalDiskon').modal('show');
			getPotongan()
		}
	}

	function getPotongan () {
		const harga = parseInt($('#hargaInDiskon').val() || 0);
		const diskon = parseInt($('#diskonUpdate').val() || 0);
		const totalDiskon = (harga / 100) * diskon;
		$('#totalDiskon').val(`Rp.${formatRp((harga-totalDiskon))}`);
	}
</script>
@endsection
