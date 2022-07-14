<style>
	.fs{
		font-size: 40px;
	}
</style>
<header class="top-header">
    <nav class="navbar navbar-expand">
        <div class="sidebar-header">
            <div class="d-none d-lg-flex">
                <img src="public/assets/images/logo-icon.png" class="logo-icon" alt="" />
            </div>
            <a href="javascript:;" class="toggle-btn ml-lg-auto"> <i class="bx bx-menu"></i>
            </a>
        </div>
        <div class="right-topbar ml-auto">
            <ul class="navbar-nav">
                <li class="nav-item dropdown dropdown-user-profile">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-toggle="dropdown">
                        <div class="media user-box align-items-center">
                            <div class="media-body user-info">
                                <p class="user-name mb-0 text-white">{{ Session::get('username')}}</p>
                                <p class="designattion mb-0 text-white">Narayani Gold</p>
                            </div>
							<i class="fadeIn animated bx bx-user-circle fs"></i>
                            <!--<img src="https://via.placeholder.com/110x110" class="user-img" alt="user avatar">-->
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">	
						<a class="dropdown-item" href="{{url('db-export')}}">
							<i class="fadeIn animated bx bx-hdd"></i><span>Backup Database</span>
						</a>
						<div class="dropdown-divider mb-0"></div>
                        <a class="dropdown-item changepsw" href="javascript:;" onclick="chPswFunction()">
							<i class="fadeIn animated bx bx-key"></i><span>Change Password</span>
						</a>
                        <div class="dropdown-divider mb-0"></div>	
						<a class="dropdown-item" href="{{url('logout')}}">
							<i class="bx bx-power-off"></i><span>Logout</span>
						</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
{{--------------------Change Password Modal--------------------}}
<div class="modal fade" id="chPswModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ Form::open(array('url' => 'change-password', 'id' => 'chPswForm')) }}
            <div class="modal-body">
                <div class="col-md-12 mb-12 form-group">
                    <label for="validationCustom02">Old Password</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="old_psw">
                    </div>
                </div>
                <div class="col-md-12 mb-12 form-group">
                    <label for="validationCustom02">New Password</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="new_psw" id="new_psw">
                    </div>
                </div>
                <div class="col-md-12 mb-12 form-group">
                    <label for="validationCustom02">Confirm New Password</label>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="con_new_psw">
                    </div>
                </div>		
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
{!! Html::script('public/assets/js/jquery.min.js') !!}
{!! Html::script('public/assets/js/validate.js') !!}
<script>

    function chPswFunction(){
        $('#chPswModal').modal('show');
    }
    $('#chPswForm').validate({
        rules: {
            old_psw: {
                required: true,
            },
            new_psw: {
                required: true,
            },
            con_new_psw:{
                required: true, 
                equalTo: "#new_psw"
            }
        },
        errorPlacement: function(label, element) {
            //$('.input-icon i').css("color", "red");
            //$('.input-icon input').css("border-bottom", "1px solid red");
        },
        highlight: function(element, errorClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
        submitHandler: function(form) {
            var data = $('#chPswForm').serialize();
            var action = $('#chPswForm').attr('action');
            $.ajax({
                url: action,
                type: "POST",
                data: data,
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                beforeSend: function() {
                    $(".finish-btn").prop("disabled", true);
                    $('.finish-btn').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Finishing...');
                    CommonJS.showLoader('reg-frm-loder');
                },
                complete: function() {
                    $(".finish-btn").prop("disabled", false);
                    $('.finish-btn').html('<svg class="mr-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 32 32"><path d="M29.548 3.043a2.5 2.5 0 0 0-3.513.4L16 16.067l-3.508-4.414a2.5 2.5 0 0 0-3.915 3.112l5.465 6.875c.474.597 1.195.943 1.957.943s1.482-.35 1.957-.944L29.95 6.555c.86-1.08.68-2.654-.402-3.513zM24.5 24.5h-17v-17h12.756l2.385-3H6c-.83 0-1.5.67-1.5 1.5v20c0 .828.67 1.5 1.5 1.5h20a1.5 1.5 0 0 0 1.5-1.5V12.85l-3 3.774V24.5z" fill="currentColor"/></svg>Finish');
                    CommonJS.hideLoader('reg-frm-loder');
                },
                success: function(res) {
                    if(res.key == 'S'){
                        $('#chPswModal').modal('hide');
                        CommonJS.Toaster({
                            'type': 'success',
                            'msg': res.msg,
                        });
                    }else if(res.key == 'E'){
                        CommonJS.Toaster({
                            'type': 'error',
                            'msg': res.msg,
                        });
                    }
                },
                error: function(error) {
                    CommonJS.Toaster({
                        'type': 'error',
                        'msg': error.responseText,
                    });
                }
            });
        }
    });
</script>
