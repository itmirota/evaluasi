<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Pencatatan Inventaris kepemilikan mirota ksm">
	<meta name="author" content="Tri Cahya">
	<!-- <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web"> -->
  <link rel="icon" type="image/x-icon" href="<?= base_url('assets/dist/img/favicon.png')?>">

	<link rel="preconnect" href="https://fonts.gstatic.com">

  <link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+One&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Tilt+Warp&display=swap" rel="stylesheet">

	<link rel="shortcut icon" href="<?= base_url('assets/dist/img/favicon.png')?>" />

	<title><?= $pageTitle ?></title>

  <!-- Bootstrap 5 -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

	<!-- FontAwesome -->
	<script src="https://kit.fontawesome.com/2edfabd55a.js" crossorigin="anonymous"></script>

  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

  <!-- Style.css -->
	<link href="<?= base_url(); ?>assets/dist/css/style.css" rel="stylesheet">

  <!-- Adminkit -->
	<link href="<?= base_url(); ?>assets/adminkit/css/app.css" rel="stylesheet">

	<!-- Style.css -->
	<link href="<?= base_url(); ?>assets/dist/css/style.css" rel="stylesheet">
  
  <!-- FullCalendar -->
  <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>
  
  <!-- SELECT2 -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
</head>

<body class="bg-pattern">
<div>
  <div class="box">
    <div class="container">
      <div class="container">
        <div class="d-flex justify-content-center">
          <img class="imageheader" src="<?= base_url('assets/dist/img/mirotaksm.png')?>" alt="" srcset="">
        </div>
        <div class="d-flex justify-content-center">
          <h1 class="text-header">
            <?= $pageHeader ?>
          </h1>
        </div>
      </div>
    </div>
  </div>
  <div class="container" style="min-height:400px; margin-top:-3%">

<script type="text/javascript">
	document.addEventListener("DOMContentLoaded", function(){

		document.querySelectorAll('.sidebar .sidebar-link').forEach(function(element){

			element.addEventListener('click', function (e) {

				let nextEl = element.nextElementSibling;
				let parentEl  = element.parentElement;	

				if(nextEl) {
					e.preventDefault();	
					let mycollapse = new bootstrap.Collapse(nextEl);

			  		if(nextEl.classList.contains('show')){
			  			mycollapse.hide();
			  		} else {
			  			mycollapse.show();
			  			// find other submenus with class=show
			  			var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
			  			// if it exists, then close all of them
						if(opened_submenu){
							new bootstrap.Collapse(opened_submenu);
						}

			  		}
		  		}

			});
		})

	}); 
	// DOMContentLoaded  end



</script>
