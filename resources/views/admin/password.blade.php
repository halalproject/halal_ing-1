<script>
function do_close()
{
    location.reload();
}
</script>

<div class="col-md-12">
    <section class="panel panel-featured panel-featured-info">
        <header class="panel-heading" style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
            <h6 class="panel-title"><font color="#000000" size="3"><b>Tukar Kata Laluan</b></font></h6>
        </header>
        <div class="panel-body ">
            <div class="col-md-12">
                <input type="hidden" name="id" id="id" class="form-control" value="">

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 control-label"><font color="#FF0000">*</font> Nama :</label>
                        <div class="col-sm-10">
                            <input type="text" name="ramuan" id="ramuan" class="form-control" value="">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 control-label"><font color="#FF0000">*</font> Jawatan :</label>
                        <div class="col-sm-10">
                            <input type="text" name="jawatan" id="jawatan" class="form-control" value="">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 control-label"><font color="#FF0000">*</font> Katalaluan Baru :</label>
                        <div class="col-sm-2">
                            <input type="password" name="new_pass" id="new_pass" class="form-control" value="">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 control-label"><font color="#FF0000">*</font> Masukkan Semula Katalaluan Baru :</label>
                        <div class="col-sm-2">
                            <input type="password" name="re_new_pass" id="re_new_pass" class="form-control" value="">
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