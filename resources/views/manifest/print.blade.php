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
<center><strong>BUKTI PEMUATAN BARANG</strong></center>
		<table style="width:100%; text-align:left">
			<tr>
				<td style="width:120px">Kode Manifest</td>
				<td>: {{ $row->nomor_manifest }}</td>
			</tr>
			<tr>
				<td>Tanggal Berangkat</td>
				<td>: {{ $row->tanggal_berangkat }}</td>
			</tr>
			<tr>
				<td>No Kendaraan</td>
				<td>: {{ $row->nomor }}</td>
			</tr>
			<tr>
				<td>Tujuan</td>
				<td>: {{ $row->alamat_tujuan }}</td>
			</tr>
		</table>

		<hr style="height:1px;border:none;color:#333;background-color:#333;" />
		<table style="width:100%; border:0px; text-align:left">
			<tr>
				<td width="15%"> No Resi </td>
				<td width="15%"> Item </td>
				<td width="20%"> Dari </td>
				<td width="20%"> Kepada </td>
				<td width="10%"> Qty/Koli </td>
				<td width="10%"> Berat </td>
				<td width="10%"> Harga </td>
			</tr>
		</table>
		<hr style="height:1px;border:none;color:#333;background-color:#333;" />
		<table style="width:100%; border:0px; text-align:left">
			
			@foreach ($detail as $det)
			<tr>
				<td width="15%"> {{ $det->resi }} </td>
				<td width="15%"> {{ $det->produk }} </td>
				<td width="20%"> {{ $det->nama }} </td>
				<td width="20%"> {{ $det->nama_penerima }} </td>
				<td width="10%"> {{ number_format($det->banyak) }} </td>
				<td width="10%"> {{ number_format($det->berat) }} </td>
				<td width="10%"> {{ number_format($det->total) }} </td>
			</tr>
			@endforeach
		</table>
		<hr style="height:1px;border:none;color:#333;background-color:#333;" />
		<table style="width:100%; border:0px; text-align:left">
			<tr>
				<td width="15%">  </td>
				<td width="15%">  </td>
				<td width="20%">  </td>
				<td width="20%">  </td>
				<td width="10%"> Grand Total </td>
				<td width="10%"> {{ number_format($detail->sum('berat')) }} </td>
				<td width="10%"> {{ number_format($detail->sum('total')) }} </td>
			</tr>
		</table>
		<hr style="height:1px;border:none;color:#333;background-color:#333;" />
</body>
</html>