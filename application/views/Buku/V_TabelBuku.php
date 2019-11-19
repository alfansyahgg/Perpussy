<?php if(!empty($this->session->flashdata('tambah'))){
	if($this->session->flashdata('tambah') == 'berhasil'){ ?>
	<script>
	$(document).ready(function(){
		Swal.fire('Berhasil','Berhasil Menambahkan Data','success')
	})
	</script>
<?php }else{ ?>
	<script>
	$(document).ready(function(){
		Swal.fire('Gagal','Gagal Menambahkan Data','error')
	})
	</script>
<?php } ?>
<?php } ?>
<div class="container-fluid">
	<div class="card mb-4">
		<div class="card-header bg-gray-400">
			 <div>
			 <h4 class="m-0 font-weight-bold text-primary" style="float: left;">Tabel Buku</h4>
			 <a href="<?= base_url('C_Buku/windowTambahBuku') ?>" class="btn btn-success btn-split" style="float: right;">
			 <span class="icon text-white-50">
				<i class="fas fa-plus"></i>
			 </span>
			<span class="text">Tambah Daftar Buku</span>
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
						<th>Keterangan Buku</th>
						<th>Sinopsis Buku</th>
						<th>Cover Buku</th>
					</tr>
					</thead>
					<tbody id="tbl_body">
				<?php $no=0; foreach ($tabelBuku as $key => $value) : $no++; ?>
					<tr>
					<td style="width: 3%"><?= $no; ?></td>
					<td style="white-space: nowrap;width: 10%;">
					<a href="<?php echo base_url('C_Buku/windowEditBuku/').$value->id; ?>" class="btn btn-primary">Edit</a>
					<button data-id="<?= $value->id ?>" class="btn btn-warning btn-delete">Delete</button>
					</td>
					<td style="width: 5%;"><?= $value->no_buku ?></td>
					<td><?= $value->judul_buku ?></td>
					<td style="width: 30%;"><?= $value->keterangan_buku ?></td>
					<td style="width: 30%;"><?= substr($value->sinopsis_buku,0,500) ?></td>
					<td style="width: 10%;">
					<center>
						<img style="width: 150px;height: 100%" src="<?= base_url('assets/images/buku/').$value->cover_buku ?>">
					</center>
					</td>
					</tr>
				<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		
		
		// function show_data(){
		// 	$.ajax({
		// 		url: '<?php echo base_url(); ?>C_Buku/getDataBukuAll',
		// 		type: 'POST',
		// 		dataType: 'json',
		// 		success: function(response){
		// 			var i;
		// 			var html = "";
		// 			var no = 0;
		// 			console.log(response);
		// 			for(i=0;i < response.length;i++){
		// 				no++;
		// 				html =  html 	+ 	'<tr>'
		// 								+	'<td>' + no + '</td>'
		// 								+	'<td style="white-space: nowrap">' 
		// 								+	'<a class="btn btn-primary" href="<?php echo base_url(); ?>C_Buku/editBuku/'+response[i].id+'">Edit</a>' 
		// 								+	'<button class="btn btn-danger btn-delete">Delete</button>'
		// 								+ 	'</td>'
		// 								+	'<td>' + response[i].no_buku + '</td>'
		// 								+	'<td>' + response[i].judul_buku + '</td>'
		// 								+	'<td>' + response[i].keterangan_buku + '</td>'
		// 								+	'<td style="width:30%;">' + response[i].sinopsis_buku + '</td>'
		// 								+	'<td>' 
		// 								+ 	'<center>' 
		// 								+ 	'<img style="width: 150px;height: 200px;" src="<?= base_url() ?>assets/images/buku/'+response[i].cover_buku+'" />'
		// 								+	'</center>'
		// 								+ 	'</td>'
		// 								+	'</tr>';
		// 			}
		// 			$("#tbl_body").html(html);
		// 		}
		// 	});
		// }

	});
</script>