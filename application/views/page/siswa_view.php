<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Siswa</h3>
            <div class="card-tools">
            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-default"><i class="nav-icon fas fa-plus"></i> Tambah</button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th style="width: 10px">No</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Jenis Kelamin</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; ?>
                <?php foreach($data as $row): ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $row->nis; ?></td>
                    <td><?= $row->nama; ?></td>
                    <td><?= $row->kelas; ?></td>
                    <td><?= $row->jenis_kelamin; ?></td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-<?= $row->nis; ?>"><i class="nav-icon fas fa-edit"></i> Ubah</button>
                        <a href="<?= base_url(); ?>Siswa/delete/<?= $row->nis; ?>" class="btn btn-danger btn-sm"><i class="nav-icon fas fa-trash"></i> Hapus</a>
                    </td>
                </tr> 
                <!-- untuk menampilkan data yang mau di edit -->
                <div class="modal fade" id="modal-<?= $row->nis; ?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Ubah Siswa</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url(); ?>Siswa/edit" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="nis">NIS</label>
                                        <input type="text" name="nis" value="<?= $row->nis; ?>" class="form-control" required>
                                        <input type="hidden" name="old_nis" value="<?= $row->nis; ?>" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap</label>
                                        <input type="text" name="nama" value="<?= $row->nama; ?>" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="kelas">Kelas</label>
                                        <input type="text" name="kelas" value="<?= $row->kelas; ?>" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label><br>
                                        <input type="radio" name="jenis_kelamin" value="Laki-laki" <?= $row->jenis_kelamin == 'Laki-laki' ? 'checked' : '' ?> required> Laki-laki
                                        <input type="radio" name="jenis_kelamin" value="Perempuan" <?= $row->jenis_kelamin == 'Perempuan' ? 'checked' : '' ?> required> Perempuan
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                 <?php $no++; ?>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            
        </div>
    <!-- /.card-footer-->
    </div>
    <!-- /.card -->
</section>

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Siswa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url(); ?>Siswa/add" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">NIS</label>
                        <input type="text" name="nis" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Kelas</label>
                        <input type="text" name="kelas" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label><br>
                        <input type="radio" name="jenis_kelamin" value="Laki-laki" required> Laki-laki
                        <input type="radio" name="jenis_kelamin" value="Perempuan" required> Perempuan
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
<!-- /.modal -->