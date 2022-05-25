<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;
	use Barryvdh\DomPDF\Facade as PDF;

	class AdminManifestController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "nomor_manifest";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = false;
			$this->button_bulk_action = false;
			$this->button_action_style = "button_icon";
			$this->button_add = true;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "manifest";
			$this->list_tujuan = $this->tujuan_rute();
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Nomor Manifest","name"=>"nomor_manifest"];
			$this->col[] = ["label"=>"Kendaraan","name"=>"kendaraan_id","join"=>"kendaraan,id"];
			$this->col[] = ["label"=>"Pengemudi","name"=>"pengemudi_id","join"=>"pengemudi,nama"];
			$this->col[] = ["label"=>"Tanggal Berangkat","name"=>"tanggal_berangkat"];
			$this->col[] = ["label"=>"Tujuan","name"=>"lokasi_id","join"=>"lokasi,nama_lokasi"];
			$this->col[] = ["label"=>"Alamat Tujuan","name"=>"alamat_tujuan"];
			$this->col[] = ["label"=>"Keterangan","name"=>"keterangan"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			// $this->form[] = ['label'=>'Nomor Manifest','name'=>'nomor_manifest','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-3'];
			$this->form[] = ['label'=>'Kendaraan','name'=>'kendaraan_id','type'=>'select','validation'=>'required|integer|min:0','width'=>'col-sm-5','datatable'=>'kendaraan,nomor'];
			$this->form[] = ['label'=>'Pengemudi','name'=>'pengemudi_id','type'=>'select','validation'=>'required|integer|min:0','width'=>'col-sm-5','datatable'=>'pengemudi,nama'];
			$this->form[] = ['label'=>'Tanggal Berangkat','name'=>'tanggal_berangkat','type'=>'date','validation'=>'required|date','width'=>'col-sm-5', 'value'=>date("Y-m-d"), 'disabled'=>true];
			$this->form[] = ['label'=>'Tujuan','name'=>'lokasi_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-6','datatable'=>'lokasi,nama_lokasi', 'datatable_where'=>'id IN ('.$this->list_tujuan.')'];
			$this->form[] = ['label'=>'Register','name'=>'register_id','type'=>'select','validation'=>'required|min:0','width'=>'col-sm-6','datatable'=>''];
			$this->form[] = ['label'=>'Alamat Tujuan','name'=>'alamat_tujuan','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-8'];
			$this->form[] = ['label'=>'Keterangan','name'=>'keterangan','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-8'];
			
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ["label"=>"Alamat Tujuan","name"=>"alamat_tujuan","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Cabang Id","name"=>"cabang_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"cabang,nama"];
			//$this->form[] = ["label"=>"Kendaraan Id","name"=>"kendaraan_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"kendaraan,id"];
			//$this->form[] = ["label"=>"Keterangan","name"=>"keterangan","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Nomor Manifest","name"=>"nomor_manifest","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Pengemudi Id","name"=>"pengemudi_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"pengemudi,nama"];
			//$this->form[] = ["label"=>"Quantity Awal","name"=>"quantity_awal","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Register Id","name"=>"register_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"register,id"];
			//$this->form[] = ["label"=>"Sequence","name"=>"sequence","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Tanggal Berangkat","name"=>"tanggal_berangkat","type"=>"date","required"=>TRUE,"validation"=>"required|date"];
			# OLD END FORM

			/* 
	        | ---------------------------------------------------------------------- 
	        | Sub Module
	        | ----------------------------------------------------------------------     
			| @label          = Label of action 
			| @path           = Path of sub module
			| @foreign_key 	  = foreign key of sub table/module
			| @button_color   = Bootstrap Class (primary,success,warning,danger)
			| @button_icon    = Font Awesome Class  
			| @parent_columns = Sparate with comma, e.g : name,created_at
	        | 
	        */
	        $this->sub_module = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Action Button / Menu
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
	        | @icon        = Font awesome class icon. e.g : fa fa-bars
	        | @color 	   = Default is primary. (primary, warning, succecss, info)     
	        | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
	        | 
	        */
	        $this->addaction = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Button Selected
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @icon 	   = Icon from fontawesome
	        | @name 	   = Name of button 
	        | Then about the action, you should code at actionButtonSelected method 
	        | 
	        */
	        $this->button_selected = array();

	                
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add alert message to this module at overheader
	        | ----------------------------------------------------------------------     
	        | @message = Text of message 
	        | @type    = warning,success,danger,info        
	        | 
	        */
	        $this->alert        = array();
	                

	        
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add more button to header button 
	        | ----------------------------------------------------------------------     
	        | @label = Name of button 
	        | @url   = URL Target
	        | @icon  = Icon from Awesome.
	        | 
	        */
	        $this->index_button = array();



	        /* 
	        | ---------------------------------------------------------------------- 
	        | Customize Table Row Color
	        | ----------------------------------------------------------------------     
	        | @condition = If condition. You may use field alias. E.g : [id] == 1
	        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.        
	        | 
	        */
	        $this->table_row_color = array();     	          

	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | You may use this bellow array to add statistic at dashboard 
	        | ---------------------------------------------------------------------- 
	        | @label, @count, @icon, @color 
	        |
	        */
	        $this->index_statistic = array();



	        /*
	        | ---------------------------------------------------------------------- 
	        | Add javascript at body 
	        | ---------------------------------------------------------------------- 
	        | javascript code in the variable 
	        | $this->script_js = "function() { ... }";
	        |
	        */
	        $this->script_js = "$( document ).ready(function() {
				var _token = '';
				var _tipe = '';	




				$('#parent-form-area').css('float', 'left');
				$('#parent-form-area').css('width', '50%');
				$('#parent-form-area').css('margin-left', '5%');
				$('.form-horizontal .control-label').css('text-align','left');
				

				function ajaxCallBack(retString){
					_token = retString;
				}


				function callActionText(){
					$('.input_manifest').on('change',function(){
						var _thiscap = $(this).attr('number');
						var _thisid = $(this).attr('alt');
						var _thisvalue = $(this).val();
						$('#sisa'+_thisid).html(_thiscap-_thisvalue);
					});
				}

				function callWindow(print_id){
					let wi = screen.width/2;
					let he = screen.height/2;
					let params = `scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,
					width=600,height=600,left=540,top=0`;
					
					open('/admin/manifest/detail/'+print_id, 'test', params);

				}
				
				var _print = '".Session::get('print_manifest')."';

				if(_print != ''){
					callWindow(_print);
				}

				function readString(){
					$.ajax({
						url: '/api/get-token',
						type: 'POST',
						success: function(msg) {
							ajaxCallBack(msg['data']['access_token']);
						},
						data: {
							'secret': 'acf67be3ffbe3bf2ea0855243705da6d'
						},
						headers: {
							'Content-Type': 'application/x-www-form-urlencoded'
						},
						error: function(jqXHR, textStatus, errorThrown) {}
					
					});
				};readString();




				$('#kendaraan_id').on('change',function(){ 

					$.ajax({
						url: '/api/kendaraan',
						type: 'GET',
						success: function(msg) {
							$('#pengemudi_id').val(msg['data']['pengemudi_id']).change();
						},
						data: {
							'id': $(this).val()
						},
						headers: {
							Authorization: 'Bearer ' + _token
						},
						error: function(jqXHR, textStatus, errorThrown) {}
					
						});
				
				});



				$('#lokasi_id').on('change',function(){ 

					$.ajax({
						url: '/api/register_by_lokasi',
						type: 'GET',
						success: function(msg) {
							
								$('#register_id option').filter(function() {
									if(!this.value || $.trim(this.value).length == 0 || $.trim(this.text).length == 0){
										return 0;
									}else{
										return 1;
									}
								})
								.remove();

								$.each( msg, function( key, value ) {
									var o = new Option(value.resi, value.resi);
									$(o).html(value.resi);
									$('#register_id').append(o);
								});
							},

						data: {
							'resi' : $(this).val(),
							'lokasi_pengirim' : ".$this->generate_number_lokasi()."
						},
						headers: {
							Authorization: 'Bearer ' + _token
						},
						error: function(jqXHR, textStatus, errorThrown) {}
					
					});
				
				});


				$('#register_id').on('change',function(){ 
					$.ajax({
						url: '/api/resi',
						type: 'GET',
						success: function(msg) {
							
								$('#table_register_detail tbody>tr').remove();

								var _i = 1;
								$.each( msg, function( key, value ) {
									var _html = '';
									var value_id = value.reg_detail_id;
									var value_text = 0;
									var _sisa_chart = 0

									if(value.temporary != null){
										value_text = value.temporary;
									}

									if(value.sisa_chart != null){
										_sisa_chart = value.sisa_chart;
									}else{
										_sisa_chart = value.sisa_manifest;
									}



									if(_i%2==0){
										_html = '<tr style=\'background-color:#eee\'><td>'+_i+'</td><td>'+value.resi+'</td><td>'+value.tanggal+'</td><td>'+value.produk+'</td><td>'+value.sisa_manifest+'</td><td><input class=\'input_manifest\' number=\''+value.sisa_manifest+'\' alt=\''+value_id+'\' type=\'text\' value=\''+value_text+'\' size=\'2\'></td><td id=\'sisa'+value_id+'\'>'+_sisa_chart+'</td></tr>';
									}else{
										_html = '<tr><td>'+_i+'</td><td>'+value.resi+'</td><td>'+value.tanggal+'</td><td>'+value.produk+'</td><td>'+value.sisa_manifest+'</td><td><input class=\'input_manifest\'  number=\''+value.sisa_manifest+'\' alt=\''+value_id+'\' type=\'text\' value=\''+value_text+'\' size=\'2\'></td><td id=\'sisa'+value_id+'\'>'+_sisa_chart+'</td></tr>';
									}
									_i = _i + 1;

									$('#table_register_detail tbody').append(_html);
								});

								callActionText();
							},

						data: {
							'resi' : $(this).val()
						},
						headers: {
							Authorization: 'Bearer ' + _token
						},
						error: function(jqXHR, textStatus, errorThrown) {}
					
					});
				});



				


				
				$('#pilih_manifest').on('click',function(){ 

					var chart = [];
					var _flag_tidak_valid = false;

					$('#table_register_detail input[class=input_manifest]').each(function(){
						
						/*if($(this).val() != 0){
							chart.push({
								regid : $(this).attr('alt'),
								qty : $(this).val(),
								session: '".session()->getId()."'
							});
						}*/

						chart.push({
							regid : $(this).attr('alt'),
							qty : $(this).val(),
							session: '".session()->getId()."'
						});

						if( ($(this).val() > $(this).attr('number')) ||  ($(this).val() < 0) ){
							_flag_tidak_valid = true;
							return;
						}
						
					});

					if( _flag_tidak_valid == true){
						alert('jumlah tidak valid');
						return;
					}

					console.log(chart);


					$.ajax({
						url: '/api/manifest',
						type: 'POST',
						success: function(msg) {
							
								$('#table_manifest_detail tbody>tr').remove();

								var _i = 1;
								$.each( msg, function( key, value ) {
									var _html = '';
									if(_i%2==0){
										_html = '<tr style=\'background-color:#eee\'><td>'+_i+'</td><td>'+value.resi+'</td><td>'+value.tanggal+'</td><td>'+value.produk+'</td><td>'+value.temporary+'</td></tr>';
									}else{
										_html = '<tr><td>'+_i+'</td><td>'+value.resi+'</td><td>'+value.tanggal+'</td><td>'+value.produk+'</td><td>'+value.temporary+'</td></tr>';
									}
									_i = _i + 1;

									$('#table_manifest_detail tbody').append(_html);
								});


							},

						data: {
							'json' : chart
						},
						headers: {
							Authorization: 'Bearer ' + _token
						},
						error: function(jqXHR, textStatus, errorThrown) {}
					
					});

					

					
				});
				

			});";


            /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code before index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it before index table
	        | $this->pre_index_html = "<p>test</p>";
	        |
	        */
	        $this->pre_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code after index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it after index table
	        | $this->post_index_html = "<p>test</p>";
	        |
	        */
	        $this->post_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include Javascript File 
	        | ---------------------------------------------------------------------- 
	        | URL of your javascript each array 
	        | $this->load_js[] = asset("myfile.js");
	        |
	        */
	        $this->load_js = array();
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Add css style at body 
	        | ---------------------------------------------------------------------- 
	        | css code in the variable 
	        | $this->style_css = ".style{....}";
	        |
	        */
	        $this->style_css = NULL;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include css File 
	        | ---------------------------------------------------------------------- 
	        | URL of your css each array 
	        | $this->load_css[] = asset("myfile.css");
	        |
	        */
	        $this->load_css = array();
	        
	        
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for button selected
	    | ---------------------------------------------------------------------- 
	    | @id_selected = the id selected
	    | @button_name = the name of button
	    |
	    */
	    public function actionButtonSelected($id_selected,$button_name) {
	        //Your code here
	            
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate query of index result 
	    | ---------------------------------------------------------------------- 
	    | @query = current sql query 
	    |
	    */
	    public function hook_query_index(&$query) {
	        //Your code here
	            
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */    
	    public function hook_row_index($column_index,&$column_value) {	        
	    	//Your code here
			
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) {        
	        //Your code here
			$bulan = date("m"); 
			$tahun = date("y"); 

			$kode_tempat = $this->generate_number_lokasi();
			$kode_urut = $this->generate_urutan_berdasarkan_lokasi_manifest();


			unset($postdata['register_id']);
			$postdata['tanggal_berangkat'] = date('Y-m-d');
			$postdata['nomor_manifest'] = "MN".$kode_tempat."-".$tahun.$bulan.$kode_urut;

			return $postdata;
	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after add public static function called 
	    | ---------------------------------------------------------------------- 
	    | @id = last insert id
	    | 
	    */
	    public function hook_after_add($id) {        
	        //Your code here

			$resi = DB::table('manifest_chart')
				->join('register_detail', 'manifest_chart.register_detail_id', '=', 'register_detail.id')
				->join('register', 'register.id', '=', 'register_detail.register_id')
				->where('manifest_chart.session', '=', session()->getId())
				->where('manifest_chart.temporary', '!=', 0)
				->orderByRaw('tanggal ASC')
				->get();

			
			foreach($resi as $det){
				$digunakan = $det->qty_manifest + $det->temporary;
				$sisa = $det->banyak - $digunakan;

				DB::table('register_detail')
				->where('id', $det->register_detail_id)
				->update(['qty_manifest' => $digunakan, 'sisa_manifest'=>$sisa]);

			}

			$charts = DB::table('manifest_chart')->where('session', '=', session()->getId())->get();

			foreach($charts as $chart){

				DB::table('manifest_detail')->insert([
					['manifest_id' => $id, 'register_detail_id' => $chart->register_detail_id, 'qty'=>$chart->temporary, 'created'=>$chart->created],
				]);

			}



			$deleted = DB::table('manifest_chart')->where('session', '=', session()->getId())->delete();

			Session::put('print_manifest',$id);

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before update data is execute
	    | ---------------------------------------------------------------------- 
	    | @postdata = input post data 
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_edit(&$postdata,$id) {        
	        //Your code here

			$bulan = date("m"); 
			$tahun = date("y"); 

			$kode_tempat = $this->generate_number_lokasi();
			$kode_urut = $this->generate_urutan_berdasarkan_lokasi_manifest();




			$postdata['nomor_manifest'] = "MN".$kode_tempat."-".$tahun.$bulan.$kode_urut;
			$postdata['tanggal_berangkat'] = date('Y-m-d');


	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_edit($id) {
	        //Your code here 

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_delete($id) {
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_delete($id) {
	        //Your code here

	    }



	    //By the way, you can still create your own method in here... :) 

		public function getAdd() {
			if(!CRUDBooster::isCreate() && $this->global_privilege==FALSE || $this->button_add==FALSE) {    
			  CRUDBooster::redirect(CRUDBooster::adminPath(),trans("crudbooster.denied_access"));
			}

			
			$data = [];
			$data['page_title'] = 'Tambah Manifest';

			$resi = DB::table('manifest_chart')
					->join('register_detail', 'manifest_chart.register_detail_id', '=', 'register_detail.id')
					->join('register', 'register.id', '=', 'register_detail.register_id')
					->where('manifest_chart.session', '=', session()->getId())
					->where('manifest_chart.temporary', '!=', 0)
					->orderByRaw('tanggal ASC')
					->get();


			$data['chart'] = $resi;
			
			//Please use view method instead view method from laravel
			return $this->view('manifest/add',$data);
		}


		public function generate_number_lokasi(){

			$role_tempat = "";
			if (strpos(strtolower(CRUDBooster::myPrivilegeName()), 'admin') !== false) {
				$role_tempat = '01';
			}else{
				$role_tempat = strtolower(CRUDBooster::myPrivilegeName());
			}

			return $role_tempat;

		}


		public function generate_urutan_berdasarkan_lokasi_manifest(){

			$kode = "";
			$kode_lokasi = $this->generate_number_lokasi();
			$kode_lokasi = "MN".$kode_lokasi;


			$jumlahRegisterLokasi = DB::table('manifest')->where('nomor_manifest', 'like', '%'.$kode_lokasi.'%' )->whereMonth('tanggal_berangkat', '=', date('m'))
			->whereYear('tanggal_berangkat', '=', date('Y'))->get();

			$jumlahRegisterLokasi = (int)count($jumlahRegisterLokasi);

			if( $jumlahRegisterLokasi<= 999999){

				$urutan = $jumlahRegisterLokasi+1;

				$kode = str_pad($urutan, 6, "0", STR_PAD_LEFT);


			}else{

				$urutan = $jumlahRegisterLokasi+1;

				$kode = $urutan;
			}

			return $kode;
		}


		public function tujuan_rute(){
			$kode_lokasi = (int)$this->generate_number_lokasi();

			$lokasi_tujuan = DB::table('rute')->where('asal_id', '=', $kode_lokasi )->pluck('tujuan_id')->toArray();

			$in_list = "";

			foreach($lokasi_tujuan as $lokasi){
				$in_list = $in_list.$lokasi.",";
			}

			$in_list = substr_replace($in_list, "", -1);

			return $in_list;
		}


		public function getDetail($id) {
			if(!CRUDBooster::isRead() && $this->global_privilege==FALSE || $this->button_edit==FALSE) {    
				CRUDBooster::redirect(CRUDBooster::adminPath(),trans("crudbooster.denied_access"));
			}

			// if(Session::get('print_manifest')==""){
			// 	return;
			// }
			  
			$data = [];
			$data['page_title'] = 'Detail Data';
			$data['row'] = DB::table('manifest')
			->join('kendaraan','kendaraan.id','=','manifest.kendaraan_id')
			->where('manifest.id',$id)->first();

			$data['detail'] = DB::table('manifest_detail')
			->join('manifest', 'manifest.id','=','manifest_detail.manifest_id')
			->join('register_detail', 'register_detail.id','=','manifest_detail.register_detail_id')
			->join('register','register.id','=','register_detail.register_id')
			->join('pelanggan','pelanggan.id','=','register.pelanggan_id')
			->join('pelanggan as penerima', 'penerima.id','=','register.penerima_id')
			->select('manifest.*', 'register_detail.*', 'register.*', 'pelanggan.*', 'penerima.*', 'penerima.nama as nama_penerima')
			->where('manifest.id',$id)
			->get();


			$datatopdf = PDF::loadView('manifest/print', $data);

			$pdf = PDF::loadView('manifest/print', $data);

			Session::forget('print_manifest');
    		// return $pdf->download('invoice.pdf');
			return $pdf->stream();
		}

	}