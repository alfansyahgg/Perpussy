<!-- Begin Page Content -->
       <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Buku</h1>
          </div>

        <div class="content" style="margin: 10px;">
        	<?php
			//Columns must be a factor of 12 (1,2,3,4,6,12)
			$numOfCols = 4;
			$rowCount = 0;
			$bootstrapColWidth = 12 / $numOfCols;
			?>

        	 <div class="row" >
        	 	<?php
					foreach ($dataBuku['buku'] as $row){	
					?>   <div class="col-md-<?php echo $bootstrapColWidth; ?>">
					            <div class="col-md-12">
				          			<div class="card">
				          				<center>
										  <img style="height: 200px;width: 200px;" src="<?php echo base_url('assets/images/buku/').$row->cover_buku; ?>" class="card-img-top" alt="..."></center>
										  <div class="card-body" style="max-height: 300px;">
										    <h5 class="card-title"><?= $row->judul_buku ?></h5>
										    <p class="card-text"><?= substr($row->keterangan_buku,0,100) ?></p>
										    <a href="#" class="btn btn-primary">Go somewhere</a>
										  </div>
										</div>
				          		</div>
					        </div>
					<?php
					    $rowCount++;
					    if($rowCount % $numOfCols == 0) echo '</div><div class="row" style="margin-top: 10px;margin-bottom: 10px;">';
					}
					?>

          	</div>

          		<div align="center"><button class="btn btn-success btn-split">Load More</button></div>
        </div>  <!-- end content -->

           </div>
        <!-- /.container-fluid -->