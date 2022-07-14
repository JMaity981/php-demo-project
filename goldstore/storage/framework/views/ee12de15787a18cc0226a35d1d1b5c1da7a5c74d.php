<?php $__env->startSection('title', 'Transection'); ?>
<?php $__env->startSection('style'); ?>
<?php echo Html::style('public/assets/plugins/select2/css/select2.min.css'); ?>

<?php echo Html::style('public/assets/plugins/select2/css/select2-bootstrap4.css'); ?>

<?php echo Html::style('public/assets/plugins/notifications/css/lobibox.min.css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php echo Html::script('public/assets/pages-js/Recived.js'); ?>

<?php echo Html::script('public/assets/pages-js/sale-purchase.js'); ?>

<?php echo Html::script('public/assets/pages-js/FundCreditDebit.js'); ?>

<?php echo Html::script('public/assets/plugins/select2/js/select2.min.js'); ?>

<?php echo Html::script('public/assets/plugins/notifications/js/lobibox.min.js'); ?>

<?php echo Html::script('public/assets/plugins/notifications/js/notifications.min.js'); ?>

<?php echo Html::script('public/assets/plugins/edittable/bstable.js'); ?>

<?php echo Html::script('public/assets/pages-js/Transection.js'); ?>

<script>
	CommonJS.SingleDropdown();
	CommonJS.NumberValidation();
	CommonJS.commonProprietorDetaild();
	RecivedJs.Recived();
	SalePurchaseJs.salepurchase();
	FundCreditDebitJs.FundCreditDebit();
	TransectionJs.Transection();
</script>
<script>
	var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
		vars[key] = value;
    });
	$(".jewelryname").val(vars.lagerid);
    $(".jewelryname").trigger('change');
	//$(".jewelryname").select2("val", vars.lagerid);
</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <div class="row">
                        <div class="col-md-3">
                            <h4 class="mb-0">Ledger</h4>
                        </div>
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-2">
                            <div class="btn-group m-1 float-right" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-dark">Booking</button>
                                <button type="button" class="btn btn-primary booking_value">00.000</button>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="btn-group m-1 float-right" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-dark">GOLD</button>
                                <button type="button" class="btn btn-primary gold_value">00.000</button>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="btn-group m-1 float-right" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-dark">CASH</button>
                                <button type="button" class="btn btn-primary cash_value">00.000</button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr/>
                <?php echo $__env->make('common.commonProprietorDetails', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        
        <div class="card">
            <div class="card-body">
                <div class="card-title row">
                    <div class="col-md-10">
                        <h4 class="mb-0">Exchange</h4>
                    </div>
                    <div class="col-md-2">
                        <label  class="fs-18">
                            PRINT BILL
                            <input type="checkbox" name="print" class="w-28 h-18 print-exchange" checked>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </label>
                    </div>
                </div>
                <hr />
                <div class="exchange-calculate">
                    <div class="row add-sample-row-exchange">
                        <div class="col-md-1 col-sm-1 col-lg-1">
                            <div class="form-group">
                                <label>No:</label><br>
                                <button type="button" class="btn btn-dark">1</button>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-lg-3">
                            <div class="form-group">
                                <label>Alloy weight:</label>
                                <!--<input class="form-control exchange-alloy-weight" type="text" placeholder="Default input">-->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Weight</span>
                                    </div>
                                    <input type="text" class="form-control exchange-alloy-weight fine-gold-calculate reset-value"
                                        placeholder="Gold Weight">
                                    <div class="input-group-append">
                                        <span class="input-group-text">gm</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-lg-3">
                            <div class="form-group">
                                <label>Purity:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Purity</span>
                                    </div>
                                    <input class="form-control exchange-purity fine-gold-calculate reset-value" type="text"
                                        placeholder="Purity">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-lg-4">
                            <div class="form-group">
                                <label>Fine Gold:</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Weight</span>
                                    </div>
                                    <input class="form-control exchange-fine-gold-weight reset-value" type="text"
                                        placeholder="Fine Gold Weight" id="fine_gold">
                                    <div class="input-group-append">
                                        <span class="input-group-text">gm</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 col-sm-1 col-lg-1 pt-4">
                            <button type="button" class="btn btn-primary btn-sm mt-32 append-exchange-btn" data-slno="1">
                                <i class="fadeIn animated bx bx-plus"></i>
                            </button>
                        </div>
                        
                    </div>
                </div>
                
                <div class = "append"></div>
                <?php echo e(Form::open(array('url' => 'insert-exchange', 'id' => 'exchange_form'))); ?>

                    <input type="hidden" class="from-control hiddenlager" name="hidden">
                    <div class="row">
                        <div class="col-md-1 col-sm-1 col-lg-1">
                            <div class="form-group">
                                <button type="button" class="btn btn-dark">TOTAL</button>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-lg-3">
                            <div class="form-group">
                                <!--<input class="form-control exchange-alloy-weight" type="text" placeholder="Default input">-->
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Weight</span>
                                    </div>
                                    <input type="text" class="form-control exchange-alloy-weight fine-gold-calculate read-only"
                                        placeholder="Gold Weight" name="alloy_weight">
                                    <div class="input-group-append">
                                        <span class="input-group-text">gm</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-lg-3">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Purity</span>
                                    </div>
                                    <input class="form-control exchange-purity fine-gold-calculate read-only" type="text"
                                        placeholder="Purity" name="purity">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-lg-4">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Weight</span>
                                    </div>
                                    <input class="form-control exchange-fine-gold-weight" type="text"
                                        placeholder="Fine Gold Weight" name="fine_gold" id="fine_gold">
                                    <div class="input-group-append">
                                        <span class="input-group-text">gm</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md- col-sm-1 col-lg-1">
                            <button type="submit" class="btn btn-primary add-service-charge float-right">
                                Submit
                            </button>
                        </div>
                    </div>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
        
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <div class="row">
                        <div class="col-md-10">
                            <h4 class="mb-0">Sale/Purchase</h4>
                        </div>
                        <div class="col-md-2">
                            <label  class="fs-18">
                                PRINT BILL
                                <input type="checkbox" name="print" class="w-28 h-18 print-sale-purchase" checked>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </label>
                        </div>
                    </div>
                </div>
                <hr />
                <?php
                //print_r(request()->get('ammount'));die;
                if(request()->get('type')=='S'){
                    $lageridval = request()->get('lagerid');
                    $bookingidval = request()->get('bookingid');
                    $salerateval = request()->get('rate');
                    $purchaserateval = '';
                    $weightval = request()->get('weight');
                    $amountval = request()->get('ammount');
                    $salecheck = 'checked';
                    $purchasecheck = 'disabled';
                }elseif(request()->get('type')=='P'){
                    $lageridval = request()->get('lagerid');
                    $bookingidval = request()->get('bookingid');
                    $salerateval = '';
                    $purchaserateval = request()->get('rate');
                    $weightval = request()->get('weight');
                    $amountval = request()->get('ammount');
                    $purchasecheck = 'checked';
                    $salecheck = 'disabled';
                }else{
                    $lageridval = '';
                    $bookingidval = '';
                    $salerateval = '';
                    $purchaserateval = '';
                    $salecheck = '';
                    $purchasecheck = '';
                    $weightval = '';
                    $amountval = '';
                }
                //print_r($amountval);die;
                ?>
                <?php echo e(Form::open(['id' => 'sale_purchase'])); ?>

                <div class="row">
                    <input type="hidden" class="from-control hiddenlager" name="hidden" value="<?php echo e($lageridval); ?>">
                    <input type="hidden" class="from-control is_booking" name="is_booking" value="<?php echo e($bookingidval); ?>">
                    <div class="col-md-2 col-sm-2 col-lg-2">
                        <label for="validationCustom03">Sale Purchase Type:</label><br>
                        <div class="wraper">
                            <input type="radio" name="select_type" class="select_type" id="s_id" value="S" <?php echo e($salecheck); ?>>
                            <input type="radio" name="select_type" class="select_type" id="p_id" value="P" <?php echo e($purchasecheck); ?>>
                            <label for="s_id" class="option sale-option">
                                <div class="sales dot"></div>
                                <span>sales</span>
                            </label>
                            <label for="p_id" class="option purchase-option">
                                <div class="purchase dot"></div>
                                <span>purchase</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 col-lg-2">
                        <label>Sale Rate(Per Gram):</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text  bg-transparent"><svg
                                        xmlns="http://www.w3.org/2000/svg" class="text-primary"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                                        id="footer-icon-name" width="1em" height="1em"
                                        preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                        <path
                                            d="M17 6V4H6v2h3.5c1.302 0 2.401.838 2.815 2H6v2h6.315A2.994 2.994 0 0 1 9.5 12H6v2.414L11.586 20h2.828l-6-6H9.5a5.007 5.007 0 0 0 4.898-4H17V8h-2.602a4.933 4.933 0 0 0-.924-2H17z"
                                            fill="currentColor"></path>
                                    </svg></span>
                            </div>
                            <input class="form-control  s_rate" type="text" placeholder="Sale Rate" name="sale_rate"
                                value="<?php echo e($salerateval); ?>">
                            <div class="input-group-append"><span class="input-group-text">/gm</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 col-lg-2">
                        <label>Purchase Rate(Per Gram):</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text    bg-transparent"><svg
                                        xmlns="http://www.w3.org/2000/svg" class="text-primary"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                                        id="footer-icon-name" width="1em" height="1em"
                                        preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                        <path
                                            d="M17 6V4H6v2h3.5c1.302 0 2.401.838 2.815 2H6v2h6.315A2.994 2.994 0 0 1 9.5 12H6v2.414L11.586 20h2.828l-6-6H9.5a5.007 5.007 0 0 0 4.898-4H17V8h-2.602a4.933 4.933 0 0 0-.924-2H17z"
                                            fill="currentColor"></path>
                                    </svg></span>
                            </div>
                            <input class="form-control  p_rate" type="text" placeholder="Purchase Rate"
                                name="purchase_rate" id="p_id" value="<?php echo e($purchaserateval); ?>">
                            <div class="input-group-append"><span class="input-group-text">/gm</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 col-lg-2">
                        <label for="gold">Gold Weight:</label>
                        <div class="input-group mb-3">
                            
                            <input type="text" class="form-control g_w reset" name="gold"
                                placeholder="Enter Gold Weight" value="<?php echo e($weightval); ?>">
                            <div class="input-group-append"><span class="input-group-text">gm</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label for="validationCustom02">Amount:</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text bg-transparent"><svg
                                        xmlns="http://www.w3.org/2000/svg" class="text-primary"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                                        id="footer-icon-name" width="1em" height="1em"
                                        preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                        <path
                                            d="M17 6V4H6v2h3.5c1.302 0 2.401.838 2.815 2H6v2h6.315A2.994 2.994 0 0 1 9.5 12H6v2.414L11.586 20h2.828l-6-6H9.5a5.007 5.007 0 0 0 4.898-4H17V8h-2.602a4.933 4.933 0 0 0-.924-2H17z"
                                            fill="currentColor"></path>
                                    </svg></span>
                            </div>
                            <input type="text" class="form-control border-left-0 reset" name="t_amount"
                                placeholder="Enter Gold Weight" value="<?php echo e($amountval); ?>" id="amount_id">
                        </div>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label for="paid-amount">Paid Amount:</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text    bg-transparent"><svg
                                        xmlns="http://www.w3.org/2000/svg" class="text-primary"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                                        id="footer-icon-name" width="1em" height="1em"
                                        preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                        <path
                                            d="M17 6V4H6v2h3.5c1.302 0 2.401.838 2.815 2H6v2h6.315A2.994 2.994 0 0 1 9.5 12H6v2.414L11.586 20h2.828l-6-6H9.5a5.007 5.007 0 0 0 4.898-4H17V8h-2.602a4.933 4.933 0 0 0-.924-2H17z"
                                            fill="currentColor"></path>
                                    </svg></span>
                            </div>
                            <input type="text" class="form-control border-left-0 reset" name="paid_amount"
                                placeholder="Enter Paid Amount">
                        </div>
                    </div>
                    <div class="col-md-10 col-sm-10 col-lg-10">
                        <label>Remarks:</label>
                        <div class="input-group">
                            <div class="input-group-prepend"> <span class="input-group-text bg-transparent"><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    aria-hidden="true" role="img" width="1em" height="1em"
                                    preserveAspectRatio="xMidYMid meet" viewBox="0 0 36 36">
                                    <path
                                        d="M33 6.4l-3.7-3.7a1.71 1.71 0 0 0-2.36 0L23.65 6H6a2 2 0 0 0-2 2v22a2 2 0 0 0 2 2h22a2 2 0 0 0 2-2V11.76l3-3a1.67 1.67 0 0 0 0-2.36zM18.83 20.13l-4.19.93l1-4.15l9.55-9.57l3.23 3.23zM29.5 9.43L26.27 6.2l1.85-1.85l3.23 3.23z"
                                        class="clr-i-solid clr-i-solid-path-1 text-primary" fill="currentColor" />
                                </svg></span>
                            </div>
                            <input type="text" class="form-control border-left-0 reset" name="remark"
                                placeholder="Enter Remarks" id="amount_id">
                            
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-1 col-lg-1">
                        <div class="form-group ">
                            <label for="validationCustom02">&nbsp;</label>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="gst_bill_id" name="gst_bill">
                                <label class="custom-control-label" for="gst_bill_id">GST Bill?</label>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-1 col-sm-1 col-lg-1">
                        <div class="form-group pt-4">
                            <button type="submit" class="btn btn-primary btn-md float-right">Submit</button>
                        </div>
                    </div>
                </div>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
        
        <div class="card">
            <div class="card-body">
                <div class="card-title row">
                    <div class="col-md-10">
                        <h4 class="mb-0">Fund Credit & Debit</h4>
                    </div>
                    <div class="col-md-2">
                        <label  class="fs-18">
                            PRINT BILL
                            <input type="checkbox" name="print" class="w-28 h-18 print-fund-credit-debit" checked>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </label>
                    </div>
            </div>
                <hr />
                <?php echo e(Form::open(array('url' => 'insert-fund-credit-debit', 'id' => 'fundCreditDebitForm'))); ?>

                <div class="form-row">
                    <input type="hidden" class="from-control hiddenlager" name="hidden">
                    <div class="col-md-2 mb-2 form-group select2">
                        <label>Select Gold / Cash:</label><br>
                        <!-- <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="select_gold_cash" id="gold_id" class="custom-control-input" value="G" >
                                <label class="custom-control-label" for="gold_id">Gold</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="select_gold_cash" id="cash_id" class="custom-control-input" value="C">
                                <label class="custom-control-label" for="cash_id">Cash</label>
                            </div> -->
                        <div class="wraper">
                            <input type="radio" name="select_gold_cash" id="gold_id" value="G">
                            <input type="radio" name="select_gold_cash" id="cash_id" value="C">
                            <label for="gold_id" class="option gold-option">
                                <div class="gold dot"></div>
                                <span>Gold</span>
                            </label>
                            <label for="cash_id" class="option cash-option">
                                <div class="cash dot"></div>
                                <span>Cash</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3 gold-weight-fg">
                        <label for="validationCustom02">Gold Weight:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">	<span class="input-group-text">Weight</span>
                            </div>
                            <input type="text" class="form-control" name="gold_weight">
                            <div class="input-group-append"> <span class="input-group-text">gm</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3 amount-fund">
                        <label for="validationCustom02">Amount:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend"> <span class="input-group-text bg-transparent"><svg
                                        xmlns="http://www.w3.org/2000/svg" class="text-primary"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img"
                                        id="footer-icon-name" width="1em" height="1em"
                                        preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                        <path
                                            d="M17 6V4H6v2h3.5c1.302 0 2.401.838 2.815 2H6v2h6.315A2.994 2.994 0 0 1 9.5 12H6v2.414L11.586 20h2.828l-6-6H9.5a5.007 5.007 0 0 0 4.898-4H17V8h-2.602a4.933 4.933 0 0 0-.924-2H17z"
                                            fill="currentColor"></path>
                                    </svg></span>
                            </div>
                            <input type="text" class="form-control border-left-0" name="amount"
                                placeholder="Enter Amount">
                        </div>
                    </div>
                    <div class="col-md-2 mb-2">
                        <label for="validationCustom03">Choose Transection Type:</label><br>
                        <!-- <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="transaction_type" id="transaction_type1" class="custom-control-input" value="C">
                                <label class="custom-control-label" for="transaction_type1">Credit</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="transaction_type" id="transaction_type2" class="custom-control-input" value="D">
                                <label class="custom-control-label" for="transaction_type2">Debit</label>
                            </div> -->
                        <div class="wraper">
                            <input type="radio" name="transaction_type" id="transaction_type1" value="C">
                            <input type="radio" name="transaction_type" id="transaction_type2" value="D">
                            <label for="transaction_type1" class="option credit-option">
                                <div class="sales dot"></div>
                                <span>Credit</span>
                            </label>
                            <label for="transaction_type2" class="option debit-option">
                                <div class="purchase dot"></div>
                                <span>Debit</span>
                            </label>
                        </div>
                    </div>

                    <!-- <div class="form-group col-md-1">
                            <label for="validationCustom02">&nbsp;</label>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="sms_enabled" id="customCheck4">
                                <label class="custom-control-label" for="customCheck4">SMS Enabled ?</label>
                            </div>
                        </div> -->

                    <div class="col-md-4 mb-4">
                        <label for="validationCustom02">Remarks:</label>
                        <div class="input-group">
                            <div class="input-group-prepend"> <span class="input-group-text bg-transparent"><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        aria-hidden="true" role="img" width="1em" height="1em"
                                        preserveAspectRatio="xMidYMid meet" viewBox="0 0 36 36">
                                        <path
                                            d="M33 6.4l-3.7-3.7a1.71 1.71 0 0 0-2.36 0L23.65 6H6a2 2 0 0 0-2 2v22a2 2 0 0 0 2 2h22a2 2 0 0 0 2-2V11.76l3-3a1.67 1.67 0 0 0 0-2.36zM18.83 20.13l-4.19.93l1-4.15l9.55-9.57l3.23 3.23zM29.5 9.43L26.27 6.2l1.85-1.85l3.23 3.23z"
                                            class="clr-i-solid clr-i-solid-path-1 text-primary" fill="currentColor" />
                                    </svg></span>
                            </div>
                            <input type="text" name="remarks" class="form-control border-left-0"
                                placeholder="Your Remarks...">
                        </div>
                    </div>
                    <div class="form-group col-md-1 text-right">
                        <label for="validationCustom02">&nbsp;</label>
                        <div class="custom-control custom-checkbox">
                            <button class="btn btn-primary finish-btn" type="submit"></svg>Submit</button>
                        </div>
                    </div>
                </div>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
        
        <div class='card'>
            <div class="col-md-12 card-body render-info-box">
			</div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('common.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\resources\views/transection/transection.blade.php ENDPATH**/ ?>