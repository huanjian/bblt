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
							<table style="width:100%; border:0px; text-align:left;">
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
