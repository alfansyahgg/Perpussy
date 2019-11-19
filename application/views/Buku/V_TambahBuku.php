<div class="container-fluid">
	<div class="card mb-4">
		<div class="card-header bg-gray-400">
			 <div>
			 <h4 class="m-0 font-weight-bold text-primary" style="float: left;">Tambah Buku</h4>
			 </div>
		</div>
		<div class="card-body" style="overflow-x: auto">
            <form method="post" action="<?= base_url('C_Buku/tambahBuku') ?>" enctype="multipart/form-data">
				<div>
					<div class="form-group col-md-8">
						<label for="NoBuku" style="font-weight: bold">Nomor Buku</label>
						<input required type="number" class="form-control" name="no_buku" value="<?= $NoBuku->no_buku + 1; ?>"/>
					</div>
				</div>
                
				<div>
					<div class="form-group col-md-8">
						<label for="judulBuku" style="font-weight: bold">Judul Buku</label>
						<input required type="text" class="form-control" name="judul_buku" />
					</div>
				</div>

				<div id="pengarang">
					<div class="form-group col-md-8">
						<label for="pengarangBuku" style="font-weight: bold">Pengarang</label>
						<input name="pengarang" type="text" class="form-control" />
					</div>	
				</div>

				<div class="form-group col-md-8">
						<label for="tanggalRilis" style="font-weight: bold">Tanggal Rilis</label>
					<div class="input-group date datepicker" data-provide="datepicker">
						<input name="tanggal_rilis" type="text" class="form-control">
						<div class="input-group-addon">
							<span class="glyphicon glyphicon-th"></span>
						</div>
					</div>
				</div>
				
				
					<div id="ketBuku">
						<div class="form-group col-md-8">
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
						<input name="file" type="file" class="form-control-file" @change="onFileChange"/>
					</div>
					<div class="form-group col-md-4">
						<div id="preview">
							<img style="width: 200px;height: 300px;" v-if="url" :src="url" />
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
				</div>
            </form>
		</div>
	</div>
</div>
<script>
		var textArea = new Vue({
		  el: '#ketBuku',
		  data: {
			message: "",
			totalcharacter: 0
		  },
		  methods: {
			charCount: function(){
	 
			  this.totalcharacter = this.message.length;
	 
			}
		  }
		})

		var sinopsis = new Vue({
		  el: '#sinopsisBuku',
		  data: {
			message: "",
			totalcharacterSinopsis: 0
		  },
		  methods: {
			charCount: function(){
	 
			  this.totalcharacterSinopsis = this.message.length;
	 
			}
		  }
		})

		const vm = new Vue({
			el: '#rowUpload',
			data() {
			return {
				url: null,
			}
			},
			methods: {
			onFileChange(e) {
				const file = e.target.files[0];
				this.url = URL.createObjectURL(file);
			}
			}
			})
		</script>