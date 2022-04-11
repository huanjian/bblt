<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminKendaraanController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "nomor";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = false;
			$this->button_bulk_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = false;
			$this->button_edit = true;
			$this->button_delete = false;
			$this->button_detail = false;
			$this->button_show = false;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "kendaraan";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Nomor","name"=>"nomor"];
			$this->col[] = ["label"=>"Pengemudi","name"=>"pengemudi_id"];
			$this->col[] = ["label"=>"Keterangan","name"=>"keterangan"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			// # START FORM DO NOT REMOVE THIS LINE
			// $this->form = [];
			// $this->form[] = ['label'=>'Nomor Kendaraan','name'=>'nomor','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-3'];
			// $this->form[] = ['label'=>'Keterangan Kendaraan','name'=>'keterangan','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-5'];
			// $this->form[] = ['label'=>'Nama Pengemudi','name'=>'nm_pengemudi','type'=>'text','validation'=>'required','width'=>'col-sm-3'];
			// $this->form[] = ['label'=>'Alamat Pengemudi','name'=>'alamat_pengemudi','type'=>'text','validation'=>'required','width'=>'col-sm-5'];
			// $this->form[] = ['label'=>'Kota Pengemudi','name'=>'kota_pengemudi','type'=>'text','validation'=>'required','width'=>'col-sm-3'];
			// $this->form[] = ['label'=>'Telepon','name'=>'tlp_pengemudi','type'=>'text','validation'=>'required','width'=>'col-sm-3'];
			// $this->form[] = ['label'=>'KTP Pengemudi','name'=>'ktp_pengemudi','type'=>'upload','validation'=>'required','width'=>'col-sm-3'];
			// $this->form[] = ['label'=>'SIM Pengemudi','name'=>'sim_pengemudi','type'=>'upload','validation'=>'required','width'=>'col-sm-3'];
			// # END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			$this->form = [];
			$this->form[] = ['label'=>'Nomor','name'=>'nomor','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-3'];
			$this->form[] = ['label'=>'Keterangan','name'=>'keterangan','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-5'];
			$this->form[] = ['label'=>'Pengemudi','name'=>'pengemudi_id','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-2','datatable'=>'pengemudi,nama'];
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
			$this->index_button[] = ['label'=>'Tampilkan Data','url'=>url(config('crudbooster.ADMIN_PATH')).'/default_pengemudi',"icon"=>"fa fa-table", "class"=>"btn btn-sm btn-success"];
			$this->index_button[] = ['label'=>'Tambah Data','url'=>url(config('crudbooster.ADMIN_PATH')).'/pengemudi/add',"icon"=>"fa fa-plus-circle", "class"=>"btn btn-sm btn-success"];



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
	        $this->script_js = NULL;


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

			if($column_index==0){
				$cel_rm = str_replace("<input type='checkbox' class='checkbox' name='checkbox[]' value='",'', $column_value);
				$cel_rm = str_replace("'/>",'',$cel_rm);
				$this->selected_pk = $cel_rm;
			}

			if($column_index==1){
				// print($cel_rm)."--->";
				$column_value = '<a href="'.url(config('crudbooster.ADMIN_PATH')).'/kendaraan/edit/'.$this->selected_pk.'">'.$column_value.'</a>';
			}

			if($column_index==2){

				$pengemudi = DB::table('pengemudi')->where('id', $column_value)->first();

				$column_value = '<a href="'.url(config('crudbooster.ADMIN_PATH')).'/default_pengemudi/edit/'.$column_value.'">'.$pengemudi->nama.'</a>';
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

			
			// $newPengemudi = [];
			// $newPengemudi['nama'] = $postdata['nm_pengemudi'];
			// $newPengemudi['alamat'] = $postdata['alamat_pengemudi'];
			// $newPengemudi['kota'] = $postdata['kota_pengemudi'];
			// $newPengemudi['telepon'] = $postdata['tlp_pengemudi'];
			// $newPengemudi['ktp'] = $postdata['ktp_pengemudi'];
			// $newPengemudi['sim'] = $postdata['sim_pengemudi'];
			// $newPengemudi['penanda'] = "";
			// $newPengemudi['catatan'] = "";
			
			// $last_id =DB::table('pengemudi')->insertGetId(
			// 	$newPengemudi
			// );

			// unset($postdata['nm_pengemudi']);
			// unset($postdata['alamat_pengemudi']);
			// unset($postdata['kota_pengemudi']);
			// unset($postdata['tlp_pengemudi']);
			// unset($postdata['ktp_pengemudi']);
			// unset($postdata['sim_pengemudi']);

			// $postdata['pengemudi_id'] = $last_id;

			// return $postdata;

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

		// public function getAdd() {
		// 	//Create an Auth
		// 	if(!CRUDBooster::isCreate() && $this->global_privilege==FALSE || $this->button_add==FALSE) {    
		// 	  CRUDBooster::redirect(CRUDBooster::adminPath(),trans("crudbooster.denied_access"));
		// 	}
			
		// 	$data = [];
		// 	$data['page_title'] = 'Tambah Kendaraan';
			
		// 	//Please use view method instead view method from laravel
		// 	return $this->view('kendaraan/add',$data);
		// }


		// public function getEdit($id) {
		// 	//Create an Auth
		// 	if(!CRUDBooster::isUpdate() && $this->global_privilege==FALSE || $this->button_edit==FALSE) {    
		// 	  CRUDBooster::redirect(CRUDBooster::adminPath(),trans("crudbooster.denied_access"));
		// 	}

		// 	print_r($this->form);
			
		// 	$data = [];
		// 	$data['page_title'] = 'Ubah Kendaraan';
		// 	$data['row'] = DB::table('kendaraan')->where('id',$id)->first();
			
		// 	//Please use view method instead view method from laravel
		// 	return $this->view('kendaraan/edit',$data);
		// }


	}