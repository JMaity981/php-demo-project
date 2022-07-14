<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::post('db-bkp', 'Controller@dbBkp');
Route::get('db-export', 'Controller@dbexport');
Route::get('save-zip-file', 'Controller@saveZipFile')->middleware('web');
Route::get('download-any-file', 'Controller@downloadAnyFile')->middleware('web');
Route::get('/', 'LoginCtrl@login')->middleware('web','prevent-back-history', 'beforelogin');
Route::post('login-auth', 'LoginCtrl@loginauth')->middleware('web','prevent-back-history', 'beforelogin');

Route::post('change-password','LoginCtrl@cngPsw')->middleware('web','prevent-back-history', 'afterlogin');


Route::post('get-lager-data','Controller@getLagerData')->middleware('web','prevent-back-history', 'afterlogin');
Route::get('get-gold-cash-details','Controller@getGoldCashDetails')->middleware('web','prevent-back-history', 'afterlogin');
	
	/*=================== Dashboard Route ================*/
//Route::get('dashboard', 'DashboardCtrl@dashboard')->middleware('web','prevent-back-history', 'afterlogin');

	/*================= Opening Balance =====================*/
Route::get('opening-balance', 'OpeningBalanceCtrl@openingBalance')->middleware('web','prevent-back-history', 'afterlogin');
Route::post('add-opening-balance', 'OpeningBalanceCtrl@addOpeningBalance')->middleware('web','prevent-back-history', 'afterlogin');
Route::post('get-opening-balance', 'OpeningBalanceCtrl@getOpeningBalance')->middleware('web','prevent-back-history', 'afterlogin');
Route::post('opening-balance-edit', 'OpeningBalanceCtrl@openingBalanceEdit')->middleware('web','prevent-back-history', 'afterlogin');

	/*================== Lager Route =============*/
Route::get('lager', 'LagerCtrl@userregistration')->middleware('web','prevent-back-history', 'afterlogin');
Route::post('add-lager', 'LagerCtrl@addLager')->middleware('web','prevent-back-history', 'afterlogin');
Route::get('userregistration-ajax-tbl', 'LagerCtrl@userregistrationAjaxTbl')->middleware('web','prevent-back-history', 'afterlogin');
Route::post('customer-status-change', 'LagerCtrl@customerStatusChange')->middleware('web','prevent-back-history', 'afterlogin');
Route::post('customer-delete', 'LagerCtrl@customerDelete')->middleware('web','prevent-back-history', 'afterlogin');
Route::post('customer-update', 'LagerCtrl@customerUpdate')->middleware('web','prevent-back-history', 'afterlogin');

	/*=============== recived Route ===============*/
		//Recived section
Route::get('recived', 'RecivedCtrl@recived')->middleware('web','prevent-back-history', 'afterlogin');
//Route::post('get-lager-data','RecivedCtrl@getLagerData')->middleware('web','prevent-back-history', 'afterlogin');	
Route::post('add-sample-wait','RecivedCtrl@addSampleWait')->middleware('web','prevent-back-history', 'afterlogin');
Route::post('add-purity','RecivedCtrl@addPurity')->middleware('web','prevent-back-history', 'afterlogin');
Route::get('get-sample-list','RecivedCtrl@getSampleList')->middleware('web','prevent-back-history', 'afterlogin');
Route::get('generate-bill-Pdf','PdfCtrl@generateBillPdf')->middleware('web','prevent-back-history', 'afterlogin');

	//Exchange section
Route::post('insert-exchange','RecivedCtrl@insertExchange')->middleware('web','prevent-back-history', 'afterlogin');
Route::get('generate-exchange-bill-pdf','PdfCtrl@generateExchangeBillPdf')->middleware('web','prevent-back-history', 'afterlogin');



/*================ Sale Purchase Route =================*/
Route::get('sale-purchase', 'salePurchaseCtrl@viewSalePurchase')->middleware('web','prevent-back-history', 'afterlogin');
Route::post('sale-purchase-insert','salePurchaseCtrl@insertSalePurchase')->middleware('web','prevent-back-history', 'afterlogin');
Route::post('onchange-sale-purchase','salePurchaseCtrl@onchangeSalePurchase')->middleware('web','prevent-back-history', 'afterlogin');
Route::get('generate-sale-purchase-bill-pdf','PdfCtrl@generateSalePurchaseBillPdf')->middleware('web','prevent-back-history', 'afterlogin');
	
	/*================ Transection Route =================*/
Route::get('transection', 'TransectionCtrl@transection')->middleware('web','prevent-back-history', 'afterlogin');	


	/*=============== Fund Credit & Debit =============*/
Route::get('fund-credit-debit', 'FundCreditDebitCtrl@fundCreditDebit')->middleware('web','prevent-back-history', 'afterlogin');
Route::post('insert-fund-credit-debit', 'FundCreditDebitCtrl@insertFundCreditDebit')->middleware('web','prevent-back-history', 'afterlogin');
Route::get('generate-fund-credit-debit-pdf','PdfCtrl@generateFundCreditDebitBillPdf')->middleware('web','prevent-back-history', 'afterlogin');


/*=============== Booking Route ===============*/
Route::get('booking', 'BookingCtrl@booking')->middleware('web','prevent-back-history', 'afterlogin');
Route::post('insert-booking', 'BookingCtrl@insertBooking')->middleware('web','prevent-back-history', 'afterlogin');
Route::get('booking-statement', 'BookingCtrl@bookingStatement')->middleware('web','prevent-back-history', 'afterlogin');
Route::post('booking-cancel', 'BookingCtrl@bookingCancel')->middleware('web','prevent-back-history', 'afterlogin');
Route::post('get-billing-data', 'BookingCtrl@getBillingData')->middleware('web','prevent-back-history', 'afterlogin');
Route::post('get-total-value', 'BookingCtrl@getTotalValue')->middleware('web','prevent-back-history', 'afterlogin');


/*=============== Statement Route ===============*/
// Route::get('statement', 'StatementCtrl@statement')->middleware('web','prevent-back-history', 'afterlogin');

        //----------- Party Due And Deposit Statement ------------//
Route::get('party-deu-deposit', 'StatementCtrl@partyDeuDeposit')->middleware('web','prevent-back-history', 'afterlogin');
Route::get('money-due-deposit', 'StatementCtrl@moneyDueDeposit')->middleware('web','prevent-back-history', 'afterlogin');
Route::get('gold-due-deposit', 'StatementCtrl@goldDueDeposit')->middleware('web','prevent-back-history', 'afterlogin');
Route::get('party-statement-pdf', 'PdfCtrl@partyStatementPdf')->middleware('web','prevent-back-history', 'afterlogin');

		//----------- tounch state ment route ---------//
Route::get('touch-statment', 'StatementCtrl@touchStatment')->middleware('web','prevent-back-history', 'afterlogin');
Route::get('tounch-and-statement', 'StatementCtrl@tounch')->middleware('web','prevent-back-history', 'afterlogin');
Route::get('touch-statement-pdf', 'PdfCtrl@touchStatementPdf')->middleware('web','prevent-back-history', 'afterlogin');


//========= refine statement ============//
Route::get('refine-statment', 'StatementCtrl@refineStatment')->middleware('web','prevent-back-history', 'afterlogin');
Route::get('refine-and-statment', 'StatementCtrl@refine')->middleware('web','prevent-back-history', 'afterlogin');
Route::get('refine-statement-pdf', 'PdfCtrl@refineStatementPdf')->middleware('web','prevent-back-history', 'afterlogin');
Route::post('refine-data-delete', 'StatementCtrl@refineDataDelete')->middleware('web','prevent-back-history', 'afterlogin');
//========= Sale Purchase statement ============//
Route::get('our-sale-and-parchase', 'StatementCtrl@ourSaleParchase')->middleware('web','prevent-back-history', 'afterlogin');
Route::get('sale-statement', 'StatementCtrl@saleStatement')->middleware('web','prevent-back-history', 'afterlogin');
Route::get('purchase-statement', 'StatementCtrl@purchaseStatement')->middleware('web','prevent-back-history', 'afterlogin');
// Route::get('our-sale-parchase-statement', 'PdfCtrl@ourSaleParchaseStatement')->middleware('web','prevent-back-history', 'afterlogin');
//Route::get('party-sale-and-parchase', 'StatementCtrl@partySaleParchase')->middleware('web','prevent-back-history', 'afterlogin');
Route::get('search-sale-parchase-statement', 'PdfCtrl@ourSaleParchaseStatement')->middleware('web','prevent-back-history', 'afterlogin');
Route::post('sale-purchase-non-gst-data-delete', 'StatementCtrl@salePurchaseNGstDelete')->middleware('web','prevent-back-history', 'afterlogin');


//========= debit-credit statement ============//
Route::get('debit-credit-statment', 'StatementCtrl@deditCredit')->middleware('web','prevent-back-history', 'afterlogin');
Route::get('debit-and-credit', 'StatementCtrl@deditAndCreditStatement')->middleware('web','prevent-back-history', 'afterlogin');
Route::get('debit-credit-statement-pdf', 'PdfCtrl@debitCreditStatementPdf')->middleware('web','prevent-back-history', 'afterlogin');

				//========= All Due Deposit Statement ============//
Route::get('all-deu-deposite-Statment', 'StatementCtrl@deuDeposite')->middleware('web','prevent-back-history', 'afterlogin');
Route::get('all-deposit', 'StatementCtrl@allDepositStatement')->middleware('web','prevent-back-history', 'afterlogin');
Route::get('all-due', 'StatementCtrl@allDueStatement')->middleware('web','prevent-back-history', 'afterlogin');
Route::get('search-due-deposit-statement', 'PdfCtrl@dueDepositStatement')->middleware('web','prevent-back-history', 'afterlogin');


Route::get('zip-download', 'PdfCtrl@zipDownload')->middleware('web','prevent-back-history', 'afterlogin');

//Route::get('database-backup', 'PdfCtrl@databaseBackup')->middleware('web','prevent-back-history', 'afterlogin');

Route::get('logout', function(){
	session()->forget('is_login');
	session()->forget('username');
	session()->flush();
	return Redirect::to('/');
})->middleware('web', 'prevent-back-history');





	



