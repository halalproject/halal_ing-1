<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $data['title'] }}</title>
</head>
<body>
    <p>
        Assalamualaikum,
        <br><br>
        Untuk makluman pihak Tuan/Puan berikut adalah pengumuman penting:
        <br><br>
        {{ date('d/m/Y',strtotime($data['start_date'])) }} - {{ date('d/m/Y',strtotime($data['end_date'])) }}
        <br><br>
        {!! $data['content'] !!}
        <br><br>
        Sekian, terima kasih,<br>
        <b>Urusetia JAIS</b>
        <br><br>
        Sebarang masalah, sila hubungi Pentadbir Sistem atau hubungi Urusetia JAIS
        <br><br>
        ..:::::Notifikasi Emel Permakluman:::::..<br>>>>>Sistem myHalal Ingredient JAIS<<<<<br>Jabatan Agama Islam Selangor (JAIS)
        <br><br><em>** Emel Ini Dijana Oleh Sistem myHalal Ingredient JAIS. Tidak perlu dibalas **</em>
    </p>
</body>
</html>