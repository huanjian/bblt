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

                        @if($command == 'detail')
                            @include("crudbooster::default.form_detail")
                        @else
                            @include("crudbooster::default.form_body")
                        @endif
                    </div><!-- /.box-body -->

                    <div id="register_area" style="float:left; border:solid 1px; border-color:#cdcdcd;width:40%">
                    <label>DATA RESI</label> 
                    <table id="table_register_detail" class="table table-bordered">
                        <thead>
                            <tr class="active">
                                <th style="width:5%">No</th>
                                <th style="width:25%">Resi</th>
                                <th style="width:15%">Tanggal</th>
                                <th style="width:20%">Produk</th>
                                <th style="width:5%">Jumlah</th>
                                <th style="width:5%">Jumlah Manifest</th>
                                <th style="width:5%">Jumlah Saldo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="background-color:#eee">
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                        </tbody>
                        </table>
                        </label><input type="button" id="pilih_manifest" name="submit" value='PILIH' class='btn btn-warning'>
                    </div>

                    <div style="float:left;width:100%">
                        <div id="manifest_area" style="float:left; border:solid 1px; border-color:#cdcdcd;width: 49%;margin-left:5%">
                            <label>DATA MANIFEST</label> 
                            <table id="table_manifest_detail" class="table table-bordered">
                                <thead>
                                    <tr class="active">
                                    <th style="width:5%">No</th>
                                    <th style="width:25%">Resi</th>
                                    <th style="width:10%">Tanggal</th>
                                    <th style="width:20%">Produk</th>
                                    <th style="width:5%">Jumlah Manifest</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                        <?php 
                                            if(count($chart)>0){
                                                $_i = 1;
                                                foreach($chart as $cc){
                                        ?>
                                        <tr style="background-color:#eee">
                                        <td><?php echo $_i; ?></td>
                                        <td><?php echo $cc->resi; ?></td>
                                        <td><?php echo $cc->tanggal; ?></td>
                                        <td><?php echo $cc->produk; ?></td>
                                        <td><?php echo $cc->temporary; ?></td>
                                        </tr>
                                        <?php
                                                $_i = $_i + 1;
                                                }
                                            }else{
                                        ?>
                                        <tr>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        </tr>
                                        <?php
                                            
                                            }
                                        ?>
                                    
                                </tbody>
                                </table>
                        
                        </div>
                    </div>

                    <div class="box-footer" style="background: #F5F5F5">

                        <div class="form-group">
                            <div class="col-sm-10" style="margin-left:5%">
                                @if($button_cancel && CRUDBooster::getCurrentMethod() != 'getDetail')
                                    @if(g('return_url'))
                                        <a href='{{g("return_url")}}' class='btn btn-default'><i
                                                    class='fa fa-chevron-circle-left'></i> {{cbLang("button_back")}}</a>
                                    @else
                                        <a href='{{CRUDBooster::mainpath("?".http_build_query(@$_GET)) }}' class='btn btn-default'><i
                                                    class='fa fa-chevron-circle-left'></i> {{cbLang("button_back")}}</a>
                                    @endif
                                @endif
                                @if(CRUDBooster::isCreate() || CRUDBooster::isUpdate())

                                    @if(CRUDBooster::isCreate() && $button_addmore==TRUE && $command == 'add')
                                        <input type="submit" name="submit" value='{{cbLang("button_save_more")}}' class='btn btn-success'>
                                    @endif

                                    @if($button_save && $command != 'detail')
                                        <input type="submit" name="submit" value='PROSES' class='btn btn-success'>
                                    @endif

                                @endif
                            </div>
                        </div>


                    </div><!-- /.box-footer-->

                </form>

            </div>
        </div>
    </div><!--END AUTO MARGIN-->

@endsection
