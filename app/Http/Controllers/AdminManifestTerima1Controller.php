<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;
	use Barryvdh\DomPDF\Facade as PDF;

	class AdminManifestTerima1Controller extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "id";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = true;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "manifest_terima";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"No Terima","name"=>"nomor_terima"];
			$this->col[] = ["label"=>"Tanggal","name"=>"tanggal"];
			$this->col[] = ["label"=>"Catatan","name"=>"catatan"];
			$this->col[] = ["label"=>"Checkby","name"=>"checkby"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			// $this->form[] = ['label'=>'No Terima','name'=>'nomor_terima','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-3'];
			$this->form[] = ['label'=>'Tanggal','name'=>'tanggal','type'=>'date','validation'=>'required|date','width'=>'col-sm-3', 'value'=>date("Y-m-d"), 'disabled'=>true];
			$this->form[] = ['label'=>'Catatan','name'=>'catatan','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-8'];
			// $this->form[] = ['label'=>'Check by','name'=>'checkby','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-3'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'No Terima','name'=>'nomor_terima','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-3'];
			//$this->form[] = ['label'=>'Tanggal','name'=>'tanggal','type'=>'date','validation'=>'required|date','width'=>'col-sm-3' , 'value'=>date("Y-m-d"), 'disabled'=>true];
			//$this->form[] = ['label'=>'Catatan','name'=>'catatan','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-8'];
			//$this->form[] = ['label'=>'Checkby','name'=>'checkby','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-3'];
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

				editor = new SimpleTableCellEditor('table_register_detail');
				editor.SetEditableClass('editMe', { validation: $.isNumeric });




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
						var _thisvalue = parseInt($(this).html());
						$('#sisa'+_thisid).html(_thisvalue);
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



				$('#lokasi_id_xxxx').on('change',function(){ 

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
										_html = '<tr style=\'background-color:#eee\'><td>'+_i+'</td><td>'+value.resi+'</td><td>'+value.tanggal+'</td><td>'+value.produk+'</td><td>'+value.sisa_manifest+'</td><td><input class=\'input_manifest\' resi=\''+value.resi+'\' number=\''+value.sisa_manifest+'\' alt=\''+value_id+'\' type=\'text\' value=\''+value_text+'\' size=\'2\'></td><td id=\'sisa'+value_id+'\'>'+_sisa_chart+'</td></tr>';
									}else{
										_html = '<tr><td>'+_i+'</td><td>'+value.resi+'</td><td>'+value.tanggal+'</td><td>'+value.produk+'</td><td>'+value.sisa_manifest+'</td><td><input class=\'input_manifest\' resi=\''+value.resi+'\'  number=\''+value.sisa_manifest+'\' alt=\''+value_id+'\' type=\'text\' value=\''+value_text+'\' size=\'2\'></td><td id=\'sisa'+value_id+'\'>'+_sisa_chart+'</td></tr>';
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

					$('#table_register_detail .input_manifest').each(function(){
						
						/*if($(this).val() != 0){
							chart.push({
								regid : $(this).attr('alt'),
								qty : $(this).val(),
								session: '".session()->getId()."'
							});
						}*/

						chart.push({
							regid : $(this).attr('alt'),
							qty : $(this).html(),
							session: '".session()->getId()."'
						});

						if( ($(this).val() > $(this).attr('number'))   ){
							_flag_tidak_valid = true;
							console.log('lebih banyak');
							return;
						}

						if( ($(this).val() < 0) ){
							_flag_tidak_valid = true;
							console.log('min 0');
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


				function addRowHandlers() {
					var table = document.getElementById('data_details');
					var rows = table.getElementsByTagName('tr');
					for (i = 0; i < rows.length; i++) {
						var currentRow = table.rows[i];
						var createClickHandler = 
							function(row) 
							{
								return function() { 
									var cell = row.getElementsByTagName('td')[1];
									var id = cell.innerHTML;

									$.ajax({
										url: '/api/terima_maniifest',
										type: 'GET',
										success: function(msg) {
											
												$('#table_register_detail tbody>tr').remove();
				
												var _i = 1;
												$.each( msg, function( key, value ) {
													var _html = '';
													var value_id = value.reg_detail_id;
													var value_text = 0;
													var _sisa_chart = 0
				
													if(value.terima != null){
														value_text = value.terima;
													}
				
													if(value.selisih != null){
														_sisa_chart = value.selisih;
													}else{
														_sisa_chart = value.qty_awal;
													}
				
				
				
													if(_i%2==0){
														_html = '<tr style=\'background-color:#eee\'><td>'+_i+'</td><td>'+value.nomor_manifest+'</td><td>'+value.tanggal_berangkat+'</td><td>'+value.resi+'</td><td>'+value.produk+'</td><td>'+value.qty_awal+'</td><td  class=\'editMe input_manifest\' nomor=\''+value.nomor_manifest+'\' mn=\''+value.man_id+'\' resi=\''+value.resi+'\'  number=\''+value.qty_awal+'\' alt=\''+value_id+'\' style=\'background-color:#fff2cd\'>'+value_text+'</td><td id=\'sisa'+value_id+'\'>'+_sisa_chart+'</td></tr>';
													}else{
														_html = '<tr><td>'+_i+'</td><td>'+value.nomor_manifest+'</td><td>'+value.tanggal_berangkat+'</td><td>'+value.resi+'</td><td>'+value.produk+'</td><td>'+value.qty_awal+'</td><td  class=\'editMe input_manifest\' nomor=\''+value.nomor_manifest+'\'  mn=\''+value.man_id+'\' resi=\''+value.resi+'\' number=\''+value.qty_awal+'\'  alt=\''+value_id+'\' style=\'background-color:#fff2cd\'>'+value_text+'</td><td id=\'sisa'+value_id+'\'>'+_sisa_chart+'</td></tr>';
													}
													_i = _i + 1;
				
													$('#table_register_detail tbody').append(_html);
												});
				
												callActionText();

											},
				
										data: {
											'manifest' : id
										},
										headers: {
											Authorization: 'Bearer ' + _token
										},
										error: function(jqXHR, textStatus, errorThrown) {}
									
									});
								};
							};
				
						currentRow.onclick = createClickHandler(currentRow);
					}
				}
				window.onload = addRowHandlers();


				$('#table_register_detail').on('cell:edited', function (event) {
					var chart = [];
					var _flag_tidak_valid = false;
					var this_resi = '';

					$('#table_register_detail .input_manifest').each(function(){

						this_resi = $(this).attr('nomor');

						chart.push({
							regid : $(this).attr('alt'),
							qty : $(this).html(),
							session: '".session()->getId()."',
							mn: $(this).attr('mn')
						});

						if( (parseInt($(this).html()) > $(this).attr('number'))   ){
							_flag_tidak_valid = true;
							console.log('lebih banyak');
							return;
						}

						if( (parseInt($(this).html()) < 0) ){
							_flag_tidak_valid = true;
							console.log('min 0');
							return;
						}
						
					});

					if( _flag_tidak_valid == true){
						alert('jumlah tidak valid');
						return;
					}

					console.log(chart);


					$.ajax({
						url: '/api/terima',
						type: 'POST',
						success: function(msg) {
							
								$('#table_manifest_detail tbody>tr').remove();

								var _i = 1;
								$.each( msg, function( key, value ) {
									var _html = '';
									if(_i%2==0){
										_html = '<tr style=\'background-color:#eee\'><td>'+_i+'</td><td>'+value.nomor_manifest+'</td><td>'+value.resi+'</td><td>'+value.tanggal+'</td><td>'+value.produk+'</td><td>'+value.temporary+'</td></tr>';
									}else{
										_html = '<tr><td>'+_i+'</td><td>'+value.nomor_manifest+'</td><td>'+value.resi+'</td><td>'+value.tanggal+'</td><td>'+value.produk+'</td><td>'+value.temporary+'</td></tr>';
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


					$.ajax({
						url: '/api/terima_maniifest',
						type: 'GET',
						success: function(msg) {
							
								$('#table_register_detail tbody>tr').remove();

								var _i = 1;
								$.each( msg, function( key, value ) {
									var _html = '';
									var value_id = value.reg_detail_id;
									var value_text = 0;
									var _sisa_chart = 0

									if(value.terima != null){
										value_text = value.terima;
									}

									if(value.selisih != null){
										_sisa_chart = value.selisih;
									}else{
										_sisa_chart = value.qty_awal;
									}



									if(_i%2==0){
										_html = '<tr style=\'background-color:#eee\'><td>'+_i+'</td><td>'+value.nomor_manifest+'</td><td>'+value.tanggal_berangkat+'</td><td>'+value.resi+'</td><td>'+value.produk+'</td><td>'+value.qty_awal+'</td><td  class=\'editMe input_manifest\' nomor=\''+value.nomor_manifest+'\' mn=\''+value.man_id+'\' resi=\''+value.resi+'\'  number=\''+value.qty_awal+'\' alt=\''+value_id+'\' style=\'background-color:#fff2cd\'>'+value_text+'</td><td id=\'sisa'+value_id+'\'>'+_sisa_chart+'</td></tr>';
									}else{
										_html = '<tr><td>'+_i+'</td><td>'+value.nomor_manifest+'</td><td>'+value.tanggal_berangkat+'</td><td>'+value.resi+'</td><td>'+value.produk+'</td><td>'+value.qty_awal+'</td><td  class=\'editMe input_manifest\' nomor=\''+value.nomor_manifest+'\' number=\''+value.qty_awal+'\' mn=\''+value.man_id+'\' resi=\''+value.resi+'\'  alt=\''+value_id+'\' style=\'background-color:#fff2cd\'>'+value_text+'</td><td id=\'sisa'+value_id+'\'>'+_sisa_chart+'</td></tr>';
									}
									_i = _i + 1;

									$('#table_register_detail tbody').append(_html);
								});

								callActionText();

							},

						data: {
							'manifest' : this_resi
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
			$this->load_js[] = asset("vendor/crudbooster/SimpleTableCellEditor.js");
	        
	        
	        
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

			if($column_index==0){
				$cel_rm = str_replace("<input type='checkbox' class='checkbox' name='checkbox[]' value='",'', $column_value);
				$cel_rm = str_replace("'/>",'',$cel_rm);
				$this->selected_pk = $cel_rm;
			}

			if($column_index==1){
				$column_value = '<a href="'.url(config('crudbooster.ADMIN_PATH')).'/manifest_terima/info/'.$this->selected_pk.'">'.$column_value.'</a>';
			}


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

			$postdata['checkby'] = CRUDBooster::myId();
			$postdata['tanggal'] = date('Y-m-d');
			$postdata['nomor_terima'] = "RF".$kode_tempat."-".$tahun.$bulan.$kode_urut;

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

			$resi = DB::table('terima_chart')
					->join('register_detail', 'terima_chart.register_detail_id', '=', 'register_detail.id')
					->join('register', 'register.id', '=', 'register_detail.register_id')
					->join('manifest', 'manifest.id', '=', 'terima_chart.manifest_id')
					->select(DB::raw('manifest.id as manifest_id, register_detail.id as register_detail_id, terima_chart.temporary as qty, (select register_detail.total / register_detail.banyak * terima_chart.temporary) as total' ))
					->where('terima_chart.session', '=', session()->getId())
					->where('terima_chart.temporary', '!=', 0)
					->orderByRaw('tanggal ASC')
					->get();

			$tanggal = date('Y-m-d H:i:s');
		
			foreach($resi as $chart){

				if($chart->qty>0){
					DB::table('manifest_terimabarang')->insert([
						['manifest_terima_id' => $id,'manifest_id' => $chart->manifest_id, 'register_detail_id' => $chart->register_detail_id, 'qty'=>$chart->qty, 'total' => round($chart->total,0), 'created'=>$tanggal],
					]);
				}

			}
			$deleted = DB::table('terima_chart')->where('session', '=', session()->getId())->delete();
			$deleted = DB::table('terima_chart')->where('temporary', '=', 0)->delete();


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
			$kode_lokasi = "RF".$kode_lokasi;


			$jumlahRegisterLokasi = DB::table('manifest_terima')->where('nomor_terima', 'like', '%'.$kode_lokasi.'%' )->whereMonth('tanggal', '=', date('m'))
			->whereYear('tanggal', '=', date('Y'))->get();

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


		public function getAdd() {
			if(!CRUDBooster::isCreate() && $this->global_privilege==FALSE || $this->button_add==FALSE) {    
			  CRUDBooster::redirect(CRUDBooster::adminPath(),trans("crudbooster.denied_access"));
			}

			
			$data = [];
			$data['page_title'] = 'Tambah Manifest';
	
			$resi = DB::table('terima_chart')
				->join('register_detail', 'terima_chart.register_detail_id', '=', 'register_detail.id')
				->join('register', 'register.id', '=', 'register_detail.register_id')
				->join('manifest', 'manifest.id', '=', 'terima_chart.manifest_id')
				->where('terima_chart.session', '=', session()->getId())
				->where('terima_chart.temporary', '!=', 0)
				->orderByRaw('tanggal ASC')
				->get();



			// $sum = DB::table('register')
			// ->join('register_detail', 'register.id','=','register_detail.register_id')
			// ->select(DB::raw('register.resi, SUM(register_detail.sisa_manifest) as sisa, SUM(register_detail.banyak) as banyak'))
			// ->groupBy(DB::raw("register.resi"))
			// ->havingRaw('GROUP_CONCAT(register.resi) LIKE ?',['%RS0'.(int)$this->generate_number_lokasi().'%'])
			// ->havingRaw('banyak > ?', [0])
			// ->get();


			// $sum = DB::select("select (select sum(`temporary`) from `terima_chart` where `register_detail_id` = `register_detail`.`id`)  as `terima`, (select sum(`manifest_terimabarang`.`qty`) from `manifest_terimabarang` where `manifest_terimabarang`.`register_detail_id` = `register_detail`.`id`) as `terimabarang`, (select CAST(`qty_manifest` AS DECIMAL) - CAST(`terimabarang` AS DECIMAL) ) as qty_awal, (select CAST(`qty_manifest` AS DECIMAL) - CAST(`terimabarang` AS DECIMAL) - CAST(`terima` AS DECIMAL) ) as selisih , `register_detail`.*, `register_detail`.`id` as `reg_detail_id`, `register`.*, `manifest`.*, `manifest`.`id` as `man_id`   from `register_detail` left join `manifest_detail` on `manifest_detail`.`register_detail_id` = `register_detail`.`id` left join `manifest` on `manifest`.`id` = `manifest_detail`.`manifest_id` left join `register` on `register`.`id` = `register_detail`.`register_id` where `manifest`.`nomor_manifest` LIKE '?' group by `register_detail`.`id` HAVING qty_awal > 0 order by tanggal ASC", ['%MN0'.(int)$this->generate_number_lokasi().'%']);
				
			// print_r($sum);
			// $list_available = [];
			// if(count($sum)>0){
			// 	foreach($sum as $s){
			// 		$list_available[] = $s->nomor_manifest;
			// 	}
			// }
			
			// print_r($list_available);
			// $list_available = array_unique($list_available);
			// print_r($list_available);


			$register = DB::table('manifest')
					->select(DB::raw('(select sum(`manifest_terimabarang`.`qty`) from `manifest_terimabarang` where `manifest_terimabarang`.`manifest_id` = `manifest`.`id`) as `terimabarang`'), DB::raw('(select sum(`manifest_detail`.`qty`) from `manifest_detail` where `manifest_detail`.`manifest_id` = `manifest`.`id`) as `qty_detail`'), DB::raw( '(select CAST(`qty_detail` AS DECIMAL) -  CAST(`terimabarang` AS DECIMAL)) as `selisih`' ), 'manifest.*', 'manifest.id as man_id', 'kendaraan.*', 'pengemudi.*')
					->join('kendaraan', 'kendaraan.id','manifest.kendaraan_id')
					->join('pengemudi','pengemudi.id','manifest.pengemudi_id')
					->where('lokasi_id','=', (int)$this->generate_number_lokasi() )
					->havingRaw('`selisih` IS NULL OR `selisih` > 0 ', [''])
					->orderByRaw('tanggal_berangkat ASC')->get();

			$data['chart'] = $resi;
			$data['register'] = $register;
			// $data['array_sum'] = $array_sum;
			// $data['array_banyak'] = $array_banyak;
			
			//Please use view method instead view method from laravel
			return $this->view('terima/add',$data);
		}


		public function getinfo($id){
			if(!CRUDBooster::isRead() && $this->global_privilege==FALSE || $this->button_edit==FALSE) {    
				CRUDBooster::redirect(CRUDBooster::adminPath(),trans("crudbooster.denied_access"));
			}

			$data = [];
			$data['page_title'] = 'Detail Data';
			$data['row'] = DB::table('manifest_terima')
			->join('cms_users','cms_users.id','=','manifest_terima.checkby')
			->where('manifest_terima.id',$id)->first();

			$data['detail'] = DB::table('manifest_terimabarang')
			->join('manifest', 'manifest.id','=','manifest_terimabarang.manifest_id')
			->join('register_detail', 'register_detail.id','=','manifest_terimabarang.register_detail_id')
			->join('register','register.id','=','register_detail.register_id')
			->join('pelanggan','pelanggan.id','=','register.pelanggan_id')
			->join('pelanggan as penerima', 'penerima.id','=','register.penerima_id')
			->select('manifest_terimabarang.*', 'manifest_terimabarang.qty as manifest_qty', 'manifest_terimabarang.total as total_qty', 'manifest.*', 'register_detail.*', 'register.*', 'pelanggan.*', 'pelanggan.nama as nama_pengirim', 'penerima.*', 'penerima.nama as nama_penerima')
			->where('manifest_terimabarang.manifest_terima_id',$id)
			->get();


			$data['id'] = $id;

			return $this->view('terima/info',$data);
		}


		public function getDetail($id){
			if(!CRUDBooster::isRead() && $this->global_privilege==FALSE || $this->button_edit==FALSE) {    
				CRUDBooster::redirect(CRUDBooster::adminPath(),trans("crudbooster.denied_access"));
			}

			$data = [];
			$data['page_title'] = 'Detail Data';
			$data['row'] = DB::table('manifest_terima')
			->join('cms_users','cms_users.id','=','manifest_terima.checkby')
			->where('manifest_terima.id',$id)->first();

			$data['detail'] = DB::table('manifest_terimabarang')
			->join('manifest', 'manifest.id','=','manifest_terimabarang.manifest_id')
			->join('register_detail', 'register_detail.id','=','manifest_terimabarang.register_detail_id')
			->join('register','register.id','=','register_detail.register_id')
			->join('pelanggan','pelanggan.id','=','register.pelanggan_id')
			->join('pelanggan as penerima', 'penerima.id','=','register.penerima_id')
			->select('manifest_terimabarang.*', 'manifest_terimabarang.qty as manifest_qty', 'manifest_terimabarang.total as total_qty', 'manifest.*', 'register_detail.*', 'register.*', 'pelanggan.*', 'pelanggan.nama as nama_pengirim', 'penerima.*', 'penerima.nama as nama_penerima')
			->where('manifest_terimabarang.manifest_terima_id',$id)
			->get();


			$data['id'] = $id;

			$datatopdf = PDF::loadView('terima/print', $data);

			$pdf = PDF::loadView('terima/print', $data);

			Session::forget('print_manifest');
    		// return $pdf->download('invoice.pdf');
			return $pdf->stream();
		}



	}