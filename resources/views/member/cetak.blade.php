<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
  <title>Cetak Kartu Member</title>

  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .card-container {
      display: flex;
      flex-wrap: wrap;
      gap: 10pt;
    }

    .card {
      width: 85.60mm;
      height: 53.98mm;
      position: relative;
      border: 1px solid #000;
      overflow: hidden;
    }

    .card img.bg {
      width: 100%;
      height: 100%;
      object-fit: cover;
      position: absolute;
      top: 0;
      left: 0;
      z-index: 0;
    }

    .logo {
      position: absolute;
      top: 5pt;
      right: 10pt;
      text-align: right;
      color: #fff;
      z-index: 1;
    }

    .logo p {
      margin: 0;
      font-size: 10pt;
      font-weight: bold;
    }

    .logo img {
      width: 35px;
      height: 35px;
      margin-top: 2pt;
    }

    .nama {
      position: absolute;
      bottom: 25pt;
      right: 10pt;
      font-size: 11pt;
      font-weight: bold;
      color: #fff;
      z-index: 1;
    }

    .telepon {
      position: absolute;
      bottom: 15pt;
      right: 10pt;
      font-size: 9pt;
      color: #fff;
      z-index: 1;
    }

    .barcode {
      position: absolute;
      bottom: 10pt;
      left: 10pt;
      background: #fff;
      padding: 2pt;
      z-index: 1;
    }
  </style>
</head>
<body>
  <section>
    <div class="card-container">
      @foreach ($datamember as $key => $data)
        @foreach ($data as $item)
          <div class="card">
            <img src="{{ public_path($setting->path_kartu_member) }}" alt="card background" class="bg">
            <div class="logo">
              <p>{{ $setting->nama_perusahaan }}</p>
              <img src="{{ public_path($setting->path_logo) }}" alt="logo">
            </div>
            <div class="nama">{{ $item->nama }}</div>
            <div class="telepon">{{ $item->telepon }}</div>
            <div class="barcode">
              <img src="data:image/png;base64,{{ DNS2D::getBarcodePNG("$item->kode_member", 'QRCODE') }}" alt="qrcode" width="45" height="45">
            </div>
          </div>
        @endforeach
      @endforeach
    </div>
  </section>
</body>
</html>
