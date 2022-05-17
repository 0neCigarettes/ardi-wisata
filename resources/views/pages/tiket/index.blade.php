@extends('layouts.master')
@section('content')
	<div class="pagetitle">
		<h1>Tiket & Parkir</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item">Tiket & Parkir</li>
				<li class="breadcrumb-item active">Penjualan</li>
			</ol>
		</nav>
	</div><!-- End Page Title -->
	<section class="section">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Form Pembelian Tiket & Parkir</h5>
						<!-- Multi Columns Form -->
						<form class="row mx-auto mt-2 g-3" method="POST" action="{{ route('pegawaiCreateTiket')}}">
							@csrf
							<div class="col-12 mb-3">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" name="isParkir" id="parkir">
									<label class="form-check-label" for="parkir">
										Parkir ?
									</label>
								</div>
							</div>
							<div class="card" id="fields-tiket" style="baground: rgb(245, 237, 237); margin-bottom: 10px;padding: 10px;">
								<h5 class="card-title">Form Tiket</h5>
							</div>
							<div class="mt-2">
								<button onclick="addFieldsTiket()" type="button" class="btn btn-primary">Tambah Tiket</button>
							</div>
							<div class="card mt-3" id="fields-parkir" style="baground: rgb(245, 237, 237); margin-bottom: 10px;padding: 10px;">
								<h5 class="card-title">Form Parkir</h5>
								<div class="row">
									<div class="col-md-6">
										<label for="inputNoPol" class="form-label">Nomor Polisi Kendaraan</label>
										<input type="text" class="form-control" name="parkir[noPol]" id="inputNoPol" placeholder="Input nomor polisi kendaraan"/>
									</div>
									<div class="col-md-4">
										<label for="select-parkir" class="form-label">Jenis Parkir</label>
										<select id="select-parkir" onchange="setTotalParkir()" name="parkir[idJenis]" class="form-select"/>
											<option value="" selected disabled>pilih...</option>
											@foreach($jenisParkirs as $jp)
											<option value="{{$jp->id}}">Rp.{{number_format($jp->harga, 0,'.','.')}} - {{$jp->label}}</option>
											@endforeach
										</select>
									</div>
									<div class="col-md-2">
										<label for="totalParkir" class="form-label">Harga</label>
										<input type="number" class="form-control" name="parkir[harga]" id="totalParkir" readonly>
									</div>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col-md-4">
								<label for="totalBayar" class="form-label">Total Bayar</label>
								<input type="number" class="form-control" name="total" id="totalBayar" readonly>
							</div>
							</div>
							<div>
								<button type="submit" class="btn btn-primary">Proses</button>
								<button type="reset" class="btn btn-secondary">Reset</button>
							</div>
						</form><!-- End Multi Columns Form -->
					</div>
				</div>

			</div>
		</div>
	</section>
@endsection
@section('js')
<script type="text/javascript">

	const jenisTikets = {!! json_encode($jenisTikets) !!};
	const jenisParkirs = {!! json_encode($jenisParkirs) !!}
	const parkir = $('#fields-parkir').hide();
	let i = 0;
	let isParkir = false;

	function getTotalBayar(index, condition = false) {
		let totalTiket = 0;
		let totalParkir = 0;
		let total = 0;
		for(i=0; i<index; i++) {
			totalTiket += parseInt($(`#total${i}`).val() ? $(`#total${i}`).val() : 0);
		}
		totalParkir = parseInt($('#totalParkir').val() ? $('#totalParkir').val() : 0);
		total = condition ? totalTiket + totalParkir : totalTiket;
		$('#totalBayar').val(total);
		return;
	}

	function addFieldsTiket() {
		let fields = $('#fields-tiket');
		let field = `<div class="row mt-2" id="tiketForm${i}">` +
								'<div class="col-md-4">' +
									'<label for="inputJumlah" class="form-label">Jumlah tiket</label>' +
									`<input type="number" oninput="setTotalTiket(${i})" name="tiket[${i}][jumlah]" class="form-control" id="inputJumlah${i}" placeholder="Input jumlah beli, contoh: 2" required />` +
								'</div>'+
								'<div class="col-md-4">'+
									'<label for="inputState" class="form-label">Jenis tiket</label>' +
									`<select id="inputState${i}" onchange="setTotalTiket(${i});" name="tiket[${i}][idJenis]" class="form-select" required>` +
										'<option value="" selected disabled>pilih...</option>';
										for(jt of jenisTikets) {
					field +=  `<option value="${jt.id}"> Rp.${formatRp(jt.harga)} - ${jt.label}${jt.adaDiskon !== 0  ? ` : Diskon ${jt.diskon}%` : ``}</option>`;
										}
					field +='</select>' +
								'</div>'+
								'<div class="col-md-3">' +
									'<label for="total" class="form-label">Sub Total</label>' +
									`<input type="number" name="tiket[${i}][totalHarga]" class="form-control" id="total${i}" readonly>` +
								'</div>'+
								'<div class="col-md-1">' +
									`<button style="margin-top: 30px;" ${i === 0 ? 'disabled' : ''} onclick="removeFieldsTiket('tiketForm${i}')" type="button" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>` +
								'</div>'+
							'</div>';
		fields.append(field);
		i+=1;
		getTotalBayar(i, isParkir);
		return;
	}

	function removeFieldsTiket(id) {
		$(`#${id}`).remove();
		getTotalBayar(i, isParkir);
		return;
	}

	//totalTiket
	async function setTotalTiket(id) {
		const idTiket = parseInt($(`#inputState${id}`).val());
		const jenisTiket = jenisTikets.find(jt => jt.id === idTiket);
		if (idTiket) {
			let harga = jenisTiket.adaDiskon === 1 ? jenisTiket.hargaDiskon : jenisTiket.harga;
			let jumlah = parseInt($(`#inputJumlah${id}`).val()) || 0;
			let total = (harga * jumlah) || 0;
			$(`#total${id}`).val(total);
			getTotalBayar(i, isParkir);
			return;
		}
		return;
	}

	//totalParkir
	async function setTotalParkir() {
		const idParkir= parseInt($(`#select-parkir`).val());
		const jenisParkir =jenisParkirs.find(jp => jp.id === idParkir);
		if (idParkir) {
			// const response = await axios.get("{{ url('/api/harga-parkir/:id')}}".replace(':id', idParkir));
			let harga = jenisParkir ? jenisParkir.harga : 0;
			$(`#totalParkir`).val(harga);
			getTotalBayar(i, isParkir);
			return;
		}
		return
	}

	$(document).on('click','#parkir',function(){
		isParkir = $(this).is(':checked') ? true : false;
		if(isParkir) {
			$(this).val(1);
			$('#inputNoPol').attr({"required": true});
			$('#select-parkir').attr({'required': true});
			parkir.show();
		} else {
			$(this).val(0);
			$('#inputNoPol').attr({"required": false}).val(null);
			$('#select-parkir').attr({'required': false}).val(null);
			$('#totalParkir').val(0);
			parkir.hide();
		}
		getTotalBayar(i, isParkir);
		return;
	});

	getTotalBayar(i);
	addFieldsTiket();
</script>
@endsection
