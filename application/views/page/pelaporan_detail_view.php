<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="callout callout-info">
          <strong><i class="fas fa-book mr-1"></i> Tanggal</strong>
          <p class="text-muted"><?= $data->tanggal; ?></p>
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
                <tr>
                  <td>1.</td>
                  <td>Update software</td>
                  <td>
                    <div class="progress progress-xs">
                      <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                    </div>
                  </td>
                </tr>
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