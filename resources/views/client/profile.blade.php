<script>
function do_close()
{
    location.reload();
}
</script>

<div class="col-md-12">
    <section class="panel panel-featured panel-featured-info">
        <header class="panel-heading" style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
            <h6 class="panel-title"><font color="#000000" size="3"><b>Profil Syarikat</b></font></h6>
        </header>
        <div class="panel-body ">
            <div class="col-md-12">
                <input type="hidden" name="id" id="id" class="form-control" value="">
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 control-label"><font color="#FF0000">*</font> Nama Syarikat :</label>
                        <div class="col-sm-5">
                            <input type="text" name="company_name" id="company_name" class="form-control" value="">
                        </div>
                        <label class="col-sm-3 control-label"><font color="#FF0000">*</font> No Pendaftaran Syarikat :</label>
                        <div class="col-sm-2">
                            <input type="text" name="company_reg_code" id="company_reg_code" class="form-control" value="">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 control-label"><font color="#FF0000">*</font> Alamat Syarikat :</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Alamat 1" name="company_address_1" id="company_address_1" class="form-control" value="">
                        </div>
                        <label class="col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Alamat 2" name="company_address_2" id="company_address_2" class="form-control" value="">
                        </div>
                        <label class="col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Alamat 3" name="company_address_3" id="company_address_3" class="form-control" value="">
                        </div>
                        <label class="col-sm-2 control-label"></label>
                        <div class="col-sm-2">
                            <input type="text" placeholder="Poskod" name="company_poscode" id="company_poscode" class="form-control" value="">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 control-label"><font color="#FF0000">*</font> Nama Ramuan :</label>
                        <div class="col-sm-8">
                            <input type="text" name="ramuan" id="ramuan" class="form-control" value="">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2 control-label"><font color="#FF0000">*</font> Web :</label>
                        <div class="col-sm-4">
                            <input type="text" name="ramuan" id="ramuan" class="form-control" value="">
                        </div>
                        <label class="col-sm-2 control-label"><font color="#FF0000">*</font> Emel :</label>
                        <div class="col-sm-4">
                            <input type="text" name="ramuan" id="ramuan" class="form-control" value="">
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div align="right">
                        <button type="button" class="btn btn-default" onclick="do_close()"><i class="fa fa-spinner"></i> Kembali</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>