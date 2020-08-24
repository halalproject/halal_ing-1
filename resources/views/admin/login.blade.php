@extends('components.header')

@section('content')
<body style="background-image:url(images/bg-header.jpg);background-repeat:no-repeat;width:100%;height:100%;">
		<!-- start: page -->
			<div class="row" align="center">
				<h2 style="font-size: 40px;font-weight: bold;color:#000000">SISTEM My Halal Ingredient</h2>
			</div>
		<section class="body-sign" style="margin-top:-80px">
			<div class="row center-sign">

				<div class="panel panel-sign" style="margin-top: -60px">
					<!--<div class="panel-title-sign mt-xl text-left">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Log Masuk Sistem</h2>
					</div>-->
                    <!--<div class="panel-title-sign mt-xl text-right">
						<img src="images/logologin_parlimen.png">
					</div>-->
					<div class="panel-body">
						<form >
                        @csrf
							<div class="form-group mb-lg">
                            <h3 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> Log Masuk Sistem</h3>
                            </div>
							<div class="form-group mb-lg">
								<label>ID Pengguna : </label>
								<div class="input-group input-group-icon">
									<input name="userid" id="userid" type="text" class="form-control input-lg" placeholder="ID Pengguna" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="form-group mb-lg">
								<div class="clearfix">
									<label class="pull-left">Kata Laluan : </label>
									
								</div>
								<div class="input-group input-group-icon">
									<input name="password" id="password" type="password" class="form-control input-lg" placeholder="Kata Laluan Pengguna" />
									<span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-4 text-left">
									<button type="button" class="btn btn-primary hidden-xs" onClick="do_login()">Log Masuk</button>
									<button type="button" class="btn btn-primary btn-block btn-lg visible-xs mt-lg" onClick="do_login()">Log-Masuk</button>
								</div>
								<div class="col-sm-8 text-right"><a href="index.php?data=<?php print base64_encode('lupa_katalaluan;;;;;');?>" class="pull-right">Lupa Kata Laluan?</a>
									<!--<div class="checkbox-custom checkbox-default">
										<input id="RememberMe" name="rememberme" type="checkbox"/>
										<label for="RememberMe">Remember Me</label>
									</div>-->
								</div>
							</div>

							<span class="mt-lg mb-lg line-thru text-center text-uppercase">
							</span>
                        
							<p class="text-center">Hanya boleh diakses oleh pengguna yang berdaftar sahaja.

						</form>
                    </div>
				</div>

			</div>
		</section>
		<!-- end: page -->

        
        <script language="javascript">
        function do_login(){
            var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
            var userid = $('#userid').val();
            var password = $('#password').val();
            //alert("dd");
            if(userid.trim() == '' ){
                alert('Sila masukkan ID Pengguna anda.');
                $('#userid').focus(); return false;
            } else if(password.trim() == '' ){
                alert('Sila masukkan katalaluan anda.');
                $('#password').focus(); return false;
            } else {
                $.ajax({
                    url:'/auth', //&datas='+datas,
                    type:'POST',
                    //dataType: 'json',
                    beforeSend: function () {
                        //$('.btn-primary').attr("disabled","disabled");
                        $('.dispmodal').css('opacity', '.5');
                    },
                    data: $("form").serialize(),
                    //data: datas,
                    success: function(data){
                        console.log(data);
                        // alert(data);
                        if(data == 'OK'){
                            swal({
                              title: 'Berjaya',
                              text: 'Log Masuk Anda Berjaya',
                              type: 'success',
                              confirmButtonClass: "btn-success",
                              confirmButtonText: "Ok",
                              showConfirmButton: true,
                            }).then(function () {
                              window.location.href = "/dashboard";
                            });
                        } else if(data=='XADA'){
                            swal({
                              title: 'Amaran',
                              text: 'ID Pengguna atau Katalaluan anda salah. Sila cuba lagi.',
                              type: 'error',
                              confirmButtonClass: "btn-danger",
                              confirmButtonText: "Ok",
                              showConfirmButton: true,
                            });
                        } else if(data=='XSTAT'){
                            swal({
                              title: 'Amaran',
                              text: 'Sila pilih kategori pengguna sistem.',
                              type: 'error',
                              confirmButtonClass: "btn-danger",
                              confirmButtonText: "Ok",
                              showConfirmButton: true,
                            });
                        }
                    }
                });
            }
        }
        </script>
        <!-- jQuery 3 -->
@endsection