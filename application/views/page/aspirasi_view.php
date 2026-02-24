<section class="content">
	<!-- Default box -->
	<div class="card">
		<div class="card-header">
			<h3 class="card-title">Data Admin</h3>
			<div class="card-tools">
				<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-default"><i class="nav-icon fas fa-plus"></i> Tambah</button>
			</div>
		</div>
		<div class="card-body">
			<table class="table table-striped">
				<thead>
					<tr>
						<th style="width: 10px">No</th>
						<th>Id Aspirasi</th>
						<th>Status</th>
						<th>Id Kategori</th>
						<th>Feedback</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; ?>
					<?php foreach ($data as $row): ?>
						<tr>
							<td><?= $no; ?></td>
							<td><?= $row->id_aspirasi; ?></td>
							<td><?= $row->status; ?></td>
							<td><?= $row->id_pelaporan; ?></td>
							<td><?= $row->feedback; ?></td>
						</tr>
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
				<h4 class="modal-title">Tambah Pelaporan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url(); ?>Pelaporan/add" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="exampleInputEmail1">Pilih Kategori</label>
						<select name="kategori" class="custom-select form-control-border" id="exampleSelectBorder">
							<?php foreach ($kategori as $row): ?>
								<option value="<?= $row->id_kategori; ?>"><?= $row->nama_kategori; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Lokasi</label>
						<input type="text" name="lokasi" class="form-control" required>
						<input type="hidden" name="nis" class="form-control" value="<?= $this->session->userdata('id'); ?>" required>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Keterangan</label>
						<textarea class="form-control" rows="3" placeholder="Enter ..." name="keterangan" required></textarea>
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