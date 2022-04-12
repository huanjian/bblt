<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminRegisterController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "resi";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = false;
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
			$this->table = "register";
			$this->lokasi_login = (int)$this->generate_number_lokasi();
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Tanggal","name"=>"tanggal"];
			$this->col[] = ["label"=>"Nomor Resi","name"=>"resi"];
			$this->col[] = ["label"=>"Pengirim","name"=>"pelanggan_id","join"=>"pelanggan,nama"];
			$this->col[] = ["label"=>"Penerima","name"=>"penerima_id","join"=>"pelanggan,nama"];
			$this->col[] = ["label"=>"Keterangan","name"=>"keterangan"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			$columns[] = ['label'=>'Produk','name'=>'produk','type'=>'text','required'=>true];
			$columns[] = ['label'=>'Keterangan','name'=>'keterangan','type'=>'text','required'=>true];
			$columns[] = ['label'=>'Tabel Harga','name'=>'satuan_id','type'=>'select','datatable'=>'satuan,label_produk'];
			$columns[] = ['label'=>'Berat(KG)','name'=>'berat','type'=>'number','required'=>true];
			$columns[] = ['label'=>'Banyak(Koli)','name'=>'banyak','type'=>'number','required'=>true];
			$columns[] = ['label'=>'Kubik(M3)','name'=>'kubik','type'=>'number','required'=>true];
			$columns[] = ['label'=>'Harga','name'=>'harga','type'=>'number','required'=>true, "readonly"=>true];
			$columns[] = ['label'=>'Sub Total','name'=>'total','type'=>'number',"readonly"=>true,'required'=>true];
			
			$this->form = [];
			$this->form[] = ['label'=>'Pengirim','name'=>'pelanggan_id','type'=>'select2','validation'=>'required|integer|min:0', 'width'=>'col-sm-3','datatable'=>'pelanggan,nama', 'datatable_where'=>'lokasi_id = '.$this->lokasi_login];
			$this->form[] = ['label'=>'Alamat Pengirim','name'=>'alamat_pengirim','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-5'];
			$this->form[] = ['label'=>'Keterangan','name'=>'keterangan','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-5'];
			$this->form[] = ['label'=>'Penerima','name'=>'penerima_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-3','datatable'=>'pelanggan,nama', 'datatable_where'=>'lokasi_id != '.$this->lokasi_login];
			$this->form[] = ['label'=>'Alamat Penerima','name'=>'alamat_tujuan','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-5'];

			
			$this->form[] = ['label'=>'Register Detail','name'=>'register_detail', "class"=>"col-sm-3",'type'=>'child','columns'=>$columns,'table'=>'register_detail','foreign_key'=>'register_id'];

			// $columns[] = ['label'=>'Tabel Harga','name'=>'satuan_id','type'=>'datamodal','datamodal_table'=>'satuan','datamodal_columns'=>'label_produk,label_harga','datamodal_select_to'=>'label_produk:label_produk','datamodal_where'=>'','datamodal_size'=>'large'];
			# START FORM DO NOT REMOVE THIS LINE
			// $this->form = [];
			// $this->form[] = ['label'=>'Nomor Resi','name'=>'resi','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-3'];
			// $this->form[] = ['label'=>'Pengirim','name'=>'pelanggan_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-3','datatable'=>'pelanggan,nama'];
			// $this->form[] = ['label'=>'Alamat Pengirim','name'=>'alamat_pengirim','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-5'];
			// $this->form[] = ['label'=>'Keterangan','name'=>'keterangan','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-5'];

			// $this->form[] = ['label'=>'Penerima','name'=>'penerima_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-3','datatable'=>'pelanggan,nama'];
			// $this->form[] = ['label'=>'Alamat Penerima','name'=>'alamat_tujuan','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-5'];

			// $this->form[] = ['label'=>'Nama Barang','name'=>'barang','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-3'];
			// $this->form[] = ['label'=>'Keterangan Barang','name'=>'keterangan_barang','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-5'];
			// $this->form[] = ['label'=>'Satuan','name'=>'satuan_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-5','datatable'=>'satuan,label_produk'];


			// $this->form[] = ['label'=>'Banyak Koli','name'=>'banyak_koli','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-2'];
			// $this->form[] = ['label'=>'Berat Kg','name'=>'berat_kg','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-2'];
			// $this->form[] = ['label'=>'Harga Kg','name'=>'harga_kg','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-2'];
			// $this->form[] = ['label'=>'Harga Koli','name'=>'harga_koli','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-2'];
			// $this->form[] = ['label'=>'Harga Kubik','name'=>'harga_kubik','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-2'];
			
			
			// $this->form[] = ['label'=>'Lebar','name'=>'lebar','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-2'];
			// $this->form[] = ['label'=>'Panjang','name'=>'panjang','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-2'];
			// $this->form[] = ['label'=>'Tinggi','name'=>'tinggi','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-2'];

			// $this->form[] = ['label'=>'Orders Detail','name'=>'orders_detail','type'=>'child','columns'=>$columns,'table'=>'pelanggan','foreign_key'=>'pelanggan_id'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ["label"=>"Alamat Pengirim","name"=>"alamat_pengirim","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Alamat Tujuan","name"=>"alamat_tujuan","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Banyak Koli","name"=>"banyak_koli","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Barang","name"=>"barang","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Berat Kg","name"=>"berat_kg","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Cabang Id","name"=>"cabang_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"cabang,nama"];
			//$this->form[] = ["label"=>"Harga Kg","name"=>"harga_kg","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Harga Koli","name"=>"harga_koli","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Harga Kubik","name"=>"harga_kubik","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Keterangan","name"=>"keterangan","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Keterangan Barang","name"=>"keterangan_barang","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Lebar","name"=>"lebar","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Panjang","name"=>"panjang","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Pelanggan Id","name"=>"pelanggan_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"pelanggan,nama"];
			//$this->form[] = ["label"=>"Pembawa","name"=>"pembawa","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Resi","name"=>"resi","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Satuan Id","name"=>"satuan_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"satuan,id"];
			//$this->form[] = ["label"=>"Tinggi","name"=>"tinggi","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
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

				
				
				$('#registerdetailproduk').parent().attr('class', 'col-sm-4');
				$('#registerdetailketerangan').parent().attr('class', 'col-sm-5');
				$('#registerdetailsatuan_id').parent().attr('class', 'col-sm-4');
				$('#registerdetailberat').parent().attr('class', 'col-sm-3');
				$('#registerdetailbanyak').parent().attr('class', 'col-sm-3');
				$('#registerdetailkubik').parent().attr('class', 'col-sm-3');
				$('#registerdetailharga').parent().attr('class', 'col-sm-3');
				$('#registerdetailtotal').parent().attr('class', 'col-sm-3');
				
				
				$('#panel-form-registerdetail').children().children().css('width', '70%');
				$('#panel-form-registerdetail').children().children().css('margin', 'auto');
				

				function ajaxCallBack(retString){
					_token = retString;
				}


				function readString(){
					$.ajax({
						url: '/api/get-token',
						type: 'POST',
						success: function(msg) {
							console.log(msg['data']['access_token']);
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

				console.log(_token);



				$('#pelanggan_id').on('change',function(){ 

					$.ajax({
						url: '/api/admin_pelanggan_info',
						type: 'GET',
						success: function(msg) {
							$('#alamat_pengirim').val(msg['data']['alamat']);
							console.log(msg['data']['alamat']);
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


				$('#penerima_id').on('change',function(){ 

					$.ajax({
						url: '/api/admin_pelanggan_info',
						type: 'GET',
						success: function(msg) {
							$('#alamat_tujuan').val(msg['data']['alamat']);
							console.log(msg['data']['alamat']);
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


				function ajaxCallTipe(retString){
					_tipe = retString;
				}

				$('#registerdetailsatuan_id').on('change',function(){ 

					$.ajax({
						url: '/api/admin_satuan_detail',
						type: 'GET',
						success: function(msg) {
							$('#registerdetailharga').val(msg['data']['harga']);
							$('#label_harga').remove();
							$('#registerdetailharga').after('<label id=\'label_harga\'> / '+msg['data']['tipe']+'</label>');
							ajaxCallTipe(msg['data']['tipe']);
							console.log(msg['data']['harga']);

							if(_tipe=='kg'){
								let _total = $('#registerdetailberat').val() * $('#registerdetailharga').val();
								$('#registerdetailtotal').val(_total);
							}else if(_tipe=='koli'){
								let _total = $('#registerdetailbanyak').val() * $('#registerdetailharga').val();
								$('#registerdetailtotal').val(_total);
							}else if(_tipe=='kubik'){
								let _total = $('#registerdetailkubik').val() * $('#registerdetailharga').val();
								$('#registerdetailtotal').val(_total);
							}
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

				$('#registerdetailberat').on('change',function(){ 
					console.log(_tipe);
					if(_tipe=='kg'){
						let _total = $('#registerdetailberat').val() * $('#registerdetailharga').val();
						$('#registerdetailtotal').val(_total);
					}
				});

				$('#registerdetailbanyak').on('change',function(){ 
					console.log(_tipe);
					if(_tipe=='koli'){
						let _total = $('#registerdetailbanyak').val() * $('#registerdetailharga').val();
						$('#registerdetailtotal').val(_total);
					}
				});

				$('#registerdetailkubik').on('change',function(){ 
					console.log(_tipe);
					if(_tipe=='kubik'){
						let _total = $('#registerdetailkubik').val() * $('#registerdetailharga').val();
						$('#registerdetailtotal').val(_total);
					}
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
			$kode_urut = $this->generate_urutan_berdasarkan_lokasi_resi();




			$postdata['resi'] = "RS".$kode_tempat."-".$tahun.$bulan.$kode_urut;
			$postdata['tanggal'] = date('Y-m-d');
			// $postdata['pelanggan_id'] = $postdata['pelanggan_id'];
			// $postdata['alamat_pengirim'] = $postdata['alamat'];
			// $postdata['keterangan'] = "keterangan";
			// $postdata['penerima_id'] = $postdata['penerima_id'];
			// $postdata['alamat_tujuan'] = "surabaya";

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


		public function generate_urutan_berdasarkan_lokasi_resi(){

			$kode = "";
			$kode_lokasi = $this->generate_number_lokasi();
			$kode_lokasi = "RS".$kode_lokasi;

			$jumlahRegisterLokasi = DB::table('register')->where('resi', 'like', '%'.$kode_lokasi.'%' )->get();

			$jumlahRegisterLokasi = (int)count($jumlahRegisterLokasi);

			if( $jumlahRegisterLokasi<= 99999){

				$urutan = $jumlahRegisterLokasi+1;

				$kode = str_pad($urutan, 5, "0", STR_PAD_LEFT);


			}else{

				$urutan = $jumlahRegisterLokasi+1;

				$kode = $urutan;
			}

			return $kode;
		}


		public function getinfo($id){

			return Response::json("hlll");
		}


		

	}