<section class="content">
	<!-- Default box -->
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Data Kategori</h3>

			<div class="card-tools">
				<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-default"><i class="nav-icon fas fa-plus"></i> Tambah</button>
			</div>
		</div>
		<div class="card-body">
			<table class="table table-striped">
				<thead>
					<tr>
						<th style="width: 10px">No</th>
						<th>Nama Kategori</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; ?>
					<?php foreach ($data as $row): ?>
						<tr>
							<td><?= $no; ?></td>
							<td><?= $row->nama_kategori; ?></td>
							<td>
								<button type="button" class="btn btn-primary btn-sm" class="nav-icon fas fa-edit" data-toggle="modal" data-target="#modal-<?= $row->id_kategori; ?>"></i> Ubah</button>
								<a href="<?= base_url(); ?>Kategori/delete/<?= $row->id_kategori; ?>" class="btn btn-danger btn-sm"><i class="nav-icon fas fa-trash"></i> Hapus</a>
							</td>
						</tr>
						<!-- untuk menampilkan data yang mau di edit -->
						<div class="modal fade" id="modal-<?= $row->id_kategori; ?>">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title">Ubah Kategori</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<form action="<?= base_url(); ?>Kategori/edit" method="post">
										<div class="modal-body">
											<div class="form-group">
												<label for="exampleInputEmail1">Nama Kategori</label>
												<input type="text" name="nama" value="<?= $row->nama_kategori; ?>" class="form-control" required>
												<input type="hidden" name="id" value="<?= $row->id_kategori; ?>" class="form-control" required>
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
				<h4 class="modal-title">Tambah Kategori</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url(); ?>Kategori/add" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="exampleInputEmail1">Nama Kategori</label>
						<input type="text" name="nama" class="form-control" required>
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