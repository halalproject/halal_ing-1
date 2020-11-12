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
                    <td width="50%"></td>
                    <td width="50%">
                        Ruj. Tuan:
                        <br>
                        Ruj. Kami: JAI.SEL.BPH/900/4/2/1 JLD 13 (&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)
                        <br>
                        Tarikh&emsp;&nbsp;&nbsp;: 12 Januari 2020
                        <br>
                        &emsp;&emsp;&emsp;&emsp;&emsp;14 Jamadilawal 1441H
                        <br>
                    </td>
                </tr>
                <tr height="11pt"></tr>
                <tr>
                    <td colspan="2" width="100%">
                        {{ $syarikat->company_name }}
                        <br>
                        {{ $syarikat->company_address_1 }}
                        <br>
                        {{ $syarikat->company_address_2 }}
                        <br>
                        {{ $syarikat->company_poscode }} {{ $syarikat->company_city }},
                        <br>
                        {{ optional($syarikat->negeri)->nama }}
                        <br>
                        U/P :&nbsp;&nbsp;&nbsp;&nbsp;{{ $syarikat->contact_name }}
                    </td>
                </tr>
                <tr height="6pt"></tr>
                <tr>
                    <td>Tuan/Puan,</td>
                </tr>
                <tr height="6pt"></tr>
                <tr>
                    <td>
                        <strong>PER:{{ $surat->perkara }}</strong>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" width="100%">
                        {!! $surat->kandungan_1 !!}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <table width="100%" border="1" align="center" cellpadding="1" cellspacing="0">
                            <tr>
                                <td align="center" width="35%">
                                    <strong>No. Permohonan</strong>
                                </td>
                                <td align="center" width="75%">
                                    <strong>Sebab</strong>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" width="35%">
                                    {{ $ramuan->ing_kod }}
                                </td>
                                <td width="75%" style="padding: 10px">
                                    @if(!empty($komen->catatan))
                                        {!! $komen->catatan !!}
                                    @else
                                        @if ($surat->kod == 'S_TOLAK')
                                            Permohonan ramuan ini ditolak
                                        @else
                                            Permohonan ramuan ini diluluskan
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" width="100%">
                        {!! $surat->kandungan_2 !!}
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