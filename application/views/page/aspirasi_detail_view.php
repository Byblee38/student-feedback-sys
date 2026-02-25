<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="callout callout-info">
               <strong><i class="fas fa-book mr-1"></i> Tanggal</strong>
               <p class="text-muted"><?= date('d-m-Y', strtotime($data->tanggal)); ?></p>
               <hr>
               <strong><i class="fas fa-map-marker-alt mr-1"></i> Kategori</strong>
               <p class="text-muted"><?= $data->nama_kategori; ?></p>
               <hr>
               <strong><i class="far fa-file-alt mr-1"></i> Lokasi</strong>
               <p class="text-muted"><?= $data->lokasi; ?></p>
               <hr>
               <strong><i class="far fa-file-alt mr-1"></i> Keterangan</strong>
               <p class="text-muted"><?= $data->ket; ?></p>
            </div>

            <div class="card">
               <div class="card-header">
                  <h3 class="card-title">Status Penyelesaian</h3>
                  <div class="card-tools">
                     <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-default"><i class="nav-icon fas fa-plus"></i> Tambah</button>
                  </div>
               </div>
               <!-- /.card-header -->
               <div class="card-body p-0">
                  <table class="table table-striped">
                     <thead>
                        <tr>
                           <th>Tanggal</th>
                           <th>Feedback</th>
                           <th>Status</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($aspirasi as $a): ?>
                           <tr>
                              <td><?= date('d-m-Y', strtotime($a->tanggal)); ?></td>
                              <td><?= $a->feedback; ?></td>
                              <td><?= $a->status; ?>
                              </td>
                           </tr>
                        <?php endforeach; ?>
                     </tbody>
                  </table>
               </div>
               <!-- /.card-body -->
            </div>
            <!-- /.card -->
         </div>
      </div>
   </div>
</section>
<!-- /.content -->

<div class="modal fade" id="modal-default">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Tambah Feedback</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url(); ?>Aspirasi/add" method="post">
            <div class="modal-body">
               <div class="form-group">
                  <label for="id_pelaporan">ID Pelaporan</label>
                  <input type="text" name="info" value=<?= $data->id_pelaporan; ?> disabled class="form-control" required>
                  <input type="hidden" name="id_pelaporan" value=<?= $data->id_pelaporan; ?> class="form-control" required>
               </div>
               <div class="form-group">
                  <label for="tanggal">Tanggal</label>
                  <?php
                  $now = date('d-m-Y');
                  ?>
                  <input type="text" name="tanggal" value="<?php echo htmlspecialchars($now); ?>" disabled class="form-control">
               </div>
               <div class="form-group">
                  <label for="feedback">Feedback</label>
                  <textarea name="feedback" rows="3" class="form-control" required></textarea>
               </div>
               <div class="form-group">
                  <label for="status">Status</label>
                  <select name="status" class="form-control" required>
                     <option value="Menunggu">Menunggu</option>
                     <option value="Proses">Proses</option>
                     <option value="Selesai">Selesai</option>
                  </select>
               </div>
            </div>
            <div class="modal-footer justify-content-between">
               <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
               <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
         </form>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>