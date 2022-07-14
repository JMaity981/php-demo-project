@extends('common.layout')
@section('title', 'Opening Balance')
@section('style')
    {!! Html::style('public/assets/plugins/notifications/css/lobibox.min.css') !!}
@endsection
@section('script')
    {!! Html::script('public/assets/plugins/notifications/js/lobibox.min.js') !!}
    {!! Html::script('public/assets/plugins/notifications/js/notifications.min.js') !!}
    {!! Html::script('public/assets/js/sweetalert.js') !!}
    {!! Html::script('public/assets/pages-js/OpeningBalance.js') !!}
    <script>
        OpeningBalanceJs.OpeningBalance();
        CommonJS.NumberValidation();
    </script>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">Opening Balance</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 col-lg-4 col-sm-12">
                    <div class="card border-lg-top-primary">
                        <div class="card-body frm-loader">
                            <div class="card-title d-flex align-items-center">
                                <h4 class="mb-0 text-primary">Add Cash and Gold stock</h4>
                            </div>
                            <hr />
                            {{ Form::open(['url' => 'add-opening-balance', 'id' => 'addstock']) }}
                            <div class="form-body">
                                <input type="hidden" name="h_name" id="h_id">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Parchan (alloy):</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-transparent">
                                                    <i class="fadeIn animated bx bx-coin"></i>
                                                </span>
                                            </div>
                                            <input type="text"
                                                class="form-control border-left-0 parchan-alloy number-validate"
                                                name="parchanalloy" id="parchanalloy"
                                                placeholder="Enter your Parchan (alloy)">
                                            <div class="input-group-append">
                                                <span class="input-group-text">gm</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Gold in alloy:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-transparent">
                                                    <i class="fadeIn animated bx bx-coin"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control border-left-0 gold-alloy number-validate"
                                                name="goldalloy" placeholder="Enter your gold in alloy">
                                            <div class="input-group-append">
                                                <span class="input-group-text">gm</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Fine Gold Stock:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-transparent">
                                                    <i class="fadeIn animated bx bx-coin"></i>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control border-left-0 fine-gold number-validate"
                                                name="finegold" placeholder="Enter Fine Gold Stock">
                                            <div class="input-group-append">
                                                <span class="input-group-text">gm</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>Cash Stock</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-transparent">
                                                    <i class="fadeIn animated bx bx-money"></i>
                                                </span>
                                            </div>
                                            <input type="text"
                                                class="form-control border-left-0 cash-amaount number-validate"
                                                name="cashamaount" placeholder="Enter your Cash Stock">
                                            <div class="input-group-append">
                                                <span class="input-group-text">.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-danger float-right balance-save-btn" id="save_btn">
                                    Save
                                </button>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-lg-8 col-sm-12">
                    <div class="card border-lg-top-primary">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-center">
                                <div class="col-md-10">
                                    <h4 class="mb-0 text-primary">Opening balance list</h4>
                                </div>
                                <div class="col-md-2">
                                    <button type="btn" class="btn-primary btn-sm edit float-right">
										<i class="fadeIn animated bx bx-pencil"></i>
									</button>
                                </div>
                            </div>
                            <hr />
                            <div class="form-body">
                                <div class="row render-opening-balance-list">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalQuickView" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm modal-notify" role="document">
            <div class="modal-content text-center">
				{{ Form::open(['id' => 'edit_modal']) }}
                <div class="modal-header d-flex justify-content-center">
                    <h4>Enter your password</h4>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <input type="password" class="form-control" name="password" id="p_id" placeholder="Enter your password">
                    </div>
                </div>
                <div class="modal-footer flex-center">
                    <button type="submit" class="btn btn-primary" id="modal_submit">Submit</button>
                    <button type="button" class="btn btn-dark" data-dismiss="modal" id="c_id">Cancel</button>
                </div>
				{{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
