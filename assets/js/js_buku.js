$(document).ready(function(){
        const base_url = 'http://localhost/alf_perpus/';
	    $("#tbl_buku").DataTable();

		$("#tbl_buku").on('click','.btn-delete',function(event){
            var id = $(this).attr('data-id');
			Swal.fire({
				title: 'Ingin Menghapus?',
				text: 'Data akan dihapus secara permanen!',
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Ya, Hapus!'
				}).then((result) => {
				if (result.value) {
                    $('.loader').show();
					$.ajax({
						url: base_url+'C_Buku/hapusBuku',
						type: 'POST',
						data: {id:id},
						success: function(response){
                            setTimeout(function(){
                                $('.loader').hide();
                                Swal.fire('Berhasil','Berhasil Menghapus Data','success').then((result) =>{
                                    if(result.value){
                                        window.location.reload();
                                    }
                                })
                            },1000);
                            
                        },
                        error: function(response){
                            setTimeout(function(){
                                $('.loader').hide();
                                Swal.fire('Gagal','Gagal Menghapus Data','error');
                            },1000);
                           
                        }
					})
				}
				})
			
		})
})