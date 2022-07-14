<div class="navbar">
	<div class="navbar-inner">
		<div class="container">
			<a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" >
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<div class="nav-collapse">
				<ul class="nav">
				  <li class="active"><a href="./view.php">Home	</a></li>
				  <li class="list_view"><a href="javascript:;">List View</a></li>
				  <li class="grid_view"><a href="javascript:;">Grid View</a></li>
				  <li class="three_column"><a href="javascript:;">Three Column</a></li>
				  <li class="four_column"><a href="javascript:;">Four Column</a></li>
				  <li class=""><a href="">General Content</a></li>
				</ul>
				<form action="#" class="navbar-search pull-left">
				  <input type="text" placeholder="Search" class="search-query span2">
				</form>
					
				<ul class="nav pull-right">
					<li class="dropdown">
					
						<a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="icon-lock"></span> Login <b class="caret"></b></a>
						
						<div class="dropdown-menu">
							<form class="form-horizontal loginFrm" autocomplete="off" method="POST" id="sign_in">
							  <div class="control-group">
								<input type="text" class="span2" id="inputEmail" placeholder="Email" name="email">
							  </div>
							  <div class="control-group">
								<input type="password" class="span2" id="inputPassword" placeholder="Password" name ="password">
							  </div>
							  <div class="control-group">
								<label class="checkbox">
								<input type="checkbox"> Remember me
								</label>
								
								<button type="button" class="shopBtn btn-block signin_button">Sign in</button>
									
							  </div>
							</form>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<script type = "text/javascript" src = "//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha256-3blsJd4Hli/7wCQ+bmgXfOdK7p/ZUMtPXY08jmxSSgk=" crossorigin="anonymous"></script>
