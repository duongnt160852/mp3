<div class="header-section ">
			<div class="menu-right">
				<div class="row" style="height:64px">
					<div class="col-md-2 col-sm-2 col-xs-2">												
						<a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6">
						<div id="sb-search" class="sb-search">
							<form action="search" method="post" autocomplete="off" id="form1">
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								<input class="sb-search-input" placeholder="Search" type="search" name="search" id="search" onkeyup="showResult()">
								<input class="sb-search-submit" type="submit" value="">
								<span class="sb-icon-search"></span>
							</form>
						</div>
						<div style="max-height:700px;overflow-y:auto;position:absolute;right:92px;top:66px;z-index: 999;border: 1px solid black;width: 74.7%;border-top:none;display:none;background-color: #fff" id="result" class="result2">
							
						</div>
					</div>
					
					@if($user==null)
					<div class="col-md-2 col-sm-2 col-xs-2 login-pop">
						<div id="loginpop"> <a href="#" id="loginButton"><span style="font-size: 0.7em!important">Đăng nhập <i class="arrow glyphicon glyphicon-chevron-right"></i></span></a><a class="top-sign" href="#" data-toggle="modal" data-target="#myModal5"><i class="fa fa-sign-in"></i></a>
									<div id="loginBox">  
							<form method="post" action="user/login" autocomplete="off" id="loginForm">
								<input type="hidden" name="_token" value="{{csrf_token()}}">
												<fieldset id="body">
													<fieldset style="display:none" id="none">
														<label style="background-color: red;color:white;padding:2px">Đăng nhập thất bại</label>
													</fieldset>
													<fieldset>
														  <label for="email">Tên đăng nhập</label>
														  <input type="text" name="username" id="username">
													</fieldset>
													<fieldset>
															<label for="password">Mật khẩu</label>
															<input type="password" name="password" id="password">
													 </fieldset>
													 
													<input type="button" id="login" value="Đăng nhập">
													<label for="checkbox"><input type="checkbox" id="checkbox"><i>Nhớ mật khẩu?</i></label>

												</fieldset>

											<span><a href="#">Quên mật khẩu?</a></span>

									 </form>
								</div>
						</div>

					
					</div>
					@endif
					<script>
						$('#login').click(function(e) {
							$.ajaxSetup({
							        headers: {
							            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							        }
							});
							$.ajax({
									'url' : 'ajax/login',
									'data': {
										"username":$("#username").val(), "password":$("#password").val(),"checkbox":$("#checkbox").val()
									},
									'type' : 'POST',
									success: function (data) {
										if (data.error == true) {
											$("#none").css("display","block");
										} else {
											location.reload();
										}
									}
								});
						});
					</script>
										<div class="clearfix"> </div>
							<!-- search-scripts -->
					<script src="js/classie.js"></script>
					<script src="js/uisearch.js"></script>
					<script>
						new UISearch( document.getElementById( 'sb-search' ) );
					</script>
					<script>
						function showResult(){
							var str=$("#search").val();
							if(str.length!=0){
								$("#result").css("display","block");
								$.get("ajax/search/"+str,function(data){
									$("#result").html(data);
								});
							}
							else{
								$("#result").css("display","none");
							}
						}

						$(".sb-icon-search").click(function(){
							var str=$("#search").val();
							if(str.length!=0){
								$("#form1").submit();
							}
						});
					</script>
				</div>
			</div>

			<div class="clearfix"></div>
		</div>