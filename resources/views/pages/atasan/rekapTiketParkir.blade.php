@extends('layouts.master')
@section('content')

<section class="section">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col"><h5 class="card-title">#Penjualan</h5></div>
					</div>
					<form action="{{ route('rekapTP')}}">
						<div class="row mt-3">
							<div><h6>#Filter</h6></div>
							<div class="col-lg-4 col-md-4 col-sm-12 mt-3">
								<input type="text" class="form-control" name="keyword" value="{{ $query['keyword'] ?? '' }}" placeholder="cari kode..">
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
									<th scope="col">Kode</th>
									<th class="text-center" scope="col">Tiket</th>
									<th class="text-center" scope="col">Parkir</th>
									<th class="text-center" scope="col">Nomor_Polisi</th>
									<th class="text-center" scope="col">Kendaraan</th>
									<th class="text-center" scope="col">Harga_Parkir</th>
									<th class="text-center" scope="col">Total_Bayar</th>
									<th class="text-center" scope="col">Tanggal</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data as $d)
									<tr>
										<td>{{$d->kode}}</td>
										<td class="text-center">
											<a onclick="detail({{$d}})" class="btn btn-warning btn-sm">Tiket</a>
										</td>
										<td class="text-center">{{$d->isParkir === 1 ? 'Ya' : 'Tidak'}}</td>
										<td class="text-center">{{$d->nomorPolisi ?? '-'}}</td>
										<td class="text-center">{{$d->jenisKendaraan ?? '-' }}</td>
										<td class="text-center">Rp.{{number_format($d->hargaParkir ?? 0, 0,'.','.')}}</td>
										<td class="text-center">Rp.{{number_format($d->totalBayar ?? 0, 0,'.','.')}}</td>
										<td class="text-center">{{date('d-M-Y H:i:s', strtotime($d->created_at))}}</td>
									</tr>
								@endforeach
									<tr>
										<th colspan="6">Total Keseluruhan Parkir</th>
										<th>:Rp.{{number_format($totalParkir, 0,'.','.')}}</th>
										<th></th>
									</tr>
									<tr>
										<th colspan="6">Total Keseluruhan Tiket</th>
										<th>:Rp.{{number_format($totalTiket, 0,'.','.')}}</th>
										<th></th>
									</tr>
									<tr>
										<th colspan="6">Total transaksi {{$query['tanggalAwal'] ?? ''}} {{!empty($query['tanggalAkhir']) ? ' - '.$query['tanggalAkhir'] : ''}}</th>
										<th>:Rp.{{number_format($totalFilter, 0,'.','.')}}</th>
										<th></th>
									</tr>
									<tr>
										<th colspan="6">Total Keseluruhan Transaksi</th>
										<th>:Rp.{{number_format($totalAll, 0,'.','.')}}</th>
										<th></th>
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
									<th scope="col">Jenis_Tiket</th>
									<th class="text-center" scope="col">Harga</th>
									<th class="text-center" scope="col">Jumlah_Beli</th>
									<th class="text-center" scope="col">SubTotal</th>
									<th class="text-center" scope="col">Potongan</th>
									<th class="text-center" scope="col">Total</th>
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
		console.log(data.details);
		let html = '';
		data.details.forEach(d => {
			html += `
				<tr>
					<td>${d.jenisTiket}</td>
					<td class="text-center">Rp.${formatRp(d.harga)}</td>
					<td class="text-center">${d.jumlahBeli}</td>
					<td class="text-center">Rp.${formatRp(d.harga * d.jumlahBeli)}</td>
					<td class="text-center">${d.diskon}% (Rp.${formatRp((d.harga - d.hargaDiskon) * d.jumlahBeli)})</td>
					<td class="text-center">Rp.${formatRp(d.adaDiskon === 1 ? d.hargaDiskon * d.jumlahBeli : d.harga * d.jumlahBeli)}</td>
				</tr>
			`;
		});
		$('#modalTitle').html(`Transaksi ${data.kode}`);
		$('#detailTableBody').html(html);
		$('#detailModal').modal('show');
	}
</script>
@endsection
