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