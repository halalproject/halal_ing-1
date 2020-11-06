<script>
function do_close() {
    location.reload();
}

function do_simpan()
{    
    var reason = $('#catatan_text').val();

    if(reason == '' ){
        swal({
            title: 'Amaran',
            text: 'Maklumat tidak lengkap.\nSila masukkan catatan penghapusan ramuan.',
            type: 'warning',
            confirmButtonClass: "btn-warning",
            confirmButtonText: "Ok",
            showConfirmButton: true,
        });
    } else {
        $.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
        $.ajax({
            url:'/client/ramuan/reason', //&datas='+datas,
            type:'POST',
            //dataType: 'json',
            beforeSend: function () {
                $('#simpan').attr("disabled","disabled");
                $('.dispmodal').css('opacity', '.5');
            },
            data: $('#create').serialize(),
            //data: datas,
            success: function(data){
                console.log(data);
                //alert(data);
                if(data=='OK'){
                    swal({
                    title: 'Berjaya',
                    text: 'Maklumat telah berjaya dipadam',
                    type: 'success',
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "Ok",
                    showConfirmButton: true,
                    }).then(function () {
                        reload = window.location; 
                        window.location = reload;
                    });
                } else {
                    swal({
                    title: 'Amaran',
                    text: 'Terdapat ralat sistem.\nMaklumat anda tidak berjaya dipadam.',
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
<div class="col-md-12" >
    <form name="create" id="create" method="post" action="" enctype="multipart/form-data" autocomplete="off">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <section class="panel panel-featured panel-featured-info">
            <header class="panel-heading" style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
                <h2 class="panel-title"><font color="#000000" size="3"><b>Sebab Padam</b></font></h2>
            </header>
            <div class="panel-body ">
                <div class="col-md-12">
                    <input type="hidden" name="id" id="id" class="form-control" value="{{ $rs->id }}">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label" for="reason"><font color="#FF0000">*</font>Catatan Penghapusan Ramuan</label>
                            <div class="col-sm-9">
                                <input class="form-control" name="catatan_text" id="catatan_text" value="{{ $rs->delete_comment ?? '' }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div align="right">
                            <button type="button" class="btn btn-default" onclick="do_close()"><i class="fa fa-arrow-left"></i> Kembali</button>
                            <button type="button" class="mt-sm mb-sm btn btn-success" onclick="do_simpan()" id="simpan">
                                <i class="fa fa-save"></i> Hapus</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</div>