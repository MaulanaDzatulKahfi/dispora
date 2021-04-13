<!DOCTYPE html>
<html lang="id">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>surat permohonan</title>

    <style>
        body{
            margin: 2,54cm, 2,75cm, 2,54cm, 3,17cm;
        }
        .tujuan{
            font-size: 11;
            text-align: justify;
            font-weight: 900;
            margin-left: 100;
        }
        .container{
            font-size: 12;
        }
        .tab{
            margin-left: 28;
        }
        .right{
            width: 230;
            float:right;
        }
        i{
            color: blue;
        }
        .text-left{
            text-align: left;
        }
        .ttd{
            width: 230;
            float:right;
        }
        .center{
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="right">
            <center>
                Kab/Kota Bogor, Tanggal {{ date('d F  Y') }} <br><br>
            </center>
            <div class="tujuan">
                <table>
                    <tr>
                        <td>Kepada Yth.</td>
                    </tr>
                    <tr>
                        <td>Bupati Bogor</td>
                    </tr>
                    <tr>
                        <td>C.q Ketua TKPBP</td>
                    </tr>
                    <tr>
                        <td>di</td>
                    </tr>
                    <tr>
                        <td>&nbsp;&nbsp;CIBINONG</td>
                    </tr>
                </table>
            </div>
        </div><br><br>
        <div>
            <table>
                <tr>
                    <td>Nomor</td>
                    <td>:</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Lampiran</td>
                    <td>:</td>
                    <td>1 (satu) berkas</td>
                </tr>
                <tr>
                    <td>Perihal</td>
                    <td>:</td>
                    <td>Usulan Beasiswa</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>Pancakarsa Tahun 2021 </td>
                </tr>
            </table>
        </div><br><br>

        <div>
            <div class="tab">
                Dengan Hormat, <br>
                Berdasarkan informasi yang saya terima melalui pengumuman pada situs
            </div>
            <i><u>http://beasiswapancakarsa.bogorkab.go.id</u></i> tentang pemberian Beasiswa
             Pancakarsa Tahun 2021, saya yang bertandatangan di bawah ini :
             <div class="tab"><br>
                <table>
                    <tr>
                        <td width="50">Nama</td>
                        <td width="5">:</td>
                        <td>{{ $petugas->name }}</td>
                    </tr>
                    <tr>
                        <td>NIP</td>
                        <td>:</td>
                        <td>{{ $petugas->nip }}</td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td>:</td>
                        <td>{{ $petugas->jabatan }}</td>
                    </tr>
                </table><br>
             </div>
        </div>

        <div>
            <div class="tab">
                Bersama ini saya bermaksud mengajukan Permohonan Beasiswa Pancakarsa
            </div>
            Tahun 2021 untuk sejumlah {{ count($peserta) }} orang siswa lulusan tahun ajaran 2020/2021 sebagaimana tercantum di bawah ini.
        </div><br>

        <div>
            <center>
                <b>SISWA PEMOHON BEASISWA PANCAKARSA TAHUN 2021</b><br>
            </center><br>
            <table border="1" cellpadding="10" cellspacing="0" style="margin-left: auto; margin-right: auto;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Siswa</th>
                        <th>NISN</th>
                    </tr>
                </thead>
                @foreach($peserta as $p)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->datadiri->nama }}</td>
                    <td>{{ $p->nisn }}</td>
                </tr>
                @endforeach
            </table>
        </div><br>
        <div>
            <div class="tab">
                Dengan ini saya menjamin kebenaran data dan dokumen masing-masing siswa
            </div>
            sebagai syarat pendaftaran sebagaimana terlampir.
            <div class="tab">
                Demikian permohonan beasiswa ini dibuat dengan sebenar-benarnya, untuk dapat
            </div>
            menjadi pertimbangan, Terimakasih.
        </div><br>

        <div class="ttd">
            <center>
                <b>{{ $petugas->jabatan }},</b>
            </center>
            <br><br><br><br><br>
            <div>
                <div class="center">
                    <b><u>{{ $petugas->name }}</u></b><br>
                    <b class="text-left">NIP. {{ $petugas->nip }}</b>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
