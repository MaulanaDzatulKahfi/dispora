<!DOCTYPE html>
<html lang="id">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>surat permohonan</title>

    <style>
        body{
            margin: 2,54cm, 2,75cm, 2,54cm, 3,17cm;
        }
        .judul{
            font-size: 14;
            font-weight: 500;
        }
        .tujuan{
            font-size: 11;
            text-align: justify;
            font-weight: 500;
            display: block;
        }
        .right{
            float: right;
            width: 140;
            height: 100;
            display: block;
        }
        .container{
            font-size: 12;
        }
        .tab{
            margin-left: 28;
        }
        .box{
            margin-left: 45;
        }
        .fs-10{
            font-size: 10;
        }
        .sub {
            margin-left: 16;
            padding-left: 0;
            list-style-type: decimal;
        }
        .primary{
            margin-left: 0;
            padding-left: 0;
            list-style-type: upper-alpha;
        }
        .ttd{
            width: 230;
            float:right;
            text-align: center;
        }
        i{
            color: blue;
        }
    </style>
</head>
<body>
    <center class="judul">
        <u>
            SURAT PERMOHONAN BEASISWA
        </u>
    </center>
    <br><br>
    <div class="right">
        <div class="tujuan">
            Kepada Yth. <br>
            Bupati Bogor <br>
            C.q Ketua TKPBP <br>
            di <br>
            &nbsp;&nbsp;CIBINONG
        </div>
    </div>
    <br><br><br><br><br><br>

    <div class="container">
        <div class="hormat">
            <div class="tab">
                Dengan Hormat, <br>
                Berdasarkan informasi yang saya terima melalui pengumuman pada situs
            </div>
            <i><u>http://beasiswapancakarsa.bogorkab.go.id</u></i> tentang pemberian Beasiswa
             Pancakarsa Tahun 2021, saya yang bertandatangan di bawah ini :
        </div>
    </div>
    <br>

    <div class="tab">
        <table>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{ $peserta->datadiri->nama }}</td>
            </tr>
            <tr>
                <td>NIK</td>
                <td>:</td>
                <td>{{ $peserta->datadiri->nik }}</td>
            </tr>
            @if($peserta->status_mhs == 'baru')
            <tr>
                <td>NISN</td>
                <td>:</td>
                <td>{{ $peserta->nisn }}</td>
            </tr>
            <tr>
                <td>Asal Sekolah</td>
                <td>:</td>
                <td>{{ $peserta->asal_sekolah }}</td>
            </tr>
            <tr>
                <td>Tahun Kelulusan</td>
                <td>:</td>
                <td>{{ $peserta->lulus_tahun }}</td>
            </tr>
            @endif
            @if($peserta->status_mhs == 'aktif')
            <tr>
                <td>NIM</td>
                <td>:</td>
                <td>{{ $peserta->prestasi->nim }}</td>
            </tr>
            <tr>
                <td>Perguruan Tinggi</td>
                <td>:</td>
                <td>{{ $peserta->perting->name }}</td>
            </tr>
            <tr>
                <td>Fakultas/Departemen</td>
                <td>:</td>
                <td>{{ $peserta->fakultas->name }}</td>
            </tr>
            <tr>
                <td>Jurusan/Program Studi</td>
                <td>:</td>
                <td>{{ $peserta->jurusan->name }}</td>
            </tr>
            <tr>
                <td>Semester saat ini</td>
                <td>:</td>
                <td>Semester {{ $peserta->prestasi->semester }}</td>
            </tr>
            <tr>
                <td>IPK (minimal IPK 3,50)</td>
                <td>:</td>
                <td>{{ $peserta->prestasi->ipk }}</td>
            </tr>
            <tr>
                <td class="fs-10">(sesuai bukti Transkrip Nilai)</td>
            </tr>
            @endif
        </table>
    </div><br>

    <div class="tab">
        Bersama ini saya mengajukan Permohonan Beasiswa Pancakarsa tahun 2021.
    </div>
    <div>
        Sebagai pertimbangan saya lampirkan melalui unggahan (upload) berkas persyaratan yang telah ditentukan yaitu :
    </div>

    <div class="tab">
        <ul class="sub">
            <li>Formulir Pendaftaran,</li>
            <li>Pasfoto berwarna 4x6,</li>
            <li>Foto copy Akta Kelahiran,</li>
            <li>KTP/KIA,</li>
            <li>Kartu Keluarga/Surat Keterangan Domisili.</li>
        </ul>
    </div>
    @if($peserta->status_mhs == 'baru')
        <div class="tujuan tab">
            <li class="primary">Khusus Calon Mahasiswa Baru saya lampirkan sebagai berikut :</li>
        </div>
        <div class="tab">
            <ul class="sub">
                <li>SKHUN dan Ijazah;</li>
                <li>Surat Pengantar Permohonan Beasiswa dari Sekolah Asal untuk lulusan tahun ajaran 2020/2021;</li>
                <li>Tanda Lulus SNMPTN atau SBMPTN dan/atau Surat Telah Diterima di Perguruan Tinggi Negeri (khusus pendaftar ke PTN);</li>
                <li>Surat Pernyataan Tidak Sedang Menerima Beasiswa dari Pihak Lain;</li>
            </ul>
        </div>
    @endif
    @if($peserta->status_mhs == 'aktif')
        <div class="tujuan tab">
            <li class="primary">Khusus Mahasiswa Aktif saya lampirkan sebagai berikut :</li>
        </div>
        <div class="tab">
            <ul class="sub">
                <li>Surat Keterangan Aktif Kuliah dari Perguruan Tinggi</li>
                <li>Transkrip Nilai pada semester terkini</li>
                <li>Surat Pernyataan Tidak Sedang Menerima Beasiswa dari Pihak Lain;</li>
            </ul>
        </div>
    @endif
    <div class="penutup">
        <div class="tab">
            @if($peserta->status_mhs == 'baru') <br><br><br>@endif
            @if($peserta->status_mhs == 'aktif') <br>@endif
            Dengan ini saya menjamin keabsahan data dan dokumen yang saya lampirkan.
        </div>
        Seluruh data dan dokumen dapat diakses dan digunakan oleh TKPBP dalam fungsinya melaksanakan seleksi dan pengelolaan penyaluran beasiswa Pancakarsa.
        <div class="tab">
            Demikian permohonan beasiswa ini saya buat dengan sebenarnya semoga dapat
        </div>
        menjadi pertimbangan. Terimakasih.
    </div><br>
    <div class="ttd">
        Kab/Kota Bogor, Tanggal {{ date('d F  Y') }} <br><br>
        <div class="tujuan ttd">
            Hormat Saya,<br>
            Pemohon
            <br><br><br><br><br><br>

            (   {{ $peserta->datadiri->nama }}   )
        </div>
    </div>

</body>
</html>
