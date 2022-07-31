<?php namespace App\Http\Controllers;

		use Session;
		use Request;
		use DB;
		use CRUDBooster;

		class ApiTerimaController extends \crocodicstudio\crudbooster\controllers\ApiController {

		    function __construct() {    
				$this->table       = "terima_chart";        
				$this->permalink   = "terima";    
				$this->method_type = "get";   
				$this->mysession = ""; 
		    }
		

		    public function hook_before(&$postdata) {
		        //This method will be execute before run the main process

		    }

		    public function hook_query(&$query) {
		        //This method is to customize the sql query

		    }

		    public function hook_after($postdata,&$result) {
		        //This method will be execute after run the main process

				if(count($postdata['json'])>0){
					$new_chart = [];
					
					$i_ = 0;
					foreach($postdata['json'] as $det){
						// $new = [];
						// $new['session'] = $det['session'];
						
						// $new['register_detail_id'] = $det['regid'];
						// $new['temporary'] = $det['qty'];
						// $new['created'] = date("Y-m-d H:i:s");

						// $new_chart[$i_] = $new;
						// $i_ = $i_ + 1;

						$this->mysession = $det['session'];
						DB::table('terima_chart')->updateOrInsert(
							['session' =>  $det['session'], 'register_detail_id' => $det['regid']], 
							['temporary' => $det['qty'], 'manifest_id' => $det['mn']]
						);

					}


					// DB::table('manifest_chart')->upsert($new_chart, ['session','register_detail_id'],['temporary']);

					// $resi = DB::table('manifest_chart')->join('register_detail', function($join){
					// 	$join->on('manifest_chart.register_detail_id','=','register_detail.id')->where('manifest_chart.session',$this->mysession)->orderByRaw('tanggal ASC');
					// })->get();

					$resi = DB::table('terima_chart')
					->join('register_detail', 'terima_chart.register_detail_id', '=', 'register_detail.id')
					->join('register', 'register.id', '=', 'register_detail.register_id')
					->join('manifest', 'manifest.id', '=', 'terima_chart.manifest_id')
					->where('terima_chart.session', '=', $this->mysession)
					->where('terima_chart.temporary', '!=', 0)
					->orderByRaw('tanggal ASC')
					->get();


					$result = $resi;
					
					return $result;

				}

		    }

		}