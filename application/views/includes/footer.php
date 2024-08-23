<?php 
if(isset($name)){ ?>
</div>
</main>
<?php 
}else{ ?>
</div>
<?php 
} ?>
<footer class="footer" style="background-color:#1c88e3;">
	<div class="container-fluid">
		<div class="row text-muted">
			<div class="col-6 text-start">
				<p class="mb-0 text-white">
					<strong>Copyright &copy;</strong> - <a class="text-muted" href="https://mirota.id/" target="_blank"><strong class="text-white">TIM IT PT Mirota KSM <?= DATE('Y')?></strong></a>
				</p>
			</div>
			<div class="col-6 text-end">
				<ul class="list-inline">
					<li class="list-inline-item">
						<a class="text-white" href="https://wa.me/08993932789" target="_blank">Support</a>
					</li>
					<li class="list-inline-item">
						<a class="text-white" href="https://wa.me/08993932789" target="_blank">Help Center</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</footer>
<div class="flash-data" data-icon="<?= $this->session->flashdata('swal_icon')?>"  data-title="<?= $this->session->flashdata('swal_title')?>"  data-text="<?= $this->session->flashdata('swal_text')?>"></div>
</div>


	<!-- jQuery 3 -->
	<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

	<!-- Popper -->
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
	
	<!-- Bootsrap 5 -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>



	<!-- Datatable -->
	<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

	<!-- AdminKit -->
	<script src="<?php echo base_url(); ?>assets/adminkit/js/app.js"></script>

	<!-- FullCalendar -->
	<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/bootstrap5@6.1.10/index.global.min.js"></script>
	
	<!-- SELECT2 -->
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<script src="<?php echo base_url(); ?>assets/dist/js/html5-qrcode.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>


	<script>
		$(document).ready(function() {
			swal();
			// dataTamu();
			datatable();
			checklist();

			$("#pelayanan, #kerapian, #etika").rateYo({
				starWidth: "30px",
				spacing: "10px"
			});

			$("#pelayanan").rateYo().on("rateyo.change", function (e, data) {
				var rating = data.rating;
				document.getElementById('ratingpelayanan').value = rating;
			});

			$("#kerapian").rateYo().on("rateyo.change", function (e, data) {
				var rating = data.rating;
				document.getElementById('ratingkerapian').value = rating;
			});

			$("#etika").rateYo().on("rateyo.change", function (e, data) {
				var rating = data.rating;
				document.getElementById('ratingetika').value = rating;
			});
	});

	function formidentitastamu(){
		let x = document.getElementById('identitas_tamu_lainnya').value

		document.getElementById('identitas_tamu').value = x

		console.log(x);
	}


	function dataTamu(){
		setInterval(function(){
			$.ajax({
			url:"<?php echo site_url("tamu/getDataTamu")?>",
			dataType:"JSON",
			type: "GET",
			success:function(data){
				const months = ["Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agust","Sep","Okt","Nov","Des"];

				let html = '';
				for ( i=0; i < data.length ; i++){
				let no = i + 1;

				if(data[i].tgl_keluar == null){
					tglkeluar = '<button class="btn btn-sm btn-primary" onclick="keluar('+data[i].id_tamu+')"><i class="fas fa-clock"></i></button>' ;
				}else{

					const tgl_keluar = new Date(data[i].tgl_keluar);
					const bulanKeluar = months[tgl_keluar.getMonth()];
					const tanggalKeluar = tgl_keluar.getDate();
					const tahunKeluar = tgl_keluar.getFullYear();
					
					tglkeluar = tanggalKeluar+' '+bulanKeluar+' '+tahunKeluar+' | '+data[i].jam_keluar;
				}


				const tgl_masuk = new Date(data[i].tgl_masuk);
				const bulanMasuk = months[tgl_masuk.getMonth()];
				const tanggalMasuk = tgl_masuk.getDate();
				const tahunMasuk = tgl_masuk.getFullYear();



				html +=
					'<td>'+no+'</td>'+
					'<td class="text-center">'+tanggalMasuk+' '+bulanMasuk+' '+tahunMasuk+' | '+data[i].jam_masuk+'</td>'+
					'<td class="text-center">'+tglkeluar+'</td>'+
					'<td>'+data[i].nama_tamu+'</td>'+
					'<td>'+data[i].alamat_tamu+'</td>'+
					'<td>'+data[i].identitas_tamu+'</td>'+
					'<td>'+data[i].asal_instansi+'</td>'+
					'<td>'+data[i].nama_divisi+'</td>';
				}

				$("#listTamu").html(html);
			}
			});
		}, 2000);
	}

	function keluar(id){
		$.ajax({
			url:"<?php echo site_url("tamu/keluar")?>",
			dataType:"JSON",
			type: "POST",
			data:{id_tamu : id},
			success:function(hasil){
				// window.location.reload();
			}
		})
	}

	function checklist(){
    $("#check-all").click(function(){ // Ketika user men-cek checkbox all
      if($(this).is(":checked")) // Jika checkbox all diceklis
        $(".check-item").prop("checked", true); // ceklis semua checkbox siswa dengan class "check-item"
      else // Jika checkbox all tidak diceklis
        $(".check-item").prop("checked", false); // un-ceklis semua checkbox siswa dengan class "check-item"
    });
	}
	function swal(){

		const icon = $('.flash-data').data('icon');
		const tittle = $('.flash-data').data('title');
		const text = $('.flash-data').data('text');

		if (icon){
			Swal.fire({
			icon: icon,
			title: tittle,
			text: text,
			position: "center",
			showConfirmButton: false,
			timer: 1500
			})
		}
	}

	function datatable(){
		Object.assign(DataTable.defaults, {
		searching: true,
		responsive: true,
		ordering: true
		});
		
		new DataTable('#DataTable');
	}

	// Script Navbar active
	var windowURL = window.location.href;
	pageURL = windowURL.substring(0, windowURL.lastIndexOf('/'));
	var x= $('a[href="'+pageURL+'"]');
			x.addClass('active');
			x.parent().addClass('active');
	var y= $('a[href="'+windowURL+'"]');
			y.addClass('active');
			y.parent().addClass('active');
</script>

</body>

</html>