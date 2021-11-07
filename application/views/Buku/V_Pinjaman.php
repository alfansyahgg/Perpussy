<div class="container-fluid">
	<div class="card mb-4">
		<div class="card-header bg-gray-400">
			 <div>
			 <h4 class="m-0 font-weight-bold text-primary" style="float: left;">Tabel Pinjaman Buku</h4>
			 <a href="<?= base_url('C_Buku/windowTambahBuku') ?>" class="btn btn-success btn-split" style="float: right;">
			 <span class="icon text-white-50">
				<i class="fas fa-plus"></i>
			 </span>
			<!-- <span class="text">Tambah Daftar Buku</span> -->
			</a>
			 </div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="tbl_buku" width="100%">
					<thead>
					<tr>
						<th>No</th>
						<th>Action</th>
						<th>Nomor Buku</th>
						<th>Judul Buku</th>
						<th>Peminjam</th>						
						<th>Tanggal Pinjam</th>				
						<th>Tanggal Kembali</th>		
						<th>Status</th>
					</tr>
					</thead>
					<tbody id="tbl_body">
				
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>