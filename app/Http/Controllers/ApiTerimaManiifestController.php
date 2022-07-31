<?php namespace App\Http\Controllers;

		use Session;
		use Request;
		use DB;
		use CRUDBooster;

		class ApiTerimaManiifestController extends \crocodicstudio\crudbooster\controllers\ApiController {

		    function __construct() {    
				$this->table       = "manifest";        
				$this->permalink   = "terima_maniifest";    
				$this->method_type = "get";    
				$this->manifest = "";
		    }
		

		    public function hook_before(&$postdata) {
		        //This method will be execute before run the main process

		    }

		    public function hook_query(&$query) {
		        //This method is to customize the sql query

		    }

		    public function hook_after($postdata,&$result) {
		        //This method will be execute after run the main process

				$this->manifest = $postdata['manifest'];

				// $resi = DB::select("select (sum(manifest_detail.qty) - sum(terima_chart.temporary)) as sisa_chart, `register_detail`.*, `register_detail`.`id` as `reg_detail_id`, `register`.*, `manifest`.*, `manifest`.`id` as `man_id`   from `register_detail` left join `manifest_detail` on `manifest_detail`.`register_detail_id` = `register_detail`.`id` left join `manifest` on `manifest`.`id` = `manifest_detail`.`manifest_id` left join `register` on `register`.`id` = `register_detail`.`register_id` left join `terima_chart` on `terima_chart`.`register_detail_id` = `register_detail`.`id` where `manifest`.`nomor_manifest` = ? group by `register_detail`.`id` order by tanggal ASC", [$this->manifest]);

				$resi = DB::select("select (select sum(`temporary`) from `terima_chart` where `register_detail_id` = `register_detail`.`id`)  as `terima`, (select sum(`manifest_terimabarang`.`qty`) from `manifest_terimabarang` where `manifest_terimabarang`.`register_detail_id` = `register_detail`.`id` and `manifest_terimabarang`.`manifest_id` = `manifest`.`id`) as `terimabarang` , `register_detail`.*, `register_detail`.`id` as `reg_detail_id`, `manifest_detail`.*, `manifest_detail`.`qty` as detail_qty, `register`.*, `manifest`.*, `manifest`.`id` as `man_id` , (select CAST(`detail_qty` AS DECIMAL) - CAST(IFNULL(`terimabarang`,0) AS DECIMAL) ) as qty_awal , (select CAST(`detail_qty` AS DECIMAL) - CAST(`terimabarang` AS DECIMAL) - CAST(`terima` AS DECIMAL) ) as selisih   from `register_detail` left join `manifest_detail` on `manifest_detail`.`register_detail_id` = `register_detail`.`id` left join `manifest` on `manifest`.`id` = `manifest_detail`.`manifest_id` left join `register` on `register`.`id` = `register_detail`.`register_id` where `manifest`.`nomor_manifest` = ? group by `register_detail`.`id` order by tanggal ASC", [$this->manifest]);
				// $result = DB::table('manifest')
				// 	->join('manifest_detail','manifest_detail.manifest_id','manifest.id')
				// 	->join('register_detail','manifest_detail.register_detail_id','register_detail.id')
				// 	->join('register','register.id','register_detail.register_id')
				// 	->where('nomor_manifest',$this->manifest)
				// 	->get();

				$result = $resi;
				
				return $result;

		    }

		}