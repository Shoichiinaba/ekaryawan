<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Latih</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo site_url('Dashboard'); ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Data Latih</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                        <div class="card-header bg-lime disabled">
                            <h3 class="card-title">Data Master </h3>
                        </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead class="bg-teal">
                                        <tr>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Absensi</th>
                                        <th>Skill</th>
                                        <th>Pelayanan</th>
                                        <th>Kerjasama</th>
                                        <th>Loyalitas</th>
                                        <th>Komunikasi</th>
                                        <th>Kerajinan</th>
                                        <th class="bg-orange" >Status</th>
                                        <th width ='6%'>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-olive disabled">
                                        <?php $no= 0; foreach ($latih as $g ): $no++;?>
                                            <tr>
                                                <td><?php echo $no; ?></td> 
                                                <td><?php echo $g->NIK; ?></td>
                                                <td><?php echo $g->nama; ?></td>
                                                <td><?php echo $g->absensi; ?></td>
                                                <td><?php echo $g->skill; ?></td>
                                                <td><?php echo $g->pelayanan; ?></td>
                                                <td><?php echo $g->kerjasama; ?></td>
                                                <td><?php echo $g->loyalitas; ?></td>
                                                <td><?php echo $g->komunikasi; ?></td>
                                                <td><?php echo $g->kerajinan; ?></td>
                                                <td class="bg-orange"><?php echo $g->setatus; ?></td>
                                                <td>
                                                  <a type="button" data-toggle="modal" data-target="#modal-edit<?=$g->NIK;?>" class="btn bg-indigo btn-xs"  data-placement="top"  title="Edit"><i class="fa fa-spinner"></i></a>
                                                  <a href="<?php echo site_url('Data_latih/delete/'.$g->NIK); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');"type="button" class="btn bg-maroon btn-xs"  data-placement="top"  title="Hapus"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                </div>
                 <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
</div>