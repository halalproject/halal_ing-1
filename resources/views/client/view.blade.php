<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
	// Remove advanced tabs for all editors.
	CKEDITOR.config.removeDialogTabs = 'image:advanced;link:advanced;flash:advanced;creatediv:advanced;editdiv:advanced';
</script>

<script>
    function do_close()
{
    location.reload();
}
</script>

<div class="col-md-12">
    <section class="panel panel-featured panel-featured-info">
        <header class="panel-heading" style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
            <h6 class="panel-title"><font color="#000000" size="3"><b>Maklumat Permohonan</b></font></h6>
        </header>
    <div class="panel-body">
         <!-- Start Tab -->
        <div class="tabbable">
            <!-- Tab Menu -->
			<ul id="tabs" class="nav nav-tabs printnone" role="tablist">
				<li class="nav-item active">
					<a id="tab-1" href="#t1" class="nav-link" data-toggle="tab" role="tab"><span class="text-black text-small text-bold">Maklumat Permohonan</span></a>
				</li>
				<li id="tab2" class="nav-item">
					<a id="tab-2" href="#t2" class="nav-link" data-toggle="tab" role="tab"><span class="text-black text-small text-bold">Process Admin</span></a>
				</li>
			</ul>
            <!-- End Tab Menu -->
            <div id="content" class="tab-content padding-10 bg-light-grey" role="tablist">
                <!-- First Tab -->
                <div id="t1" class="card tab-pane row in active row" role="tabpanel" aria-labelledby="tab-1">
                    <div class="panel-body">
                        <div class="col-md-12">
                            <input type="hidden" name="id" id="id" class="form-control" value="{{$id}}">

                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 control-label">No Permohonan :</label>
                                    <div class="col-sm-6">
                                        C0005f410b821ca04
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 control-label">Nama Saintifik :</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 control-label">Nama Saintifik :</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 control-label">Nama Saintifik :</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 control-label">Nama Saintifik :</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 control-label">Nama Saintifik :</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 control-label">Nama Saintifik :</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 control-label">Nama Saintifik :</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 control-label">Nama Saintifik :</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div align="right">
                                    <button type="button" class="mt-sm mb-sm btn btn-success" onclick="do_simpan()" id="simpan">
                                        <i class="fa fa-save"></i> Simpan</button>
                                    <button type="button" class="btn btn-default" onclick="do_close()"><i class="fa fa-spinner"></i> Kembali</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End First Tab -->
                
                <!-- Second Tab -->
                <div id="t2" class="card tab-pane row in" role="tabpanel" aria-labelledby="tab-2">
                    <div class="panel-body">
                        <div class="col-md-12">
                        
                            <fieldset class="form-group">
                                <div class="row">
                                    <label class="col-form-label col-sm-2 pt-0">Status :</label>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="semak" id="semak" value="semak">
                                                <label class="form-check-label" for="semak">
                                                Semak
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="semula" id="semula" value="semula">
                                                <label class="form-check-label" for="semula">
                                                   Semak Semula
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="lulus" id="lulus" value="lulus">
                                                <label class="form-check-label" for="gridRadios3">
                                                Lulus
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="tolak" id="tolak" value="tolak">
                                                <label class="form-check-label" for="tolak">
                                                Tolak
                                                </label>
                                            </div>
                                        </div>
                                </div>
                            </fieldset>
                                <br>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-sm-2 control-label" for="exampleFormControlTextarea1">Catatan :</label>
                                    <div class="col-sm-9">
                                    <textarea name="dokumen" cols="50" rows="10" id="story" style="width:100%"></textarea>
                                    </div>
                                </div>
                            </div>
                                
                        </div>

                        <div class="form-group">
                            <div align="right">
                                <button type="button" class="mt-sm mb-sm btn btn-success" onclick="do_simpan()" id="simpan">
                                    <i class="fa fa-save"></i> Simpan</button>
                                <button type="button" class="btn btn-default" onclick="do_close()"><i class="fa fa-spinner"></i> Kembali</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <!-- End Second Tab -->
            </div>
        </div>
        <!-- End Tab -->  
    </div>
</section>
</div>

<script>
	CKEDITOR.replace('dokumen', {height: 500});
</script>

<!-- @if(empty($id))
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
@endif -->