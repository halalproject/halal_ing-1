<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    // Remove advanced tabs for all editors.
    CKEDITOR.config.removeButtons = 'Source,Save,NewPage,Preview,Print,Templates,Image,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Language';
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
                        <a id="tab-2" href="#t2" class="nav-link" data-toggle="tab" role="tab"><span class="text-black text-small text-bold">Process Pengesahan</span></a>
                    </li>
                </ul>
                <!-- End Tab Menu -->
                <div id="content" class="tab-content padding-10 bg-light-grey" role="tablist">
                    <!-- First Tab -->
                    <div id="t1" class="card tab-pane row in active row" role="tabpanel" aria-labelledby="tab-1">
                        <div class="panel-body">
                            <div class="col-md-12">
                                <input type="hidden" name="id" id="id" class="form-control" value="">

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-sm-3 control-label">No Permohonan :</label>
                                        <div class="col-sm-5">
                                            <b>C0005f410b821ca04</b>
                                        </div>

                                        <label class="col-sm-2 control-label">Tarikh Permohonan :</label>
                                        <div class="col-sm-2">
                                            <b>20/8/2020</b>
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
                                        <label class="col-sm-3 control-label">Sumber Bahan :</label>
                                        <div class="col-sm-5">
                                            Semula Jadi
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
                                    <div class="row">
                                        <label class="col-sm-3 control-label">Dokumentasi Ramuan : </label>
                                        <div class="row">
                                            <div class="col-sm-5">Sijil Halal: <a href="">Sijil Halal.pdf</a></div>
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
                        </div>
                    </div>
                    <!-- End First Tab -->
                    
                    <!-- Second Tab -->
                    <div id="t2" class="card tab-pane row in" role="tabpanel" aria-labelledby="tab-2">
                        <div class="panel-body">
                            <div class="col-md-12">
                                <fieldset class="form-group">
                                    <div class="row">
                                        <label class="col-form-label col-sm-3 pt-0">Status :</label>
                                        <div class="col-sm-9">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="semak" id="semak" value="semak">
                                                <label class="form-check-label" for="semak">
                                                Semak
                                                </label>
                                            </div>
                                            <div class="form-check">
<<<<<<< HEAD
=======
                                                <input class="form-check-input" type="checkbox" name="semula" id="semula" value="semula">
                                                <label class="form-check-label" for="semula">
                                                    Semak Semula
                                                </label>
                                            </div>
                                            <div class="form-check">
>>>>>>> e116d9259735c34f4ac27403f5e056b88dc8812d
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
                                        <label class="col-sm-3 control-label" for="exampleFormControlTextarea1">Catatan :</label>
                                        <div class="col-sm-9">
                                        <textarea name="dokumen" cols="50" rows="10" id="story" style="width:100%"></textarea>
                                        </div>
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
                    </div>
                    <!-- End Second Tab -->
            </div>
            <!-- End Tab -->  
        </div>
    </section>
</div>

<script>
    CKEDITOR.replace('dokumen', {height: 250});

    $('input:checkbox').click(function() {
        $('input:checkbox').not(this).prop('checked', false);
    });
</script>