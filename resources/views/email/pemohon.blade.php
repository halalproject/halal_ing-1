<!doctype html>
<html class="fixed">
	<head>
		<!-- Basic -->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>{{ config('app.name') }}</title>
		<link rel="shortcut icon" type="image/png" href=""/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        
        <style>
            @page{
                margin-top: 0;
                margin-left: 80px;
                margin-right: 80px;
                margin-bottom: 0;
            }
            
            body{
                font-family: Arial, Helvetica, sans-serif;
                font-size: 10pt;
            }

            .header{
                position: fixed;
                top: 0;
            }

            .content{
                position: fixed;
                margin-top: 120px;
                width: 650px;
            }

            .footer{
                position: fixed;
                bottom: 0;
            }
        </style>
    </head>
    <body>
        <div class="header">
            <img src="{{ asset('images/surat/header_surat.jpeg') }}" alt="header_surat" width="650px">
        </div>
        <div class="content">
            <table width="100%">
                <tr>
                    <td colspan="2" width="100%">
                        {{ $data['syarikat']->company_name }}
                        <br>
                        {{ $data['syarikat']->company_address_1 }}
                        <br>
                        {{ $data['syarikat']->company_address_2 }}
                        <br>
                        {{ $data['syarikat']->company_poscode }} {{ $data['syarikat']->company_city }},
                        <br>
                        {{ $data['syarikat']->negeri->nama }}
                        <br>
                        U/P :&nbsp;&nbsp;&nbsp;&nbsp;{{ $data['syarikat']->contact_name }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>
                            Tuan/Puan,
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p>
                            <strong>PER:{{ $data['surat']->perkara }}</strong>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" width="100%">
                        {!! $data['surat']->kandungan_1 !!}
                    </td>
                </tr>
                <tr>
                    <td colspan="2" width="100%">
                        {!! $data['surat']->kandungan_2 !!}
                    </td>
                </tr>
                <tr>
                    <td colspan="2" width="100%">
                        ..:::::Notifikasi Emel Permakluman:::::..<br>>>>>Sistem myHalal Ingredient JAIS<<<<<br>Jabatan Agama Islam Selangor (JAIS)
                        <br><br><em>** Emel Ini Dijana Oleh Sistem myHalal Ingredient JAIS. Tidak perlu dibalas **</em>
                    </td>
                </tr>
            </table>
        </div>
        <div class="footer">
            <img src="{{ asset('images/surat/footer_surat.jpeg') }}" alt="footer_surat" width="650px">
        </div>
    </body>
</html>

<script>
    window.print();
</script>