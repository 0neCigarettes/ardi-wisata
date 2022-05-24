@extends('layouts.master')
@section('content')
<section class="section">
	<div class="row">
		<div class="col-12">
			{{$keuntungan}}
			{{$totalModal}}
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col"><h5 class="card-title">#Penjualan</h5></div>
					</div>
					<form action="{{ route('atasanDashboard')}}">

						<div class="row mt-3">
							<div><h6>#Filter</h6></div>
							<div class="col-lg-4 col-md-4 col-sm-12 mt-3">
								<select name="idWarung" id="idWarung" class="form-select">
									<option value="" selected>Semua warung</option>
									@foreach($warung as $w)
									<option value="{{$w->id}}" {{ isset($query['idWarung']) ? ((string) $query['idWarung'] === (string) $w['id'] ? 'selected' : '') : '' }}>{{$w->nama}}</option>
									@endforeach
								</select>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-12 mt-3">
								<input type="text" class="form-control" name="keyword" value="{{ $query['keyword'] ?? '' }}" placeholder="cari kode transaksi..">
							</div>
						</div>
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-12">
								<div class="form-group">
									<label for="">Tanggal Awal</label>
									<input type="date" class="form-control" name="tanggalAwal" value="{{ $query['tanggalAwal'] ?? '' }}">
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-12">
								<div class="form-group">
									<label for="">Tanggal Akhir</label>
									<input type="date" class="form-control" name="tanggalAkhir" value="{{ $query['tanggalAkhir'] ?? '' }}">
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-12 mt-4">
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
									<th class="text-center" scope="col">Kode_Transaksi</th>
									<th class="text-center" scope="col">Total</th>
									<th class="text-center" scope="col">Tanggal</th>
									<th class="text-center" scope="col">Aksi</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data as $d)
									<tr>
										<td>{{$d->warung['nama']}}</td>
										<td class="text-center">{{$d->kode}}</td>
										<td class="text-center">Rp.{{number_format($d->total, 0,'.','.')}}</td>
										<td class="text-center">{{ date('d-M-Y H:i:s',strtotime($d->created_at))}}</td>
										<td class="text-center">
											<a onclick="detail({{$d}})" class="btn btn-warning">
												<i class="bi bi-eye"></i>
											</a>
										</td>
									</tr>
								@endforeach
									<tr>
										<th colspan="2">Total transaksi {{$namaWarung ? $namaWarung->nama : '' }} {{$query['tanggalAwal'] ?? ''}} {{!empty($query['tanggalAkhir']) ? ' - '.$query['tanggalAkhir'] : ''}}</th>
										<th class="text-center">: Rp.{{number_format($totalFilter, 0,'.','.')}}</th>
										<th class="text-center"></th>
										<th class="text-center"></th>
									</tr>
									<tr>
										<th colspan="2">Total Keseluruhan Transaksi</th>
										<th class="text-center">: Rp.{{number_format($totalAll, 0,'.','.')}}</th>
										<th class="text-center"></th>
										<th class="text-center"></th>
									</tr>
									<tr>
										<th colspan="2">Total Modal {{$namaWarung ? $namaWarung->nama : '' }} {{$query['tanggalAwal'] ?? ''}} {{!empty($query['tanggalAkhir']) ? ' - '.$query['tanggalAkhir'] : ''}}</th>
										<th class="text-center">: Rp.{{number_format($totalModal, 0,'.','.')}}</th>
										<th class="text-center"></th>
										<th class="text-center"></th>
									</tr>
									<tr>
										<th colspan="2">Total Keuntungan {{$namaWarung ? $namaWarung->nama : '' }} {{$query['tanggalAwal'] ?? ''}} {{!empty($query['tanggalAkhir']) ? ' - '.$query['tanggalAkhir'] : ''}}</th>
										<th class="text-center">: Rp.{{number_format($keuntungan, 0,'.','.')}}</th>
										<th class="text-center"></th>
										<th class="text-center"></th>
									</tr>
							</tbody><!-- End Table with stripped rows -->
						</table>
						{{ $data->appends($query)->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="detailModal" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalTitle"></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="table-responsive mt-3">
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">Nama_Produk</th>
									<th class="text-center" scope="col">Harga</th>
									<th class="text-center" scope="col">Modal</th>
									<th class="text-center" scope="col">Jumlah_Beli</th>
									<th class="text-center" scope="col">SubTotal</th>
									<th class="text-center" scope="col">Potongan</th>
									<th class="text-center" scope="col">Total</th>
									<th class="text-center" scope="col">Total_Modal</th>
									<th class="text-center" scope="col">Keuntungan</th>
								</tr>
							</thead>
							<tbody id="detailTableBody">
							</tbody>
						</table>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@section('js')
<script type="text/javascript">
	const detail = function (data) {
		$('#modalTitle').html(data.kode + ' - ' + data.warung.nama);
		let contents = $('#detailTableBody');
		let content;
		contents.empty()
		for(let r of data.details) {
			content += `<tr>
										<td>${r.namaProduk}</td>
										<td class="text-center">Rp.${formatRp(r.harga)}</td>
										<td class="text-center">Rp.${formatRp(r.modal)}</td>
										<td class="text-center">${r.jumlahBeli}</td>
										<td class="text-center">Rp.${formatRp(r.harga * r.jumlahBeli)}</td>
										<td class="text-center">${r.adaDiskon === 1 ? r.diskon : 0}% (Rp.${formatRp(r.adaDiskon === 1 ? (r.harga - r.hargaDiskon) * r.jumlahBeli : 0)})</td>
										<td class="text-center">Rp.${formatRp(r.adaDiskon === 1 ? r.hargaDiskon * r.jumlahBeli : r.harga * r.jumlahBeli)}</td>
										<td class="text-center">Rp.${formatRp(r.modal * r.jumlahBeli)}</td>
										<td class="text-center">Rp.${formatRp((r.adaDiskon === 1 ? r.hargaDiskon * r.jumlahBeli : r.harga * r.jumlahBeli) - (r.modal * r.jumlahBeli))}</td>
									</tr>`;
		}
		contents.append(content);
		$('#detailModal').modal('show');
	}
</script>
@endsection
