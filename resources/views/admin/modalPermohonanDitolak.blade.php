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
        <h6 class="panel-title"><font color="#000000" size="3"><b>Permohonan Ditolak</b></font></h6>
    </header>

    <div class="panel-body">
        <div class="form-group">
            <div class="row">
                <label class="col-sm-3 control-label"><font color="#FF0000">*</font> No Permohonan :</label>
                <div class="col-sm-9">
                    HQ0012411123
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Nama Ramuan :</label>
                <div class="col-sm-9">
                    Ayam
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Kategori :</label>
                <div class="col-sm-9">
                    Semulajadi
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-3 control-label"><font color="#FF0000">*</font>Tarikh Permohonan:</label>
                <div class="col-sm-9">
                    20/8/2020
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Status :</label>
                <div class="col-sm-9">
                    Ditolak
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Negara Asal Pengilang/Pengeluar :</label>
                <div class="col-sm-9">
                    Australia
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Nama Pengilang/Pengeluar :</label>
                <div class="col-sm-9">
                    Qwerty
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Alamat Pengilang/Pengeluar :</label>
                <div class="col-sm-9">
                    Autralia
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Negeri Asal Pembekal :</label>
                <div class="col-sm-9">
                    Negeri Sembilan
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Nama Pembekal :</label>
                <div class="col-sm-9">
                    Abcde
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Alamat Pembekal :</label>
                <div class="col-sm-9">
                    Seremban, Negeri Sembilan, Malaysia
                </div>
            </div>
        </div>
        <div class="form-group">
                    <div class="row">
                        <label class="col-sm-3 control-label">Dokumentasi Ramuan : </label>
                        <div class="row">
                            <div class="col-sm-5">Sijil Halal: <a href="">Sijil Halal.pdf</a></div>
                        </div>
                    </div>
                </div>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-3 control-label" for="exampleFormControlTextarea1">Catatan :</label>
                <div class="col-sm-9">
                    Dokumen ini tidak lengkap.
                </div>
            </div>
        </div>

        <div align="right">
            <button type="button" class="btn btn-default" onclick="do_close()"><i class="fa fa-spinner"></i> Kembali</button>
            <button type="button" class="mt-sm mb-sm btn btn-info" onclick="do_simpan()" id="simpan">
                <i class="fa fa-save"></i> Simpan</button>
        </div>
    </div>
</section>
</form>
</div>
@if(empty($id))

<script>


$('input:checkbox').click(function() {
    $('input:checkbox').not(this).prop('checked', false);
});

</script>
@endif