<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>
		Album Painel
	</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/paper-dashboard.css') }}" rel="stylesheet" />
	<script src="{{ asset('js/core/jquery.min.js') }}"></script>
	<script src="{{ asset('js/core/popper.min.js') }}"></script>
	<script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
	<script src="{{ asset('js/plugins/chartjs.min.js') }}"></script>
	<script src="{{ asset('js/plugins/bootstrap-notify.js') }}"></script>
	<script src="{{ asset('js/plugins/mask.js') }}"></script>
	<script src="{{ asset('js/paper-dashboard.min.js') }}" type="text/javascript"></script>
</head>
<body>
	<div class="wrapper ">
		<div class="sidebar" data-color="white" data-active-color="danger">
			
			<div class="logo">
				<a href="/" class="simple-text logo-mini">
					<div class="logo-image-small">
						<img src="{{ asset('img/logo-small.png') }}">
					</div>
				</a>
				<a href="/" class="simple-text logo-normal">
					Album Painel
				</a>
			</div>
			<div class="sidebar-wrapper" style="display:none;">
			</div>
		</div>
		<div class="main-panel">
			
			<div class="content">
				@yield("content")
			</div>
		</div>
	</div>
</body>