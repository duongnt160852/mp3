<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body modal-spa">
							<div class="sign-grids">
								<div class="sign">
									<div class="sign-left">
										<ul>
											<li><a class="fb" href="#"><i></i>Sign in with Facebook</a></li>
											<li><a class="goog" href="#"><i></i>Sign in with Google</a></li>
											<li><a class="linkin" href="#"><i></i>Sign in with Linkedin</a></li>
										</ul>
									</div>
									<div class="sign-right">
										<form action="signup" method="post" autocomplete="off">
											<input type="hidden" name="_token" value="{{csrf_token()}}">
											<h3>Tạo tài khoản </h3>
											<input type="text" placeholder="Họ và tên" name="name1" id="name1" required="">
											<div id="errname" style="color:red;text-align: center;display:none">
												
											</div>
											<input type="text" placeholder="Tên đăng nhập" name="username1" id="username1" required="">
											<div id="errusername" style="color:red;text-align: center;display:none">
												
											</div>
											<input type="email" placeholder="Email" name="email1" id="email1" required="">
											<div id="errmail" style="color:red;text-align: center;display:none">
												
											</div>
											<input type="password" placeholder="Mật khẩu" name="password1" id="password1" required="">	
											<div id="errpassword" style="color:red;text-align: center;display:none">
												
											</div>
											<input type="password" placeholder="Xác nhận mật khẩu" name="password_confirmation1" id="password_confirmation1" required="">	
											<div id="errpassword_confirmation" style="color:red;text-align: center;display:none">
												
											</div>
											<input type="button" value="Tạo tài khoản" id="signup">
										</form>
									</div>
									<div class="clearfix"></div>								
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<script>
				$("#signup").click(function(e){
					$.ajaxSetup({
				        headers: {
				            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				        }
					});
					$.ajax({
							'url' : 'signup',
							'data': {
								"name":$("#name1").val(),"username":$("#username1").val(),"email":$("#email1").val(),"password_confirmation":$("#password_confirmation1").val(), "password":$("#password1").val()
							},
							'type' : 'POST',
							success: function (data) {
								if (data.error == true) {
									if (data.message.name != undefined) {
										$('#errname').css("display","block");
										$('#errname').text(data.message.name[0]);
									}
									else{
										$('#errname').css("display","none");
									}
									if (data.message.username != undefined) {
										$('#errusername').css("display","block");
										$('#errusername').text(data.message.username[0]);
									}
									else{
										$('#errusername').css("display","none");
									}
									if (data.message.email != undefined) {
										$('#errmail').css("display","block");
										$('#errmail').text(data.message.email[0]);
									}
									else{
										$('#errmail').css("display","none");
									}
									if (data.message.password != undefined) {
										$('#errpassword').css("display","block");
										$('#errpassword').text(data.message.password[0]);
									}
									else{
										$('#errpassword').css("display","none");
									}
									if (data.message.password_confirmation != undefined) {
										$('#errpassword_confirmation').css("display","block");
										$('#errpassword_confirmation').text(data.message.password_confirmation[0]);
									}
									else{
										$('#errpassword_confirmation').css("display","none");
									}
								} else {
									$("#myModal5").css("display","none");
									$(".modal-backdrop").css("display","none");
									$("#name1").val("");
									$("#username1").val("");
									$("#email1").val("");
									$("#password1").val("");
									$("#password_confirmation1").val("");
									$('#errname').val("");
									$('#errusername').val("");
									$('#errmail').val("");
									$('#errpassword').val("");
									$('#errpassword_confirmation').val("");
									alert('Tạo tài khoản thành công, hãy đăng nhập để sử dụng đầy đủ chức năng');
								}
							}
						});
				});
			</script>