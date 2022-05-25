<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>REGISTER PrintOut {{ date('Y-m-d H-i-s') }}</title>
  <style type="text/css" >
		@page { 
			margin: 10px; 
			font-size: 10pt;
		}
		body { 
			margin: 0px; 
			font-size: 8pt;
			padding: 0px;
		}
  </style>
</head>

<body style="width:100%;">

	<table style="width:100%; text-align:left">
		<tr>
			<td style="width:30%">
				
				&nbsp;<STRONG>PT BUKIT LOMBOK TRANSPORT </STRONG><BR/>
				&nbsp;SURABAYA : 3525254 . 3525583 . 3737937 <BR/>
				&nbsp;DENPASAR&nbsp; : 418818 <BR/>
				&nbsp;LOMBOK &nbsp;&nbsp;&nbsp;&nbsp;  : 631686 . 635186 . 624413 <BR/>

			</td>
			<td style="width:40%"></td>
			<td style="width:30%">
				&nbsp;<STRONG>NO RESI : {{ $row->resi }} </STRONG><BR/>
				&nbsp;Tanggal &nbsp;&nbsp;&nbsp;: {{ date("d-M-Y", strtotime($row->tanggal)) }} <BR/>
			</td>
		</tr>
		<tr>
			<td style="width:30%">
				&nbsp;Pengirim &nbsp;&nbsp;&nbsp;&nbsp;  : {{ $row->kd_pengirim }} <BR/>
				&nbsp;<strong>{{ $row->nama_pengirim }}</strong>

			</td>
			<td style="width:40%"></td>
			<td style="width:30%">
				&nbsp;Kepada &nbsp;&nbsp;&nbsp;: {{ $row->kd_penerima }}  <BR/>
				&nbsp;<strong>{{ $row->nama_penerima }}</strong>
			</td>
		</tr>
	</table>

	<hr style="height:1px;border:none;color:#333;background-color:#333;" />
	<table style="width:100%; border:0px; text-align:left">
		<tr>
			<td width="10%"> No </td>
			<td width="20%"> Barang </td>
			<td width="10%"> KdHarga </td>
			<td width="20%"> Harga</td>
			<td width="10%"> Qty </td>
			<td width="10%"> Berat </td>
			<td width="20%"> Jumlah </td>
		</tr>
	</table>
	<hr style="height:1px;border:none;color:#333;background-color:#333;" />
	<table style="width:100%; border:0px; text-align:left">
		{{ $iterasi = 0 }}
		@foreach ($detail as $det)
		{{ $iterasi = $iterasi + 1 }}
		<tr>
			<td width="10%"> {{ $iterasi }} </td>
			<td width="20%"> {{ $det->produk }} </td>
			<td width="10%"> {{ $det->kd_harga }} </td>
			<td width="20%"> {{ $det->harga }} / {{ $det->tipe }} </td>
			<td width="10%"> {{ number_format($det->banyak) }} </td>
			<td width="10%"> {{ number_format($det->berat) }} </td>
			<td width="20%"> {{ number_format($det->total) }} </td>
		</tr>
		@endforeach
	</table>
	<hr style="height:1px;border:none;color:#333;background-color:#333;" />
	<table style="width:100%; border:0px; text-align:left">
		<tr valign="top">
			<td colspan="5" width="70%"> 
				<div style="border:solid 1px #333">
					PERHATIAN : <br/>
					1. Pengirim wajib melunasi biaya kirim apabila penerima tidak mampu untuk melunasi biaya kirim. <br/>
					2. Barang tidak diasuransikan - tidak diberi pengganti untuk kerugian yang disebabkan oleh FORCE  <br/>
					&nbsp;&nbsp;&nbsp;&nbsp;MAJEURE (Kecelakaan, Kebakaran, Perampokan, Huru-Hara, Bencana Alam).<br/>
					3. Tidak memberikan ganti rugi untuk barang pecah belah atau mudah pecah, cairan yang mudah bocor<br/>
					&nbsp;&nbsp;&nbsp;&nbsp;atau menguap, dan Barang tidak berpaking sempurna.<br/>
					4. Kehilangan WAJIB disaksikan oleh petugas kami.<br/>
					5. HARGA dan BERAT telah disetujui apabila Invoice sudah ditandatangani.<br/>
					6. Bila barang kiriman tidak diambil dalam tempo 1 bulan, kami tidak menerima CLAIM kerusakan dan <br/>
					&nbsp;&nbsp;&nbsp;&nbsp;kehilangan.<br/>
					7. Kami TIDAK melakukan pengecekan isi barang kiriman.<br/>
				</div>
			</td>
			<td width="10%"> <STRONG>Total</STRONG> <hr style="height:1px;border:none;color:#333;background-color:#333;" />
			<center>Pengurus : <br/>
			<br/><br/>

			(......................)</center>
			</td>
			<td width="20%"> <STRONG>{{ number_format($detail->sum('total')) }}</STRONG> <hr style="height:1px;border:none;color:#333;background-color:#333;" />
			<center>Penerima : <br/>
			<br/><br/>

			(......................)</center>
			
			</td>
		</tr>
	</table>
	
</body>
</html>