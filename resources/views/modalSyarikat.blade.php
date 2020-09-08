<script>
    function do_close() {
        location.reload();
    }
</script>

<div class="col-md-12" >
    <section class="panel panel-featured panel-featured-info">
        <header class="panel-heading" style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">

            <h6 class="panel-title"><font color="#000000" size="3"><b>Tambah Staf</b></font></h6>
        </header>
        <div class="panel-body ">
            <div class="col-md-12">
                <div align="center">
                    <body>
                        <input type="image" src="{{ asset('images/person.jpg') }}" width="200" height="200"/>
                        <input type="file" id="my_file" style="display: none;" /><br>
                        <button type="button" class="btn btn-info" id="upload"><i class="fa fa-upload" aria-hidden="true" align="center"></i> Muat Naik Gambar</button>
                    </body>
                </div>
                <br>
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
                                <label class="col-sm-2 control-label"><font color="#FF0000">*</font> No. KP :</label>
                                <div class="col-sm-4">
                                    <input type="text" name="no_kp" id="no_kp" class="form-control" value="">
                                </div>

                                <label class="col-sm-2 control-label"><font color="#FF0000">*</font> No. Tel :</label>
                                <div class="col-sm-4">
                                    <input type="text" name="no_tel" id="no_tel" class="form-control" value="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label"><font color="#FF0000">*</font> Emel :</label>
                                <div class="col-sm-4">
                                    <input type="text" name="emel" id="emel" class="form-control" value="">
                                </div>

                                <label class="col-sm-2 control-label"><font color="#FF0000">*</font> Jawatan :</label>
                                <div class="col-sm-4">
                                    <select name="level_pengguna" onchange="" class="form-control">
                                        <option value="">Pilih Jawatan</option>
                                        <option value="">Pengarah</option>
                                        <option value="">Ketua Pengarah Penolong Kanan</option>
                                        <option value="">Penolong Pengarah Kanan</option>
                                        <option value="">Pegawai Hal Ehwal Islam</option>
                                        <option value="">Penolong Pegawai Hal Ehwal Islam</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-2 control-label" for="level_pengguna"><font color="#FF0000">*</font> Level Pengguna : </label>
                                <div class="col-md-4">
                                    <select name="level_pengguna" onchange="" class="form-control">
                                        <option value="">Pilih Level Pengguna</option>
                                        <option value="">Admin</option>
                                        <option value="">Penyemak</option>
                                        <option value="">Pelulus</option>
                                        <option value="">Staf</option>
                                    </select>
                                </div>
                                
                                <label class="col-sm-2 control-label " for="status"><font color="#FF0000">*</font> Status : </label>
                                <div class="col-md-4">
                                    <select name="status" onchange="" class="form-control">
                                        <option value="">Pilih Status</option>
                                        <option value="">Aktif</option>
                                        <option value="">Tidak Aktif</option>
                                        <option value="">Cuti</option>
                                    </select>
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
    </section>
</div>
