<?php namespace App\Http\Controllers;

		use Session;
		use Request;
		use DB;
		use CRUDBooster;

		class ApiResiController extends \crocodicstudio\crudbooster\controllers\ApiController {

		    function __construct() {    
				$this->table       = "register";        
				$this->permalink   = "resi";    
				$this->method_type = "get"; 
				$this->resi = "";
		    }
		

		    public function hook_before(&$postdata) {
		        //This method will be execute before run the main process

		    }

		    public function hook_query(&$query) {
		        //This method is to customize the sql query

		    }

		    public function hook_after($postdata,&$result) {
		        //This method will be execute after run the main process
				$this->resi = $postdata['resi'];

				// $resi = DB::table('register')->join('register_detail', function($join){
				// 	$join->on('register.id','=','register_detail.register_id')->where('resi',$this->resi )->orderByRaw('tanggal ASC');
				// })->get();

				$resi = DB::table('register')
					->join('register_detail', 'register_detail.register_id', '=', 'register.id')
					->leftJoin('manifest_chart', 'manifest_chart.register_detail_id', '=', 'register_detail.id')
					->select(DB::raw('(sisa_manifest - temporary) as sisa_chart, manifest_chart.*, register_detail.*, register_detail.id as reg_detail_id, register.*'))
					->where('resi',$this->resi )
					->orderByRaw('tanggal ASC')
					->get();
				
				$result = $resi;
				
				return $result;

		    }

		}