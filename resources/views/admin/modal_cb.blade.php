<script>
function do_close() {
    location.reload();
}

function do_simpan() {

    var event = $('#event').val();
    
    if(event.trim() == ''){
        swal({
            title: 'Amaran',
            text: 'Maklumat tidak lengkap.\nSila masukkan tajuk pemberitahuan.',
            type: 'warning',
            confirmButtonClass: "btn-warning",
            confirmButtonText: "Ok",
            showConfirmButton: true,
        });
    } else { 
        var formdata = new FormData($('#create')[0]);
        // alert(formdata);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:'/admin/pengumuman/store',
            type:'POST',
            beforeSend: function () {
                $('#simpan').attr("disabled","disabled");
                $('.dispmodal').css('opacity', '.5');
            },
            data: formdata,
            contentType: false,
            processData: false,
            //data: datas,
            success: function(data){
                // console.log(data);
                if(data =='OK'){ 
                    swal({
                        title: 'Berjaya',
                        text: 'Maklumat telah berjaya disimpan',
                        type: 'success',
                        confirmButtonClass: "btn-success",
                        confirmButtonText: "Ok",
                        showConfirmButton: true,
                    }).then(function () {
                        reload = window.location; 
                        window.location = reload;
                    });
                } else if(data =='ERR'){
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
@php
@endphp
<div class="col-md-12">
    <form name="create" id="create" method="post" action="" enctype="multipart/form-data" autocomplete="off">
        @csrf
        <section class="panel panel-featured panel-featured-info">
            <header class="panel-heading" style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
                <h2 class="panel-title"><font color="#000000" size="3"><b>Kemaskini Badan Persijilan Halal</b></font></h2>
            </header>
            <div class="panel-body ">
                <div class="col-md-12">
                    <input type="hidden" name="id" id="id" class="form-control" value="">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Tajuk :</label>
                            <div class="col-sm-9">
                                <input type="text" name="event" id="event" class="form-control" value="">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div align="right">
                            <button type="button" class="btn btn-default" onclick="do_close()"><i class="fa fa-spinner"></i> Kembali</button>
                            <button type="button" class="mt-sm mb-sm btn btn-success" onclick="do_simpan()" id="simpan">
                                <i class="fa fa-arrow-right"></i> Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</div>