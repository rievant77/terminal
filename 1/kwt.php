<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Cetak Semua SK</title>
  <style>
    @media print {

      .no-print,
      .no-print * {
        display: none !important;
      }
    }
  </style>
</head>

<body>
  <div align="right"><button class="no-print" onclick="window.print();">Cetak</button></div>
  <?php
  include('../koneksi.php');
  $queryangkutan = mysqli_query($konek, "select * from angkutan WHERE id = '" . $_GET['id'] . "'");
  while ($row = mysqli_fetch_array($queryangkutan)) {
    ?>
    <table width="800" align="center">
      <tr>
        <td align="justify"><img src="../aset/foto/sugih.jpg" width="100" height="100" /></td>
        <td colspan="3" align="center">
          <h3>PEMERINTAH KABUPATEN CIANJUR<br></h3>
          <h2>DINAS PERUBUNGAN<br></h2>
          <h3>UPTD TERMINAL PASIR HAYAM<br></h3>
          Jl. Paris Hayam Kabupaten Cianjur</a></h3>
          <hr>
        </td>
      </tr>
      <tr>
        <td colspan="4">
          <div align="justify">
            <br>
            <p>Dasar : <br>
              1. Undang-undang Republik Indonesia Nomor 22 Tahun 2009 Tentang Lalu Lintas dan Angkutan Jalan; <br>
              2. Peraturan Pemerintah Republik Indonesia Nomor 37 Tahun 2017 Tentang Keselamatan Lalu Lintas dan Angkutan Jalan.</br>
              <p><br />
              </p>
          </div>
        </td>
      </tr>
      <tr>
        <td width="107">&nbsp;</td>
        <td width="129">No Kendaraan</td>
        <td colspan="2">: <?php echo $row[1] ?> </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Nama</td>
        <td colspan="2">: <?php echo $row[3] ?> </td>
      </tr>
      <tr>
        <td colspan="4">
          <div align="justify">
            <p>&nbsp;</p>
            <p>Sehubungan dengan tidak lengkapnya kelengkapan kendaraan..................... <br>
              Kendaraan initidak diijinkan untuk beriprasi selama kelengkapan tersebut belum terpenuhi.</p>
            <p>Demikian surat teguran ini dikeluarkan, agar dapat dilaksanakan.</p>
          </div>
        </td>
      </tr>

      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td width="223">&nbsp;</td>
        <td width="321" Align="center">
          <br>
          <br>
          <br>
          <br>
          <p>Cianjur,............... <br />
            Kepala UPTD Terminal<br>
            Angkutan Umum Pasirhayam</p>
          <p>&nbsp;</p>
          <p> <br />
            BAMBANG R.S. DALIMUNTHE, SH <br>
            NIP.19700222 199303 1002</p>
        </td>
      </tr>
    </table>
    <br>
    <br>
    <p style="page-break-after:always;"></p>

  <?php
  }
  ?>
</body>

</html>