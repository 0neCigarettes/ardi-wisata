@extends('layouts.master')
@section('content')
<div class="pagetitle">
	<h1>Transaksi</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="breadcrumb-item active">Transaksi</li>
		</ol>
	</nav>
</div><!-- End Page Title -->
<section class="section">
	<div class="row">
		<div class="col-12">
			<div class="card">
					<div class="card-body">
						<h5 class="card-title">Form Penjualan</h5>
						<form class="row g-3" method="POST" action="{{ route('pegawaiKasirCreate')}}">
							@csrf
							<div class="card" style="baground: rgb(255, 255, 255); margin-bottom: 10px;padding: 10px;">
								<div class="card-body" id="fields">
								</div>
							</div>
							<div class="col-12 mt-3 mb-3">
								<button type="button" onclick="addFields()" class="btn btn-primary" id="add">
									<i class="bi bi-plus-circle"></i>
									Tambah
								</button>
							</div>
							<div class="card" id="fields" style="baground: rgb(255, 255, 255); margin-bottom: 10px;padding: 10px;">
								<div class="card-body">
									<div class="row">
										<div class="col-md-4">
											<label for="total" class="form-label">Total</label>
											<input type="number" id="total" name="total" class="form-control" placeholder="0" readonly />
										</div>
									</div>
								</div>
							</div>
							<div class="row justify-content-md-center m-3">
								<div class="col-4 d-grid gap-2 mt-3">
									<button type="submit" class="btn btn-primary btn-block">Submit</button>
								</div>
								<div class="col-4 d-grid gap-2 mt-3">
									<button type="reset" class="btn btn-secondary btn-md btn-block">Reset</button>
								</div>
							</div>
						</form>
					</div>
				</div>
		</div>
	</div>
</section>
@endsection
@section('js')
<script type="text/javascript">
	let i = 0;
	const barangs = {!! json_encode($barangs) !!};



	function getTotal(index) {
		let total = 0;
		for (i = 0; i < index; i++) {
			total += parseInt($(`#subTotal${i}`).val()) || 0;
		}
		$('#total').val(total);
	}

	function addFields() {
		const fields = $('#fields');
		let field = `<div class="row g-3 mb-3" id="form${i}">` +
										'<div class="col-md-4">' +
											`<label for="barang${i}" class="form-label">Barang</label>` +
											`<select id="barang${i}" onclick="getHarga(${i})" name="barang[${i}][idBarang]" class="form-select" required>` +
												'<option selected disabled>Pilih..</option>';
												for (b of barangs) {
								field += `<option value="${b.id}" ${b.stok > 0 ? '' : 'disabled'}>${b.nama} : Rp.${formatRp(b.harga)} ${b.adaPromo === 1 ? `- Diskon ${b.diskon}%` : '' } - ${b.stok > 0 ? `Stok: ${b.stok}` : 'Stok Habis'}</option>`
												}
								field += '</select>' +
										'</div>' +
										'<div class="col-md-2">' +
											'<label for="harga" class="form-label">Harga</label>' +
											`<input type="number" id="harga${i}" name="barang[${i}][harga]" class="form-control" placeholder="0" readonly />` +
										'</div>' +
										'<div class="col-md-2">' +
											`<label for="jumlah${i}" class="form-label">Jumlah Beli</label>` +
											`<input type="number" oninput="getHarga(${i})" name="barang[${i}][jumlahBeli]" min="1" id="jumlah${i}" class="form-control" placeholder="0" required />` +
										'</div>' +
										'<div class="col-md-2">' +
											'<label for="diskon" class="form-label">Diskon</label>' +
											`<input type="text" id="diskon${i}" class="form-control" name="barang[${i}][diskon]" placeholder="0" readonly>` +
										'</div>' +
										'<div class="col-md-2">' +
											`<label for="subTotal${i}" class="form-label">SubTotal</label>` +
											`<input type="number" id="subTotal${i}" name="barang[${i}][subTotal]" class="form-control" placeholder="0" readonly>` +
										'</div>' +
										'<div class="col mt-3">' +
											`<button type="button" class="btn btn-danger" onclick="removeForm(${i})" id="remove" ${i ===0 ? 'disabled':''}>` +
												'<i class="bi bi-trash-fill"></i>' +
											'</button>' +
										'</div>' +
									'</div>';
		fields.append(field);
		i++;
		getTotal(i)
	}

	function removeForm(id) {
		$(`#form${id}`).remove();
		getTotal(id)
	}

	function getHarga(id) {
		const idBarang = parseInt($(`#barang${id}`).val());
		const barang = barangs.find(b => b.id === idBarang);
		$(`#jumlah${id}`).attr('max', barang.stok);
		const jumlahBeli = parseInt($(`#jumlah${id}`).val()) || 0;
		if(idBarang) {
			$(`#harga${id}`).val(barang.adaPromo === 1 ? barang.hargaDiskon : barang.harga);
			$(`#diskon${id}`).val(`${barang.adaPromo === 1 ? barang.diskon : 0} %`);
			$(`#subTotal${id}`).val(barang.adaPromo === 1 ? (barang.hargaDiskon * jumlahBeli) : (barang.harga * jumlahBeli));
			getTotal(i)
		}
	}

	getTotal(i);
	addFields();
</script>
@endsection
