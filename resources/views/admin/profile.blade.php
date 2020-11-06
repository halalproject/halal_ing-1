<script>
    $("#upload").click(function() {
        $("input[id='my_file']").click();
    });
</script>
@php
$id = $user->id ?? '';
$jawatan = $user->user_jawatan ?? '';
$level = $user->user_level ?? '';
$status = $user->user_status ?? '';
@endphp
<div class="col-md-12" >
    <form name="halal" id="create" method="post" action="" enctype="multipart/form-data" autocomplete="off">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <section class="panel panel-featured panel-featured-info">
            <header class="panel-heading" style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
                <h2 class="panel-title"><font color="#000000" size="3"><b>Maklumat Pengguna</b></font></h2>
            </header>
            <div class="panel-body" align="center">
                <div class="col-md-12">
                    <input type="hidden" name="id" id="id" class="form-control" value="{{$id}}">

                        <body>
                            <input type="image" src="{{ asset('images/person.jpg') }}" width="200" height="200"/>
                            <input type="file" id="my_file" style="display: none;" /><br>
                            <button type="button" class="btn btn-info" id="upload"><i class="fa fa-upload" aria-hidden="true" align="center"></i> Muat Naik Gambar</button>
                        </body><br><br>
                    </div>
                    

                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-2 control-label"><font color="#FF0000">*</font> Nama :</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" id="nama" class="form-control" value="{{ $user->username ?? '' }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-2 control-label"><font color="#FF0000">*</font> No. KP :</label>
                            <div class="col-sm-4">
                                <input type="text" name="no_kp" id="no_kp" class="form-control" placeholder="No. Kad Pengenalan" 
                                value="{{ $user->nombor_kp ?? '' }}" maxlength="12"
                                onkeydown="return (event.ctrlKey || event.altKey 
                                    || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                                    || (95<event.keyCode && event.keyCode<106)
                                    || (event.keyCode==8) || (event.keyCode==9) 
                                    || (event.keyCode>34 && event.keyCode<40) 
                                    || (event.keyCode==46) )" > 
                                <i><font color="#FF0000">(Sila masukkan No. MyKAD tanpa tanda '-')</font></i>
                            </div>
                            

                            <label class="col-sm-2 control-label"><font color="#FF0000">*</font> No. Tel :</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    <input id="no_telefon" name="no_telefon" data-plugin-masked-input placeholder="0312231234" class="form-control" value="{{ $user->nombor_tel ?? '' }}" maxlength="11"
                                            onkeydown="return (event.ctrlKey || event.altKey 
                                                || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                                                || (95<event.keyCode && event.keyCode<106)
                                                || (event.keyCode==8) || (event.keyCode==9) 
                                                || (event.keyCode>34 && event.keyCode<40) 
                                                || (event.keyCode==46) )">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-2 control-label"><font color="#FF0000">*</font> Emel :</label>
                            <div class="col-sm-4">
                                <input type="text" name="emel" id="emel" class="form-control" value="{{ $user->email ?? '' }}">
                            </div>

                            <label class="col-sm-2 control-label"><font color="#FF0000">*</font> Jawatan :</label>
                            <div class="col-sm-4">
                                <select name="jawatan" id="jawatan" class="form-control">
                                    <option value="">Pilih Jawatan</option>
                                    @foreach ($rsj as $rsj)
                                    <option value="{{ $rsj->id }}" @if($jawatan == $rsj->id) selected @endif>{{ $rsj->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-2 control-label" for="level_pengguna"><font color="#FF0000">*</font> Level Pengguna : </label>
                            <div class="col-md-4">
                                <select name="level" id="level" class="form-control">
                                    <option value="">Pilih Level Pengguna</option>
                                    @foreach ($rsl as $rsl)
                                    <option value="{{ $rsl->id }}" @if($level == $rsl->id) selected @endif>{{ $rsl->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <label class="col-sm-2 control-label " for="status"><font color="#FF0000">*</font> Status : </label>
                            <div class="col-md-4">
                                <select name="status" id="status" class="form-control">
                                    <option value="">Pilih Status</option>
                                    @foreach ($rss as $rss)
                                    <option value="{{ $rss->id }}" @if($status == $rss->id) selected @endif>{{ $rss->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div align="right">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-spinner"></i> Kembali</button>
                            <button type="button" class="mt-sm mb-sm btn btn-info" onclick="do_simpan()" id="simpan">
                                <i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </div>
                        
                </div>
            </div>
        </section>
    </form>
</div>
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