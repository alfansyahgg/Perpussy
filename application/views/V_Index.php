      
       <div class="container-fluid">
       <center><div id="cover"></div></center>
		  <!-- Page Heading -->
		  <div class="col-lg-4">
			  <div class="col-lg-12">
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mb-0 text-gray-800">Daftar Buku</h1>
					</div>
			  </div>				
		  </div>
          

        <div class="content" style="margin: 10px;">

        	<?php
			//Columns must be a factor of 12 (1,2,3,4,6,12)
			$numOfCols = 3;
			$rowCount = 0;
			$bootstrapColWidth = 12 / $numOfCols;
			?>

        	 <div class="row row-content" >
        	 	<?php
					foreach ($dataBuku['buku'] as $row){	
					?>   <div class="col-lg-<?php echo $bootstrapColWidth; ?> col-content mb-4" data-id="<?= $row->id ?>">
					            <div class="col-lg-12 mb-4">
				          			<div class="card card-class">
				          				<center>
										  <img style="height: 100%;width: 60%;" src="<?php echo base_url('assets/images/buku/').$row->cover_buku; ?>" class="card-img-top img-cover" alt="<?php echo $row->judul_buku; ?>">
										</center>
										  <div class="card-body">
										    <h5 class="card-title"><a href="<?= base_url('C_Buku/lihatBuku/').$row->id; ?>"><?= $row->judul_buku ?></a></h5>
										    <p class="card-text"><?= substr($row->keterangan_buku,0,150).'....' ?></p>
										    <a href="<?= base_url('C_Buku/lihatBuku/').$row->id; ?>" class="btn btn-primary">Lihat Buku</a>
										  </div>
										</div>
				          		</div>
					        </div>
					<?php
					    $rowCount++;
					    if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
					}
					?>
					<div class="col-lg-12">
						<div class="col-lg-12">
								<div align="center"><button class="btn btn-lg btn-success btn-split btn-load-more">Load More</button></div>
						</div>
					</div>
					

          	</div>
          		
          	
          			
          </div>  <!-- end content -->

	   </div>
	<!-- /.container-fluid -->