<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Surat - {{ $surat->resi_number }}</title>
    <style>
        @page {
            size: A4;
            margin: 2cm;
        }
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12pt;
            line-height: 1.5;
            color: #000;
            background: #fff;
        }
        .header-text {
            text-align: center;
        }
        .header-text h1, .header-text h2, .header-text p {
            margin: 0;
            padding: 0;
        }
        .header-text h1 {
            font-size: 16pt;
            text-transform: uppercase;
        }
        .header-text h2 {
            font-size: 18pt;
            font-weight: bold;
            text-transform: uppercase;
        }
        .header-text p {
            font-size: 11pt;
        }
        .surat-title {
            text-align: center;
            margin-bottom: 20px;
        }
        .surat-title h3 {
            margin: 0;
            font-size: 14pt;
            text-transform: uppercase;
            text-decoration: underline;
            font-weight: bold;
        }
        .content {
            text-align: justify;
            margin-bottom: 30px;
        }
        .signature {
            float: right;
            text-align: center;
            width: 250px;
            margin-top: 30px;
        }
        .signature-space {
            height: 80px;
        }
        table.data-table {
            width: 100%;
            margin-bottom: 15px;
            margin-left: 30px; /* Indent the table a bit */
        }
        table.data-table td {
            vertical-align: top;
            padding: 3px 0;
        }
        .col-label {
            width: 220px;
        }
        .col-separator {
            width: 20px;
            text-align: center;
        }
        @media print {
            .no-print { display: none; }
        }
        .print-btn {
            background: #0f766e;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 14px;
            cursor: pointer;
            border-radius: 5px;
            margin-bottom: 20px;
            font-family: sans-serif;
        }
    </style>
</head>
<body>

    <button onclick="window.print()" class="no-print print-btn">🖨️ Cetak Surat Sekarang</button>

    <!-- Kop Surat -->
    <table width="100%" style="border-bottom: 3px solid #000; padding-bottom: 5px; margin-bottom: 2px;">
        <tr>
            <td width="15%" style="text-align: center; vertical-align: middle;">
                @php
                    $path = public_path('image/logo_aceh_besar.png');
                    $base64 = '';
                    if(file_exists($path)) {
                        $type = pathinfo($path, PATHINFO_EXTENSION);
                        $data = file_get_contents($path);
                        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                    }
                @endphp
                @if($base64)
                    <img src="{{ $base64 }}" alt="Logo" style="max-width: 90px; height: auto;">
                @endif
            </td>
            <td width="85%" class="header-text">
                <h1>Pemerintah Kabupaten Aceh Besar</h1>
                <h1>Kecamatan Darul Imarah</h1>
                <h2>Gampong Leuue</h2>
                <p>Jln. Utama Gampong Leuue, Kode Pos: 23352</p>
            </td>
        </tr>
    </table>
    <!-- Garis ganda di bawah kop surat -->
    <div style="border-top: 1px solid #000; margin-bottom: 20px;"></div>

    <div class="surat-title">
        <h3>{{ $surat->template->name ?? 'SURAT KETERANGAN' }}</h3>
        <p>Nomor: ... / ... / {{ date('Y') }}</p>
    </div>

    <div class="content">
        <p>Yang bertanda tangan di bawah ini Keuchik Gampong Leuue menerangkan dengan sebenar-benarnya bahwa:</p>
        
        <table class="data-table">
            <tr>
                <td class="col-label">Nama Lengkap</td>
                <td class="col-separator">:</td>
                <td><strong>{{ strtoupper($surat->name) }}</strong></td>
            </tr>
            <tr>
                <td class="col-label">NIK</td>
                <td class="col-separator">:</td>
                <td>{{ $surat->nik }}</td>
            </tr>
            <!-- Anda dapat menambahkan field lain di sini jika sudah ada di database -->
            <tr>
                <td class="col-label">Keperluan</td>
                <td class="col-separator">:</td>
                <td>{{ $surat->purpose }}</td>
            </tr>
        </table>

        <p>
            {!! nl2br(e($surat->template->content ?? 'Benar bahwa yang bersangkutan adalah tergolong kehidupan ekonomi lemah atau tidak mampu, maka wajib mendapat bantuan biaya pendidikan.')) !!}
        </p>
        <p>
            Demikian surat keterangan ini kami berikan kepada yang bersangkutan untuk dipergunakan seperlunya.
        </p>
    </div>

    <div class="signature">
        <p>Leuue, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
        <p>Mengetahui a.n Keuchik Gampong Leuue,</p>
        <p>Kasi Pemerintahan</p>
        <div class="signature-space"></div>
        <p><strong><u>( ______________________ )</u></strong></p>
        <p>NIP. .........................</p>
    </div>

</body>
</html>
