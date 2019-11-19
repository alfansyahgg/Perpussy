<div class="container-fluid">
	<div class="card mb-4">
		<div class="card-header bg-gray-400">
			 <div>
			 <h4 class="m-0 font-weight-bold text-primary" style="float: left;">Edit Buku</h4>
			 </div>
		</div>
        <div class="card-body" style="overflow-x: auto">
        <?php foreach($detailBuku as $detail): ?>
            <form method="post" action="<?= base_url('C_Buku/updateBuku/').$detail->id ?>" enctype="multipart/form-data">
				<div>
					<div class="form-group col-md-8">
						<label for="NoBuku" style="font-weight: bold">Nomor Buku</label>
						<input required type="number" class="form-control" name="no_buku" value="<?= $detail->no_buku; ?>"/>
					</div>
				</div>
                
				<div>
					<div class="form-group col-md-8">
						<label for="judulBuku" style="font-weight: bold">Judul Buku</label>
						<input required type="text" class="form-control" name="judul_buku" value="<?= $detail->judul_buku; ?>" />
					</div>
				</div>

				<div id="pengarang">
					<div class="form-group col-md-8">
						<label for="pengarangBuku" style="font-weight: bold">Pengarang</label>
						<input name="pengarang" type="text" class="form-control" value="<?= $detail->pengarang ?>" />
					</div>	
				</div>

				<div class="form-group col-md-8">
						<label for="tanggalRilis" style="font-weight: bold">Tanggal Rilis</label>
					<div class="input-group date datepicker" data-provide="datepicker">
						<input name="tanggal_rilis" type="text" class="form-control" value="<?= $detail->tanggal_rilis ?>">
						<div class="input-group-addon">
							<span class="glyphicon glyphicon-th"></span>
						</div>
					</div>
				</div>
				
					<div id="ketBuku">
						<div class="form-group col-md-8" v:if='seen'>
							<label for="ketBuku" style="font-weight: bold">Keterangan Buku</label>
							<textarea name="ket_buku" required v-model='message' @keyup='charCount()' class="form-control" rows="7" placeholder="Maks. 500 Karakter"></textarea>
							<span>{{ totalcharacter }} characters</span>
						</div>
					</div>	
					<div id="sinopsisBuku">
						<div class="form-group col-md-8">
							<label for="sinopsisBuku" style="font-weight: bold">Sinopsis Buku</label>
							<textarea name="sinopsis_buku" required v-model='message' @keyup='charCount()' class="form-control" rows="7" placeholder="Maks. 1000 Karakter"></textarea>
							<span>{{ totalcharacterSinopsis }} characters</span>
						</div>	
					</div>

				<div id="rowUpload">
					<div class="form-group col-md-6">
						<label for="coverBuku" style="font-weight: bold">Cover Buku</label>
						<input value="<?= $detail->cover_buku ?>" name="file" type="file" class="form-control-file" @change="onFileChange" v-on:change="seen = !seen"/>
					</div>
					<div class="form-group col-md-4">
						<div id="preview">
							<img style="width: 200px;height: 300px;" v-if="url" :src="url" />
                        </div>
                        <div id="preview2" v-if="seen">
                            <img style="width: 200px;height: 300px;" src="<?= base_url('assets/images/buku/').$detail->cover_buku; ?>"/>
                        </div>
                    </div>
				</div>

				<div class="form-group col-md-6">
					<button class="btn btn-success btn-icon-split">
						<span class="icon text-white-50">
							<i class="fas fa-check"></i>
						</span>
						<span class="text">Submit</span>
                    </button>
                    <button type="button" class="btn btn-danger btn-icon-split btn-batal">
                            <span class="icon text-white-50">
                              <i class="fas fa-arrow-right"></i>
                            </span>
                            <span class="text">Batal</span>
                    </button>
				</div>
            </form>
            <?php endforeach; ?>    
		</div>
	</div>
</div>
<script>
		var textArea = new Vue({
		  el: '#ketBuku',
		  data: {
			message: "<?= $detail->keterangan_buku; ?>",
			totalcharacter: "<?= strlen($detail->keterangan_buku) ?>"
		  },
		  methods: {
			charCount: function(){
	 
			  this.totalcharacter = this.message.length;
	 
			}
		  }
		});

		var sinopsis = new Vue({
		  el: '#sinopsisBuku',
		  data: {
			message: "<?= $detail->sinopsis_buku; ?>",
			totalcharacterSinopsis: "<?= strlen($detail->sinopsis_buku) ?>"
		  },
		  methods: {
			charCount: function(){
	 
			  this.totalcharacterSinopsis = this.message.length;
	 
			}
		  }
		});

		var vm = new Vue({
			el: '#rowUpload',
			data() {
			return {
                seen: true,
				url: null,
			}
			},
			methods: {
			onFileChange(e) {
				const file = e.target.files[0];
                this.url = URL.createObjectURL(file);
			}
			}
			});
		</script>