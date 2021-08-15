 <script>
$(document).ready(function(){
    // Sembunyikan alert validasi kosong
    $("#kosong").hide();
  });
  </script>
  

  <div class="content-wrapper">
  <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>Tentukan<small>Seleksi Karyawan </small></h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Home > Halaman Seleksi</a></li>
        </ol>
      </section>
            <section class="content">
                <div class="row">
                  <div class="col-md-4">
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <div class="card card-widget widget-user">
                      <div class="widget-user-header text-white"
                          style="background: url('<?php echo base_url().'assets/dist/img/q.png'; ?>') center center;">
                        <h3 class="widget-user-username text-center">Masukan Daftar Karyawan</h3>
                      </div>
                      <div class="widget-user-image">
                        <img class="img-circle" src="<?php echo base_url().'assets/dist/img/carfix1.png'; ?>" alt="User Avatar">
                      </div>
                      <div class="card-footer">
                        <div class="row"> 
                          <form method="post" action="<?php echo base_url("tentukan_bantuan/form"); ?>" enctype="multipart/form-data">
                            <div class="row">
                              <div class="col-xs-5"></div>
                                <div class="col-xs-2">
                                    <input type="file" name="file">
                                </div>
                              </div>
                                  <br>
                                <div class="row">
                                  <div class="col-md-4">
                                  </div>
                                    <div class="col-md-8">
                                        <button class="btn btn-outline-info btn-block" type="submit"  name="preview"><i class="fa fa-recycle"></i> Seleksi Karyawan </button>
                                    </div>
                                  </div>
                            </div>
                            <br/>
                        </form>
                      </div>
                    </div>
                    <!-- /.widget-user -->
                  </div>
                  <!-- /.col -->
                    <div class="col-md-4">
                    </div>
              </div>
            </section>

                <section class="content">
                  <div class="row">
                    <div class="col-md-12">
                       <div class="box box-primary">
                          <div class="box-header with-border">
                          <h3 class="box-title">Data Hasil Seleksi</h3> 
                          <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                          </div>
                      </div>
                      <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                              <!-- isi Prediksi -->
                              <?php
                                if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form 
                                  if(isset($upload_error)){ // Jika proses upload gagal
                                    echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
                                    die; // stop skrip
                                  }
                                  
                                  // Buat sebuah div untuk alert validasi kosong
                                  echo "<div style='color: red;' id='kosong'>
                                  Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
                                  </div>";
                                  // Buat sebuah tag form untuk proses import data ke database
                                  echo "<form id='form-save' method='post' action=''";
                                  
                                  
                                  echo "<table border='1' cellpadding='8'>
                                  <tr>
                                   <div class='box-body'>
                                    <div class='table-responsive'>
                                    <table class='table table-bordered table-striped' id='example2'>
                                  <th colspan='17'>Tampil Data Prediksi</th>
                                  </tr>
                                  <tr class='bg-purple'>
                                      <th>NIK</th>
                                      <th>Nama Karyawan</th>
                                      <th>Absensi</th>
                                      <th>Skill</th>
                                      <th>Pelayanan</th>
                                      <th>Kerjasama</th>
                                      <th>Loyalitas</th>
                                      <th>Komunikasi</th>
                                      <th>Kerajinan</th>
                                      <th style= 'color: yellow';>Nilai LoLos</th>
                                      <th style= 'color: yellow';>Nilai.T.Lolos</th>
                                      <th style='color: orange;'>Hasil </th>
                                  </tr>";
                                  
                                  $numrow = 1;
                                  $kosong = 0;
                                  
                                  // Lakukan perulangan dari data yang ada di excel
                                  // $sheet adalah variabel yang dikirim dari controller
                                  foreach($sheet as $row){ 
                                    // Ambil data pada excel sesuai Kolom
                                    $NIK = $row['A']; 
                                    $nama = $row['B']; 
                                    $absensi = $row['C']; 
                                    $skill = $row['D']; 
                                    $pelayanan = $row['E'];
                                    $kerjasama = $row['F'];
                                    $loyalitas = $row['G'];
                                    $komunikasi = $row['H'];
                                    $kerajinan = $row['I'];

                                    $naive->data_set(
                                      $absensi,
                                      $skill,
                                      $pelayanan,
                                      $kerjasama,
                                      $loyalitas,
                                      $komunikasi,
                                      $kerajinan);

                                    $perhitungan = $naive->mining();
                                    // Cek jika semua data tidak diisi
                                    if(empty($NIK) && empty($nama) && empty($absensi) && empty($skill) && empty($pelayanan) && empty($kerjasama) && empty($loyalitas) && empty($komunikasi) && empty($kerajinan))
                                      continue; // Tambah 1 variabel $kosong
                                    
                                  
                                    if($numrow > 1)
                                    {
                                      // Validasi apakah semua data telah diisi
                                      $NIK_td = ( ! empty($NIK))? "" : " style='background: #E07171;'"; 
                                      $nama_td = ( ! empty($nama))? "" : " style='background: #E07171;'";
                                      $absensi_td = ( ! empty($absensi))? "" : " style='background: #E07171;'"; 
                                      $skill_td = ( ! empty($skill))? "" : " style='background: #E07171;'"; 
                                      $pelayanan_td = ( ! empty($pelayanan))? "" : " style='background: #E07171;'"; // 
                                      $kerjasama_td = ( ! empty($kerjasama))? "" : " style='background: #E07171;'"; 
                                      $loyalitas_td = ( ! empty($loyalitas))? "" : " style='background: #E07171;'"; 
                                      $komunikasi_td = ( ! empty($komunikasi))? "" : " style='background: #E07171;'"; 
                                      $kerajinan_td = ( ! empty($kerajinan))? "" : " style='background: #E07171;'";  
                                      
                                      // Jika salah satu data ada yang kosong
                                          if(empty($NIK) or empty($nama) or empty($absensi) or empty($skill) or empty($pelayanan) or empty($kerjasama) or empty($loyalitas) or empty($komunikasi) or empty($kerajinan)){
                                              $kosong++;
                                    }
                                      echo "<tr>";
                                      echo "<td".$NIK_td.">".$NIK."<input type='hidden' name='NIK[]' value='$NIK'/> </td>";
                                      echo "<td".$nama_td.">".$nama."<input type='hidden' name='nama[]' value='$nama'/></td>";
                                      echo "<td".$absensi_td.">".$absensi."<input type='hidden' name='absensi[]' value='$absensi'/></td>";
                                      echo "<td".$skill_td.">".$skill."<input type='hidden' name='skill[]' value='$skill'/></td>";
                                      echo "<td".$pelayanan_td.">".$pelayanan."<input type='hidden' name='pelayanan[]' value='$pelayanan'/></td>";
                                      echo "<td".$kerjasama_td.">".$kerjasama."<input type='hidden' name='kerjasama[]' value='$kerjasama'/></td>";
                                      echo "<td".$loyalitas_td.">".$loyalitas."<input type='hidden' name='loyalitas[]' value='$loyalitas'/></td>";
                                      echo "<td".$komunikasi_td.">".$komunikasi."<input type='hidden' name='komunikasi[]' value='$komunikasi'/></td>";
                                      echo "<td".$kerajinan_td.">".$kerajinan."<input type='hidden' name='kerajinan[]' value='$kerajinan'/></td>";
                                      echo "<td style= 'color: red';>".round($perhitungan['nilai']['Lolos'], 6)."<input type='hidden' name='nilai_lolos[]' value='".round($perhitungan['nilai']['Lolos'], 5)."'/></td>";
                                      echo "<td style= 'color: red';>".round($perhitungan['nilai']['Tidak Lolos'], 6)."<input type='hidden' name='nilai_tlolos[]' value='".round($perhitungan['nilai']['Tidak Lolos'], 5)."'/></td>";
                                      echo "<td style= 'color: blue';>".$perhitungan['Status']."<input type='hidden' name='hasil[]' value='".$perhitungan['Status']."'/></td>";
                                      echo "</tr>";
                                    }
                                    $numrow++;
                                  }
                                  
                                  echo "</table>";
                                  
                                  // Cek apakah variabel kosong lebih dari 0
                                  // Jika lebih dari 0, berarti ada data yang masih kosong
                                  if($kosong > 0){
                                  ?>  
                                    <script>
                                    $(document).ready(function(){
                                      // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
                                      $("#jumlah_kosong").html('<?php echo $kosong; ?>');
                                      
                                      $("#kosong").show(); // Munculkan alert validasi kosong
                                    });
                                    </script>
                                  </div>
                                  </div>
                                  <?php
                                  }else{ // Jika semua data sudah diisi
                                    echo "<hr>";
                                    
                                    // Buat sebuah tombol untuk mengimport data ke database
                                    echo "<button type='submit' class='btn bg-olive'> <i class='fa fa-rocket'>  Simpan Seleksi</i></button>";
                                    echo " ";
                                    echo "<a href='".base_url("tentukan_bantuan")."'class='btn bg-orange'> <i class='fa fa-times-circle'> Cancel </i></a>";
                                    echo " <br>";
                                    echo " <br>";
                                    // echo "<button type='button' name='save' id='save' class='btn btn-info'>Simpan</button>";
                                  }
                                  echo "</form>";
                                }
                                ?>
                              <!-- Akhir isi Prediksi -->
                            <div id="insert_item_data"></div>
                            </table>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </section>
        </div>
</div>
<!-- Kirim HRD -->
<script>
  $(document).ready(function(){
    
    $('.bg-olive').click(function(e){
      e.preventDefault();
      $.ajax({
        url:"<?php echo base_url().'tentukan_bantuan/kirimHRD/'; ?>",
        data:$('#form-save').serialize(),
        method:'POST',
        success:function(data){
          console.log(data);
          swal("sukses","Data Berhasil Di Kirim Ke HRD", "success");
        },
        error:function(data){
          swal("Oops....", "Data Gagal Di Kirim (NIP Sudah Diseleksi) :(", "error");
        }

      }).fail(function(t, j){
      
      });
    });
      
  });

</script>