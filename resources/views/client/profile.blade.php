<script>
function do_close()
{
    location.reload();
}

function do_simpan()
{
    var contact_name = $('#contact_name').val();
    var contact_ic = $('#contact_ic').val();
    var contact_position = $('#contact_position').val();
    var contact_tel = $('#contact_tel').val();
    var contact_email = $('#contact_email').val();
    var formdata = $("form").serialize();

    if(contact_name.trim() == '' || contact_ic.trim() == '' || contact_position.trim() == '' || contact_tel.trim() == '' || contact_email.trim() == ''){
        swal({
            title: 'Amaran',
            text: 'Sila lengkapkan maklumat.',
            type: 'warning',
            confirmButtonClass: "btn-warning",
            confirmButtonText: "Ok",
            showConfirmButton: true,
        });
    } else {
        $.ajax({
			url:'/client/store', //&datas='+datas,
			type:'POST',
			data: formdata,
			//data: datas,
			success: function(data){
				console.log(data);
				//alert(data);
				if(data=='OK'){
					swal({
					  title: 'Berjaya',
					  text: 'Maklumat telah berjaya dikemaskini',
					  type: 'success',
					  confirmButtonClass: "btn-success",
					  confirmButtonText: "Ok",
					  showConfirmButton: true,
					}).then(function () {
                        location.reload();
					});
				} else if(data=='ERR'){
					swal({
					  title: 'Amaran',
					  text: 'Terdapat ralat sistem.\nMaklumat anda tidak berjaya disimpan.',
					  type: 'error',
					  confirmButtonClass: "btn-warning",
					  confirmButtonText: "Ok",
					  showConfirmButton: true,
					});
				}
			}
		});
    }
}
</script>

<div class="col-md-12">
    <section class="panel panel-featured panel-featured-info">
        <header class="panel-heading" style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
            <h6 class="panel-title"><font color="#000000" size="3"><b>Profil Syarikat</b></font></h6>
        </header>
        <div class="panel-body ">
            <div class="col-md-12">
                @csrf
                <input type="hidden" name="id" id="id" class="form-control" value="{{ $user->userid }}">
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 control-label"><b>Nama Syarikat :</b></label>
                        <div class="col-sm-5">{{ $user->company_name }}</div>
                        <label class="col-sm-2 control-label"><b>No Pendaftaran Syarikat :</b></label>
                        <div class="col-sm-2">{{ $user->company_reg_code }}</div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 control-label"><b>Tarikh Pendaftaran Syarikat :</b></label>
                        <div class="col-sm-10">{{ date('d/m/Y',strtotime($user->company_reg_dt)) }}</div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 control-label"><b>Jenis Syarikat :</b></label>
                        <div class="col-sm-5">{{ $user->company_type }}</div>
                        <label class="col-sm-2 control-label"><b>Kategori Syarikat :</b></label>
                        <div class="col-sm-2">{{ $user->company_category }}</div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 control-label"><b>Alamat Syarikat :</b></label>
                        <div class="col-sm-10">{{ $user->company_address_1 }}, {{ $user->company_address_2 }}, {{ $user->company_address_3 }}, {{ $user->company_poscode }}</div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 control-label"><b>Waktu Pejabat :</b></label>
                        <div class="col-sm-8">{{ $user->company_open }} - {{ $user->company_close }}</div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 control-label"><b>Web :</b></label>
                        <div class="col-sm-5">
                            <input type="text" name="company_web" id="company_web" class="form-control" placeholder="www.example.com" value="{{ $user->company_web }}">
                        </div>
                        <label class="col-sm-2 control-label"><b>No. Fax :</b></label>
                        <div class="col-sm-2">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input type="text" name="company_fax" id="company_fax" data-plugin-masked-input placeholder="0312231234" class="form-control" value="{{ $user->company_fax }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 control-label"><b>Email :</b></label>
                        <div class="col-sm-5">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="text" name="company_email" id="company_email" data-plugin-masked-input placeholder="abc@gmail.com" class="form-control" value="{{ $user->company_email }}">
                            </div>
                        </div>
                        <label class="col-sm-2 control-label"><b>No. Telefon :</b></label>
                        <div class="col-sm-2">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                                <input type="text" name="company_tel" id="company_tel" data-plugin-masked-input placeholder="0312231234" class="form-control" value="{{ $user->company_tel }}">
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
                
                <div class="form-group">
                    <div class="row">
                        <h6 class="panel-title"><font color="#000000" size="3"><b>Pegawai Yang Dilantik</b></font></h6>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 control-label"><b><font color="#FF0000">*</font> Nama pegawai :</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="contact_name" id="contact_name" class="form-control" placeholder="Nama Pegawai" value="{{ $user->contact_name }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 control-label"><b><font color="#FF0000">*</font> No K/P :</b></label>
                        <div class="col-sm-3">
                            <input type="text" name="contact_ic" id="contact_ic" class="form-control" placeholder="No. Kad Pengenalan" 
                                value="{{ $user->contact_ic }}"  maxlength="12"
                                onkeydown="return (event.ctrlKey || event.altKey 
                                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                                    || (95<event.keyCode && event.keyCode<106)
                                    || (event.keyCode==8) || (event.keyCode==9) 
                                    || (event.keyCode>34 && event.keyCode<40) 
                                    || (event.keyCode==46) )">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 control-label"><b><font color="#FF0000">*</font> Jawatan :</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="contact_position" id="contact_position" class="form-control" placeholder="Jawatan" value="{{ $user->contact_position }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 control-label"><b><font color="#FF0000">*</font> No. Telefon :</b></label>
                        <div class="col-sm-2">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                                <input type="text" name="contact_tel" id="contact_tel" data-plugin-masked-input placeholder="0312231234" class="form-control" value="{{ $user->contact_tel }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 control-label"><b><font color="#FF0000">*</font> Email Pegawai :</b></label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="text" name="contact_email" id="contact_email" data-plugin-masked-input placeholder="abc@gmail.com" class="form-control" value="{{ $user->contact_email }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div align="right">
                        <button type="button" class="btn btn-default" onclick="do_close()"><i class="fa fa-spinner"></i> Kembali</button>
                        <button type="button" class="mt-sm mb-sm btn btn-success" onclick="do_simpan()" id="simpan"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>