<!doctype html>
<html class="fixed">
	<head>
		<title>{{ config('app.name') }}</title>
    <body>
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
                        {{ optional($data['syarikat']->negeri)->nama }}
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
    </body>
</html>