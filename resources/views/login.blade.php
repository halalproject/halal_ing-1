@extends('components.header')

@section('content')
<body style="background-image:url({{ asset('images/login-bg2.jpg') }});background-repeat:no-repeat;background-size:cover;color:white;">
		<!-- start: page -->
			<div class="row" align="center">
				<h2 style="font-size: 40px;font-weight: bold;color:#ffffff; padding:30px;">SISTEM My Halal Ingredient</h2>
			</div>
            <br>
		<section class="body-sign" style="margin-top:-80px">
			<div class="row center-sign">

				<div class="panel panel-sign" style="margin-top: -60px">
					<div class="panel-body" style="background:rgba(0, 0, 0, 0.45);">
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

							<div class="row" align="right">
								<div class="col-sm-12 text-right">
                                    <button type="button" class="btn btn-primary hidden-xs" onClick="do_login()" >Log Masuk</button>
                                    <button type="button" class="btn btn-primary btn-block btn-lg visible-xs mt-lg" onclick="do_login()">Log Masuk</button>
								</div>
							</div>

                            <div class="row" align="center">
                                <!-- <div class="col-sm-12 text-right"><a href="" >Lupa Kata Laluan ?</a>
								</div> -->

                                <span class="col-sm-12 text-right text-primary" style="cursor: pointer" data-toggle="modal" data-target="#modalLupaKataLaluan" >
                                    <div class="text-blue">Lupa Kata Laluan ?</div>
                                </span>
                            </div>

							<span class="mt-lg mb-lg line-thru text-center text-uppercase">
							</span>
                        
							<p class="text-center" style="text-color:#ffffff;">Hanya boleh diakses oleh pengguna yang berdaftar sahaja.

						</form>
                    </div>
				</div>

			</div>
		</section>
		<!-- end: page -->

        <div class="modal fade" id="modalLupaKataLaluan" role="dialog">
            <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background:-webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);padding:10px;">
                <h2 class="modal-title text-dark">Lupa Kata Laluan
                <button type="button" class="close" data-dismiss="modal">&times;</button></h2>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group" style="margin:0px;">
                            <div class="row">
                                <label class="col-sm-3 control-label text-dark"><font color="#FF0000">*</font> Emel :</label>
                                <div class="col-sm-9">
                                    <input type="email" name="emel" id="emel" class="form-control" value=""><br>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12" style="padding:0px;">
                                <small class="text-danger">* Note: Masukkan emel anda dan kami akan menghantar pautan untuk menetapkan semula kata laluan anda.</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"><i class="fa fa-spinner"></i> Kembali</button>
                <button type="button" class="mt-sm mb-sm btn btn-info" onclick="do_simpan()" id="simpan">
                    <i class="fa fa-save"></i> Hantar
                </button>
                </div>
            </div>
            
            </div>
        </div>  

        
        <script language="javascript">
        function do_login(){
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
                    data: $("form").serialize(),
                    //data: datas,
                    success: function(data){
                        console.log(data);
                        // alert(data);
                        if(data[0] == 'OK'){
                            swal({
                              title: 'Berjaya',
                              text: 'Log Masuk Anda Berjaya',
                              type: 'success',
                              confirmButtonClass: "btn-success",
                              confirmButtonText: "Ok",
                              showConfirmButton: true,
                            }).then(function(){
                                if(data[1] == 'client'){
                                    window.location = '/client';
                                } else if(data[1] == 'admin'){
                                    window.location = '/admin';
                                }
                            });
                        } else {
                            swal({
                              title: 'Amaran',
                              text: 'ID Pengguna atau Katalaluan anda salah. Sila cuba lagi.',
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