@extends('crudbooster::admin_template')
<style>
    .my-custom-scrollbar {
    position: relative;
    height: 100%;
    overflow: auto;
    }
    .table-wrapper-scroll-y {
    display: block;
    }
</style>
@section('content')

    

    <div class="container-fluid">
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

            <div style="padding: 20px;">
                <?php
                $action = (@$row) ? CRUDBooster::mainpath("edit-save/$row->id") : CRUDBooster::mainpath("add-save");
                $return_url = ($return_url) ?: g('return_url');
                ?>
                <form class='form-horizontal' method='post' id="form" enctype="multipart/form-data" action='{{$action}}'>
                    <div class="col-md-7">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type='hidden' name='return_url' value='{{ @$return_url }}'/>
                        <input type='hidden' name='ref_mainpath' value='{{ CRUDBooster::mainpath() }}'/>
                        <input type='hidden' name='ref_parameter' value='{{urldecode(http_build_query(@$_GET))}}'/>
                        @if($hide_form)
                            <input type="hidden" name="hide_form" value='{!! serialize($hide_form) !!}'>
                        @endif
                        <div class="box-body">

                            @if($command == 'detail')
                                @include("crudbooster::default.form_detail")
                            @else
                                @include("crudbooster::default.form_body")
                            @endif
                        </div><!-- /.box-body -->

                        <div id="register_area" style="padding: 20px 20px 20px 0px; margin: 10px 10px 10px 0px;">
                            <label>DATA RESI</label> 
                            <table id="table_register_detail" class="table table-bordered" >
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
                                    <tr>
                                        <td class="">-</td>
                                        <td class="">-</td>
                                        <td class="">-</td>
                                        <td class="">-</td>
                                        <td class="">-</td>
                                        <td class="">-</td>
                                        <td class="">-</td>
                                    </tr>
                                </tbody>
                                </table>
                        </div>
                        <div>
                            <div id="manifest_area" style="padding: 20px 20px 20px 0px; margin: 10px 10px 10px 0px;">
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
                                            <td class="editMe"><?php echo $_i; ?></td>
                                            <td class="editMe"><?php echo $cc->resi; ?></td>
                                            <td class="editMe"><?php echo $cc->tanggal; ?></td>
                                            <td class="editMe"><?php echo $cc->produk; ?></td>
                                            <td class="editMe"><?php echo $cc->temporary; ?></td>
                                            </tr>
                                            <?php
                                                    $_i = $_i + 1;
                                                    }
                                                }else{
                                            ?>
                                            <tr>
                                            <td class="editMe">-</td>
                                            <td class="editMe">-</td>
                                            <td class="editMe">-</td>
                                            <td class="editMe">-</td>
                                            <td class="editMe">-</td>
                                            </tr>
                                            <?php
                                                
                                                }
                                            ?>
                                        
                                    </tbody>
                                    </table>
                            
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-5" style="padding: 20px; border: 1px solid; border-radius: 30px;">
                        <div class="table-wrapper-scroll-y my-custom-scrollbar" id="details" >
                            <table id="data_details" class="table table-striped" >
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Register</th>
                                        <th>Tanggal</th>
                                        <th>Penerima</th>
                                        <th>Lokasi</th>
                                        <th>Jumlah Saldo</th>
                                        <th>Jumlah Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php 
                                            if(count($register)>0){
                                                $_i = 1;
                                                foreach($register as $reg){
                                        ?>
                                        <tr>
                                        <td class="" style="cursor:pointer"><?php echo $_i; ?></td>
                                        <td class="" style="cursor:pointer"><?php echo $reg->resi; ?></td>
                                        <td class="" style="cursor:pointer"><?php echo $reg->tanggal; ?></td>
                                        <td class="" style="cursor:pointer"><?php echo $reg->nama; ?></td>
                                        <td class="" style="cursor:pointer"><?php echo $reg->nama_lokasi; ?></td>
                                        <td class="" style="cursor:pointer"><?php echo $array_sum[$reg->resi]; ?></td>
                                        <td class="" style="cursor:pointer"><?php echo $array_banyak[$reg->resi]; ?></td>
                                        </tr>
                                        <?php
                                                $_i = $_i + 1;
                                                }
                                            }else{
                                        ?>
                                        <tr>
                                        <td class="">-</td>
                                        <td class="">-</td>
                                        <td class="">-</td>
                                        <td class="">-</td>
                                        <td class="">-</td>
                                        </tr>
                                        <?php
                                            
                                            }
                                        ?>
                                    
                                </tbody>
                                
                                </table>
                        </div>
                    </div>

                    <div class="box-footer" style="background: #fff">

                        <div class="form-group">
                            <div class="col-sm-10">
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

<!--Script editable table 
    <script>
        $(document).ready(function() {
      
            editor = new SimpleTableCellEditor("table_register_detail");
            editor.SetEditableClass("editMe");
        
            $('#table_register_detail').on("cell:edited", function (event) {
            console.log(`'${event.oldValue}' changed to '${event.newValue}'`);
            });
      
        });
      
    </script>
    <script>
        $(document).ready(function() {
      
            editor = new SimpleTableCellEditor("table_manifest_detail");
            editor.SetEditableClass("editMe");
        
            $('#table_manifest_detail').on("cell:edited", function (event) {
            console.log(`'${event.oldValue}' changed to '${event.newValue}'`);
            });
      
        });
      
    </script>
  End Of Script editable table-->
@endsection
