<?php namespace App\Http\Controllers;

		use Session;
		use Request;
		use DB;
		use CRUDBooster;

		class ApiRegisterByLokasiController extends \crocodicstudio\crudbooster\controllers\ApiController {

		    function __construct() {    
				$this->table       = "register";        
				$this->permalink   = "register_by_lokasi";    
				$this->method_type = "get";  
				$this->lokasi_penerima = "";
				$this->lokasi_pengirim = "";
		    }


		    public function hook_before(&$postdata) {
		        //This method will be execute before run the main process
				
		    }

		    public function hook_query(&$query) {
		        //This method is to customize the sql query
				

		    }

		    public function hook_after($postdata,&$result) {																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																						
		        //This method will be execute after run the main process
				$this->lokasi_penerima = $postdata['resi'];
				$this->lokasi_pengirim = $postdata['lokasi_pengirim'];

				$resi = DB::table('register')->where('resi','like','%RS0'.(int)$this->lokasi_pengirim.'%' )->where('pelanggan_lokasi_id',$this->lokasi_penerima)->orderByRaw('tanggal ASC')->get();
				
				$result = $resi;
				
				return $result;
																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																						
		    }

		}