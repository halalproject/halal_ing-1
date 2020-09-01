<script>

function do_close()
{
    location.reload();
}

</script>
<div class="col-md-12">
    <form name="halal" id="create" method="post" action="" enctype="multipart/form-data" autocomplete="off">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <section class="panel panel-featured panel-featured-info">
            <header class="panel-heading" style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
                <h6 class="panel-title"><font color="#000000" size="3"><b>Maklumat Permohonan</b></font></h6>
            </header>

            <div class="panel-body">
                <input type="hidden" name="id" id="id" class="form-control" value="">

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label">No Permohonan :</label>
                        <div class="col-sm-5">
                            C0005f410b821ca04
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label">Nama Ramuan :</label>
                        <div class="col-sm-5">
                            Ayam
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label">Nama Saintifik :</label>
                        <div class="col-sm-5">
                            Ayam Kampung
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label">Nama Kategori :</label>
                        <div class="col-sm-5">
                            Semula Jadi
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label">Tarikh Permohonan :</label>
                        <div class="col-sm-5">
                            20/8/2020
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label">Status :</label>
                        <div class="col-sm-5">
                            Lulus
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label">Negara Asal Pengilang/Pengeluar :</label>
                        <div class="col-sm-5">
                            Australia
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label">Nama Pengilang/Pengeluar :</label>
                        <div class="col-sm-5">
                            Qwerty
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label">Alamat Pengilang/Pengeluar :</label>
                        <div class="col-sm-5">
                            Autralia
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label">Negeri Asal Pembekal :</label>
                        <div class="col-sm-5">
                            Negeri Sembilan
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label">Nama Pembekal :</label>
                        <div class="col-sm-5">
                            Abcde
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label">Alamat Pembekal :</label>
                        <div class="col-sm-5">
                            Seremban, Negeri Sembilan, Malaysia
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div align="right">
                        <button type="button" class="btn btn-default" onclick="do_close()"><i class="fa fa-spinner"></i> Kembali</button>
                        <button type="button" class="mt-sm mb-sm btn btn-info" onclick="do_simpan()" id="simpan">
                            <i class="fa fa-save"></i> Simpan</button>
                    </div>
                </div>
            
            </div>

        </section>
    </form>
</div>
@if(empty($id))
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip();
  $('#tab2').toggleClass('disabled');
  $('#tab-2').removeAttr('data-toggle');
})
</script>
@else
<script>
$(function() {
    $('[data-toggle="tooltip"]').tooltip();
    $('#tab2').toogleClass('disabled');
    $('#tab-2').attr('data-toggle','tab');
})
</script>
@endif