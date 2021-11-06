<?php foreach($detailBuku as $detail): ?>
<div class="container-fluid">
	<div class="card mb-4">
		<div class="card-header bg-gray-400 mb-4">
			 <div>
             <h4 class="m-0 font-weight-bold text-primary" style="float: left;"><?= $detail->judul_buku ?></h4></span>
						 <?php if ($this->session->status == 'admin'): ?>
	             <button onclick="location.href = '<?php echo base_url(); ?>C_Buku/windowEditBuku/<?= $detail->id ?>' " style="float: right" class="btn btn-success">
	                    <span class="icon text-white-50">
								<i class="fas fa-info-circle"></i>
							</span>
							<span class="text">Edit Buku</span>
	            </button>
						 <?php endif; ?>
			 </div>
		</div>
		<div class="card-body">
            <div align="center" class="mb-4">
                <img style="width:200px;height:300px;" src="<?= base_url('assets/images/buku/').$detail->cover_buku ?>" />
            </div>

            <div class="table-responsive mb-4">
                <table class="table table-bordered table-striped mb-4">
                    <tr>
                        <td style="width: 10%">Judul</td><td style="width: 3%;text-align: center">:</td><td><?= $detail->judul_buku ?></td>
                    </tr>
                    <tr>
                        <td style="width: 10%">Pengarang</td><td style="width: 3%;text-align: center">:</td><td><?= $detail->pengarang ?></td>
                    </tr>
                    <tr>
                        <td style="width: 10%">Tanggal Rilis</td><td style="width: 3%;text-align: center">:</td><td><?= $detail->tanggal_rilis ?></td>
                    </tr>
                    <tr>
                         <td style="width: 10%">Keterangan</td><td style="width: 3%;text-align: center">:</td><td><?= $detail->keterangan_buku ?></td>
                    </tr>
                    <tr>
                         <td style="width: 10%">Sinopsis</td><td style="width: 3%;text-align: center">:</td><td><?= $detail->sinopsis_buku ?></td>
                    </tr>
                </table>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <button class="btn btn-success">
                        <span class="icon text-white-50">
							<i class="fas fa-flag"></i>
						</span>
						<span class="text">Tambah ke Pinjaman Saya</span>
                    </button>
                    <button class="btn btn-primary">
                        <span class="icon text-white-50">
							<i class="fas fa-info-circle"></i>
						</span>
						<span class="text">Wikipedia</span>
                    </button>
                </div>
            </div>
		</div>
	</div>
</div>
<?php endforeach; ?>
