<script>
    $("#upload").click(function() {
        $("input[id='my_file']").click();
    });

    function do_simpan()
    {    
        var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        var no_kp = $('#no_kp').val();
        var nama = $('#nama').val();
        var email = $('#email').val();
        var no_telefon = $('#no_telefon').val();
        var no_hp = $('#no_hp').val();
        var jawatan = $('#jawatan').val();
        var level = $('#level').val();
        var status = $('#status').val();

        if(no_kp.trim() == '' ){
            alert('Sila masukkan maklumat No. Kad Pengenalan.');
            $('#no_kp').focus(); return false;
        } else if(nama.trim() == '' ){
            alert('Sila masukkan maklumat nama.');
            $('#nama').focus(); return false;
        } else if(!reg.test(email)){
            alert('Sila masukkan maklumat emel yang betul.');
            $('#email').focus(); return false;
        } else if(email.trim() == '' ){
            alert('Sila masukkan maklumat emel.');
            $('#email').focus(); return false;
        } else if(no_telefon.trim() == '' ){
            alert('Sila masukkan maklumat no. telefon.');
            $('#no_telefon').focus(); return false;
        } else if(no_hp.trim() == '' ){
            alert('Sila masukkan maklumat no. telefon bimbit.');
            $('#no_hp').focus(); return false;
        } else if(jawatan.trim() == '' ){
            alert('Sila pilih maklumat jawatan.');
            $('#jawatan').focus(); return false;
        } else if(level.trim() == '' ){
            alert('Sila pilih maklumat level.');
            $('#level').focus(); return false;
        } else if(status.trim() == '' ){
            alert('Sila pilih status pengguna.');
            $('#status').focus(); return false;
        } else {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'/jais/staff/store', //&datas='+datas,
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
                        text: 'Maklumat telah berjaya dikemaskini',
                        type: 'success',
                        confirmButtonClass: "btn-success",
                        confirmButtonText: "Ok",
                        showConfirmButton: true,
                        }).then(function () {
                            reload = window.location; 
                            window.location = reload;
                        });
                    } else if(data=='ERR'){
                        swal({
                        title: 'Amaran',
                        text: 'Terdapat ralat sistem.\nMaklumat anda tidak berjaya dikemaskini.',
                        type: 'error',
                        confirmButtonClass: "btn-warning",
                        confirmButtonText: "Ok",
                        showConfirmButton: true,
                        });
                    } else if(data=='ADA'){
                        swal({
                        title: 'Pemberitahuan',
                        text: 'Maklumat kakitangan telah ada di dalam sistem.',
                        type: 'error',
                        confirmButtonClass: "btn-Info",
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
                            <div class="col-sm-4">
                                <input type="text" name="nama" id="nama" class="form-control" value="{{ $user->username ?? '' }}">
                            </div>

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
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-2 control-label"><font color="#FF0000">*</font> No. Tel :</label>
                            <div class="col-sm-4">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    <input id="no_hp" name="no_hp" data-plugin-masked-input placeholder="0312231234" class="form-control" value="{{ $user->nombor_tel ?? '' }}" maxlength="11"
                                            onkeydown="return (event.ctrlKey || event.altKey 
                                                || (47<event.keyCode && event.keyCode<58 && event.shiftKey==false) 
                                                || (95<event.keyCode && event.keyCode<106)
                                                || (event.keyCode==8) || (event.keyCode==9) 
                                                || (event.keyCode>34 && event.keyCode<40) 
                                                || (event.keyCode==46) )">
                                </div>
                            </div>

                            <label class="col-sm-2 control-label"><font color="#FF0000">*</font> No. Fax :</label>
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
                                <input type="text" name="email" id="email" class="form-control" value="{{ $user->email ?? '' }}">
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