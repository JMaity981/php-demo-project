<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\OpeningBalance;
use App\Models\Booking;
use App\Models\FundCreditDebit;
use App\Models\Lager;
use App\Models\SalePurchase;
use App\Models\Exchange;

use DirectoryIterator;
use ZipArchive;
use \RecursiveIteratorIterator;
use File;
use DB;
use PDF;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	/*public function __construct(){
		PDF::SetFont('helvetica', 'B', 20);
		PDF::AddPage();
		//PDF::Write(0, 'Example of side by sideHTML tables', '', 0, 'L', true, 0, false, false, 0);
		PDF::SetFont('helvetica', '', 8);


		$tbl = '<table>
				<tr>
					<td>
						<table cellspacing="0" cellpadding="1" border="1" style="float:right;">
							<tr>
								<th>Date</th>
								<th>Jewellers Name</th>
								<th>Amount</th>
								<th>Gold Wt.</th>
							</tr>

						</table>
					</td>
					<td>
						<table cellspacing="0" cellpadding="1" border="1" style="float:right;">
							<tr>
								<th>Date</th>
								<th>Jewellers Name</th>
								<th>Amount</th>
								<th>Gold Wt.</th>
							</tr>

						</table>
					</td>
				</tr>
			</table>';


		PDF::writeHTML($tbl, true, false, false, false, '');

		//Close and output PDF document
		PDF::Output('example_048.pdf', 'I');
		
		echo 'ok';die;
	}*/
	
	//get serial no 
	//public function get
	public function getLagerData (Request $request){
		//print_r($request->all());die;
		$c_id = $request->propId;
		//get lager details
        $data['lager_details'] = Lager::where('id',$c_id)->get()->toArray();
		
		//get booking total weight
		$data['booking'] = Booking::where('fk_lager_id', $c_id)->where('is_deliverd','N')->where('is_cancel','N')->sum('weight');
		
		//get gold value
		// $allgoldcredit = FundCreditDebit::where('fk_lager_id', $c_id)->where('type','G')->where('transaction_type','C')->sum('weight');
		// $allgolddebit = FundCreditDebit::where('fk_lager_id', $c_id)->where('type','G')->where('transaction_type','D')->sum('weight');
		// $data['gold_value'] = ($allgoldcredit - $allgolddebit);
		
		//get cash value
		// $cashdebit_exchange = Exchange::where('fk_lager_id', $c_id)->where('received_status','D')->sum('service_charge');
		// $cashdebit_salepurchase = SalePurchase::where('fk_lager_id', $c_id)->where('type','S')->sum('total_amount');
		// $cashcredit_salepurchase = SalePurchase::where('fk_lager_id', $c_id)->where('type','S')->sum('pay_amount');
		// $cashcredit_fundcreditdebit = FundCreditDebit::where('fk_lager_id', $c_id)->where('transaction_type','C')->where('type','C')->sum('amount');
		// $cashdedit_fundcreditdebit = FundCreditDebit::where('fk_lager_id', $c_id)->where('transaction_type','C')->where('type','D')->sum('amount');

		// $allcashcredit = $cashcredit_salepurchase + $cashcredit_fundcreditdebit;
		// $allcashdebit = $cashdebit_exchange + $cashdebit_salepurchase + $cashdedit_fundcreditdebit;
		// $data['cash_value'] = ($allcashcredit - $allcashdebit);
        return $data;
	}
	//get gold cash details
	public function getGoldCashDetails (Request $request){
		$val = OpeningBalance::get()->toArray();
		return $val;
	}
	/*----------------- Create zip folder in the server ---------------*/
	public function zipDownload ($filename){
		//print_r($filename);die;
		$filenameexp = explode('/', $filename);
		
		$rootPath = $filename;
		
        $fileName = storage_path('zip-pdf/'.$filenameexp[1].'.zip');
        $zip = new ZipArchive;
        if ($zip->open($fileName, ZipArchive::CREATE) === TRUE)
        {
			foreach (new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($rootPath)) as $filename) {
				$files[] = $filename;
			}
			foreach ($files as $name => $file)
			{
				if (!$file->isDir())
				{
					$filePath = $file->getRealPath();
					$relativePath = substr($filePath, strlen($rootPath) + 1);

					$zip->addFile($filePath, $relativePath);
				}
			}
			$zip->close();
        }
	}
	public function downloadAnyFile(Request $request){
		$file = $request->filename;
		
		$headers = array(
			'Content-Type: application/pdf',
		);

  		return Response::download($file, basename($file), $headers)->deleteFileAfterSend(true);
	}
	/*------------------ Zip download in the local server -----------------*/
	public function saveZipFile(Request $request){
		//print_r($request->all());die;
		$filename = $request->filename;
		$fileurl = storage_path('zip-pdf/'.$filename.'.zip');
		return Response::download($fileurl, ''.$filename.'.zip', array('Content-Type: application/octet-stream','Content-Length: '. filesize($fileurl)))->deleteFileAfterSend(true);
	}
	/*--------- db bkp -----------*/
	public function dbBkp (Request $request){
		$file = storage_path('test/test.sql');
		//exec('mysqldump gold_store --user=root --password=Lionofsai!23 > '.$file.'/fileName.sql', $errors);
		
		Spatie\DbDumper\Databases\MySql::create()
			->setDbName('gold_store')
			->setUserName('root')
			->setPassword('Lionofsai!23')
			->dumpToFile($file);
			
			
		/*$filename = "backup_".strtotime(now()).".sql";
		$command = "mysqldump --user=".env('DB_USERNAME')." --password=".env('DB_PASSWORD')." --host=".env('DB_HOST')." ".env('DB_DATABASE')." > ".storage_path()."/app/backup/".$filename;
		//print_r($command);die;
		$t = exec($command);*/
		//return $t;
	}

	public function dbexport(Request $request){
		self::backupDatabaseAllTables();
	}

	public static function backupDatabaseAllTables(){
		//ENTER THE RELEVANT INFO BELOW
		$mysqlHostName      = env('DB_HOST');
		$mysqlUserName      = env('DB_USERNAME');
		$mysqlPassword      = env('DB_PASSWORD');
		$DbName             = env('DB_DATABASE');
		$file_name = 'database_backup_' . date('d-m-Y-H-i-s') . '.sql';


		$queryTables = json_decode(json_encode(\DB::select(\DB::raw('SHOW TABLES')), true), true);
		$tables= array_column($queryTables, 'Tables_in_gold_store') ;
		
		$connect = DB::connection()->getPdo();
		$get_all_table_query = "SHOW TABLES";
		$statement = $connect->prepare($get_all_table_query);
		$statement->execute();
		$result = $statement->fetchAll();
		$output = '';
		foreach($tables as $table)
		{
			$show_table_query = "SHOW CREATE TABLE " . $table . "";
			$statement = $connect->prepare($show_table_query);
			$statement->execute();
			$show_table_result = $statement->fetchAll();

			foreach($show_table_result as $show_table_row)
			{
				$output .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
			}
			$select_query = "SELECT * FROM " . $table . "";
			$statement = $connect->prepare($select_query);
			$statement->execute();
			$total_row = $statement->rowCount();

			for($count=0; $count<$total_row; $count++)
			{
				$single_result = $statement->fetch(\PDO::FETCH_ASSOC);
				$table_column_array = array_keys($single_result);
				$table_value_array = array_values($single_result);
				$output .= "\nINSERT INTO $table (";
				$output .= "" . implode(", ", $table_column_array) . ") VALUES (";
				$output .= "'" . implode("','", $table_value_array) . "');\n";
			}
		}

		$file_handle = fopen($file_name, 'w+');
		fwrite($file_handle, $output);
		fclose($file_handle);
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename=' . basename($file_name));
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file_name));
		ob_clean();
		flush();
		readfile($file_name);
		unlink($file_name);
	}
}
