<script>
function do_simpan()
{
    var reg = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
    var pass1 = $('#new_pass').val();
    var pass2 = $('#re_new_pass').val();
    var formdata = $("form").serialize();

    if(pass1.trim() == '' || pass2.trim() == ''){
        swal({
            title: 'Amaran',
            text: 'Sila lengkapkan maklumat.',
            type: 'warning',
            confirmButtonClass: "btn-warning",
            confirmButtonText: "Ok",
            showConfirmButton: true,
        });
    } else if(!reg.test(pass1)){
        swal({
            title: 'Maklumat',
            text: 'Katalaluan tidak kukuh. Sila masukkan katalaluan yang kukuh.',
            type: 'info',
            confirmButtonClass: "btn-warning",
            confirmButtonText: "Ok",
            showConfirmButton: true,
        });
    } else if(pass2.trim() != pass1.trim()){
        swal({
            title: 'Amaran',
            text: 'Sila masukkan katalaluan yang sama.',
            type: 'warning',
            confirmButtonClass: "btn-warning",
            confirmButtonText: "Ok",
            showConfirmButton: true,
        });
    } else {
        $.ajax({
			url:'/admin/reset', //&datas='+datas,
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
            <h6 class="panel-title"><font color="#000000" size="3"><b>Tukar Kata Laluan</b></font></h6>
        </header>
        <div class="panel-body ">
            <div class="col-md-12">
                @csrf
                <input type="hidden" name="id" id="id" class="form-control" value="{{ $user->id }}">
                
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-4 control-label"><b>Nama :</b></label>
                        <div class="col-sm-8">
                            {{ $user->username }}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-4 control-label"><b>Jawatan :</b></label>
                        <div class="col-sm-8">
                            {{ $user->jawatan->nama }}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-4 control-label"><b><font color="#FF0000">*</font> Katalaluan Baru :</b></label>
                        <div class="col-sm-6">
                            <input type="password" name="new_pass" id="new_pass" class="form-control" value="">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-4 control-label"><b><font color="#FF0000">*</font> Masukkan Semula Katalaluan Baru :</b></label>
                        <div class="col-sm-6">
                            <input type="password" name="re_new_pass" id="re_new_pass" class="form-control" value="">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div align="right">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-spinner"></i> Kembali</button>
                        <button type="button" class="mt-sm mb-sm btn btn-success" onclick="do_simpan()" id="simpan"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>