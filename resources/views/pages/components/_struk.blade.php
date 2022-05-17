<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<style>
</style>
<body>
  <center style="margin-left: 20px">
      <img src="statics/img/logo.jpg" width="100" alt="LEMBAH AKASIA"><br>
      <small>Jl. Kalkun II Sukoharjo I, Kec. Sukoharjo, Kabupaten Pringsewu, Lampung 35373</small><br>
      <small>0812XXXXXXXX</small>
  </center>
	<br>
	<center style="margin-left: 20px"><small>{{$warungKasir->nama}}</small></center>
  =============================
  <center style="margin-left: 20px">
		{{ $data['kode'] }}<br>
		{{ date('d-m-Y H:i:s') }}
	</center>
	-------------------------------------------------
  <table>
		<tr>
			<td colspan="3">Tiket:</td>
		</tr>
    @foreach($data['detail'] as $d)
    <tr>
      <td width="22">{{ $d['jumlahBeli'] }} x</td>
      <td width="80" align="center">{{ $d['namaProduk'] }}</td>
      <td width="79" align="right">Rp.{{number_format($d['harga'] * $d['jumlahBeli'], 0, '.', '.')}}</td>
    </tr>s
    @if($d['adaDiskon'] == 1)
		<tr>
			<td></td>
      <td width="80" align="center">Diskon {{$d['diskon']}}%</td>
      <td width="79" align="right">- Rp.{{number_format((($d['harga']/100) *$d['diskon']) * $d['jumlahBeli'], 0, '.', '.')}}</td>
    </tr>
		@endif
		<tr>
      <td colspan="3">-------------------------------------------------</td>
    </tr>
    @endforeach
    <tr>
      <td colspan="2" align="right">Total:</td>
      <td align="right">Rp.{{ number_format($data['total'], 0, '.', '.') }}</td>
    </tr>
  </table><br>
  <center style="margin-left: 20px">Terima Kasih.<br>Selamat Datang Kembali</center>
</body>
</html>
