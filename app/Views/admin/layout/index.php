<!doctype html>
<html lang="id">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="<?= base_url(); ?>assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="<?= base_url(); ?>assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="<?= base_url(); ?>assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="<?= base_url(); ?>assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<link href="<?= base_url(); ?>assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
	<link type="text/css" href="<?= base_url(); ?>assets/plugins/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet" />

	<!-- loader-->
	<link href="<?= base_url(); ?>assets/css/pace.min.css" rel="stylesheet" />
	<script src="<?= base_url(); ?>assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/css/app.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/dark-theme.css" />

	<!--plugins-->
	<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>

	<title><?= $title; ?> - Administrator Web</title>

	<style>
		label.required::after {
			content: '* ';
			color: red;
		}
	</style>

</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<?= $this->include('admin/layout/sidebar'); ?>
		<!--end sidebar wrapper -->
		<!--start header -->
		<?= $this->include('admin/layout/header'); ?>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<?= $this->renderSection('content'); ?>
		</div>
		<!--end page wrapper -->
		<!--Start Back To Top Button-->
		<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2023. All right reserved.</p>
		</footer>
	</div>
	<!--end wrapper-->


	<!-- Bootstrap JS -->
	<script src="<?= base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="<?= base_url(); ?>assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--Morris JavaScript -->

	<!--app JS-->
	<script src="<?= base_url(); ?>assets/js/app.js"></script>
	<script src="<?= base_url(); ?>assets/plugins/sweetalert2/dist/sweetalert2.min.js"></script>
	<script>
		function refreshTooltips(scope = document) {
			// Buang instance lama
			scope.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => {
				const existing = bootstrap.Tooltip.getInstance(el);
				if (existing) {
					existing.dispose();
				}
				new bootstrap.Tooltip(el);
			});
		}
		refreshTooltips();

		//alert
		const Toast = Swal.mixin({
			toast: true,
			position: 'top-start',
			showConfirmButton: false,
			timerProgressBar: true,
			didOpen: (toast) => {
				toast.addEventListener('mouseenter', Swal.stopTimer)
				toast.addEventListener('mouseleave', Swal.resumeTimer)
			}
		})

		function alertMesage(status, message) {
			if (status == 200) {
				Toast.fire({
					timer: 2000,
					icon: 'success',
					title: message
				});
			} else {
				Toast.fire({
					timer: 2000,
					icon: 'error',
					title: message
				});
			}
		}
	</script>
</body>

</html>