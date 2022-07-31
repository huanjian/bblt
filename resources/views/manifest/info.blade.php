@extends('crudbooster::admin_template')
@section('content')

    <div>

        @if(CRUDBooster::getCurrentMethod() != 'getProfile' && $button_cancel)
            @if(g('return_url'))
                <p><a title='Return' href='{{g("return_url")}}'><i class='fa fa-chevron-circle-left '></i>
                        &nbsp; {{cbLang("form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name])}}</a></p>
            @else
                <p><a title='Main Module' href='{{CRUDBooster::mainpath()}}'><i class='fa fa-chevron-circle-left '></i>
                        &nbsp; {{cbLang("form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name])}}</a></p>
            @endif
        @endif

        <div class="panel panel-default">
            <div class="panel-heading">
                <strong><i class='{{CRUDBooster::getCurrentModule()->icon}}'></i> {!! $page_title !!}</strong>
            </div>

            <div class="panel-body" style="padding:20px 0px 0px 0px">
                <?php
                $action = (@$row) ? CRUDBooster::mainpath("edit-save/$row->id") : CRUDBooster::mainpath("add-save");
                $return_url = ($return_url) ?: g('return_url');
                ?>
                <form class='form-horizontal' method='post' id="form" enctype="multipart/form-data" action='{{$action}}'>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type='hidden' name='return_url' value='{{ @$return_url }}'/>
                    <input type='hidden' name='ref_mainpath' value='{{ CRUDBooster::mainpath() }}'/>
                    <input type='hidden' name='ref_parameter' value='{{urldecode(http_build_query(@$_GET))}}'/>
                    @if($hide_form)
                        <input type="hidden" name="hide_form" value='{!! serialize($hide_form) !!}'>
                    @endif
                    <div class="box-body" id="parent-form-area">



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
				<td width="10%"> Qty </td>
				<td width="10%"> Berat </td>
				<td width="10%"> Harga </td>
			</tr>
		</table>
		<hr style="height:1px;border:none;color:#333;background-color:#333;" />
		<table style="width:100%; border:0px; text-align:left">

			@php
				$jum_qty = 0;
				$jum_harga = 0;
			@endphp
			
			@foreach ($detail as $det)
			@php
				$s_qty = $det->berat / $det->banyak * $det->manifest_qty;
				$s_harga = $det->total / $det->banyak * $det->manifest_qty;

				$jum_qty = $jum_qty + $s_qty;
				$jum_harga = $jum_harga + $s_harga
			@endphp
			<tr>
				<td width="15%"> {{ $det->resi }} </td>
				<td width="15%"> {{ $det->produk }} </td>
				<td width="20%"> {{ $det->nama_pengirim }} </td>
				<td width="20%"> {{ $det->nama_penerima }} </td>
				<td width="10%"> {{ number_format($det->manifest_qty) }} </td>
				<td width="10%"> {{ number_format( $s_qty ) }} </td>
				<td width="10%"> {{ number_format( $s_harga ) }} </td>
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
				<td width="10%"> {{ number_format($jum_qty) }} </td>
				<td width="10%"> {{ number_format($jum_harga) }} </td>
			</tr>
		</table>
		<hr style="height:1px;border:none;color:#333;background-color:#333;" />

		



			</div><!-- /.box-body -->

	<div class="box-footer" style="background: #F5F5F5">

		<div class="form-group">
			<label class="control-label col-sm-2"></label>
			<div class="col-sm-10">
						<a href='{{ CRUDBooster::mainpath() }}' class='btn btn-default'><i
									class='fa fa-chevron-circle-left'></i> {{cbLang("button_back")}}</a>
						<a target="_blank" href='{{ CRUDBooster::mainpath() }}/detail/{{$id}}' class='btn btn-default'><i
									class='fa fa-print'></i> Print</a>
			</div>
		</div>


	</div><!-- /.box-footer-->

	</form>

	</div>
</div>
</div><!--END AUTO MARGIN-->

@endsection