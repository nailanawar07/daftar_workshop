<!DOCTYPE html>
<html>
<head>
    <title>Konfirmasi Pembayaran</title>
</head>
<body>
    <h2>Hai {{ $pendaftaran->user->name }},</h2>
    <p>Pembayaran kamu untuk workshop <strong>{{ $pendaftaran->workshop->judul }}</strong> telah dikonfirmasi sebagai <strong>LUNAS</strong>.</p>

    <p>Berikut detail workshop kamu:</p>
    <ul>
        <li><strong>Waktu:</strong> {{ \Carbon\Carbon::parse($pendaftaran->workshop->waktu)->translatedFormat('l, d F Y H:i') }}</li>
        <li><strong>Lokasi:</strong> {{ $pendaftaran->workshop->lokasi }}</li>
    </ul>

    <p>Silakan hadir tepat waktu. Terima kasih telah mendaftar!</p>
</body>
</html>
