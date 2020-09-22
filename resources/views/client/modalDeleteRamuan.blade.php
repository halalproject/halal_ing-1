<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.config.removeButtons = 'Source,Save,NewPage,Preview,Print,Templates,Image,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Language';

function do_close() {
    location.reload();
}

function do_simpan()
{    
    var docContents = CKEDITOR.instances['reason'].getData();
	document.create.catatan_text.value=docContents;

    if(docContents == '' ){
        swal({
            title: 'Amaran',
            text: 'Maklumat tidak lengkap.\nSila masukkan maklumat yang betul.',
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
                <h6 class="panel-title"><font color="#000000" size="3"><b>Sebab Padam</b></font></h6>
            </header>
            <div class="panel-body ">
                <div class="col-md-12">
                    <input type="hidden" name="id" id="id" class="form-control" value="{{ $rs->id }}">
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-3 control-label" for="reason"><font color="#FF0000">*</font> Kenapa Hapus ?</label>
                            <div class="col-sm-9">
                                <textarea name="reason" cols="50" rows="10" id="reason" style="width:100%"></textarea>
                            </div>
                        </div>

                        <textarea name="catatan_text" id="catatan_text"  style="display:none;">{{ $rs->delete_comment ?? '' }}</textarea>
                    </div>

                    <div class="form-group">
                        <div align="right">
                            <button type="button" class="btn btn-default" onclick="do_close()"><i class="fa fa-spinner"></i> Kembali</button>
                            <button type="button" class="mt-sm mb-sm btn btn-success" onclick="do_simpan()" id="simpan">
                                <i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</div>

<script>
	CKEDITOR.replace('reason');
</script>