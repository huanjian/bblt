<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>MANIFEST PrintOut {{ date('Y-m-d H-i-s') }}</title>
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
&nbsp;PT BUKIT LOMBOK TRANSPORT
<center><strong>BUKTI PENERIMAAN BARANG</strong></center>
		<table style="width:100%; text-align:left">
			<tr>
				<td style="width:180px">Kode Terima</td>
				<td>: {{ $row->nomor_terima }}</td>
			</tr>
			<tr>
				<td>Tanggal Berangkat</td>
				<td>: {{ $row->tanggal }}</td>
			</tr>
			<tr>
				<td>Catatan</td>
				<td>: {{ $row->catatan }}</td>
			</tr>
			<tr>
				<td>Check By</td>
				<td>: {{ $row->name }}</td>
			</tr>
		</table>

		<hr style="height:1px;border:none;color:#333;background-color:#333;" />
		<table style="width:100%; border:0px; text-align:left">
			<tr>
				<td width="5%"> No </td>
				<td width="20%"> No Manifest </td>
				<td width="15%"> No Resi </td>
				<td width="15%"> Item </td>
				<td width="15%"> Dari </td>
				<td width="15%"> Kepada </td>
				<td width="5%"> Qty </td>
				<td width="5%"> Berat </td>
				<td width="5%"> Harga </td>
			</tr>
		</table>
		<hr style="height:1px;border:none;color:#333;background-color:#333;" />
		<table style="width:100%; border:0px; text-align:left">

			@php
				$jum_qty = 0;
				$jum_harga = 0;
				$no = 0;
			@endphp
			
			@foreach ($detail as $det)
			@php
				$s_qty = $det->berat / $det->banyak * $det->manifest_qty;

				$jum_qty = $jum_qty + $s_qty;
				$jum_harga = $jum_harga + $det->total_qty;
				$no = $no + 1;
			@endphp
			<tr>
				<td width="5%"> {{ $no}} </td>
				<td width="20%"> {{ $det->nomor_manifest }} </td>
				<td width="15%"> {{ $det->resi }} </td>
				<td width="15%"> {{ $det->produk }} </td>
				<td width="15%"> {{ $det->nama_pengirim }} </td>
				<td width="15%"> {{ $det->nama_penerima }} </td>
				<td width="5%"> {{ number_format($det->manifest_qty) }} </td>
				<td width="5%"> {{ number_format( $s_qty ) }} </td>
				<td width="5%"> {{ number_format( $det->total_qty ) }} </td>
			</tr>
			@endforeach
		</table>
		<hr style="height:1px;border:none;color:#333;background-color:#333;" />
		<table style="width:100%; border:0px; text-align:left">
			<tr>
				<td width="5%">  </td>
				<td width="20%">  </td>
				<td width="15%">  </td>
				<td width="15%">  </td>
				<td width="15%">  </td>
				<td width="5%">  </td>
				<td width="15%"> Grand Total </td>
				<td width="5%"> {{ number_format($jum_qty) }} </td>
				<td width="5%"> {{ number_format($jum_harga) }} </td>
			</tr>
		</table>
		<hr style="height:1px;border:none;color:#333;background-color:#333;" />
		
</body>
</html>