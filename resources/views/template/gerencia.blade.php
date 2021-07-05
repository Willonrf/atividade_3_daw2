<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>
		Cadastro Painel
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
					Cadastro Painel
				</a>
			</div>
			<div class="sidebar-wrapper">
				<ul class="nav">
					<li class="active">
						<a href="/clube">
							<i class="fa fa-tags"></i>
							<p>Clubes</p>
						</a>
					</li>
					<li class="active">
						<a href="/jogador">
							<i class="fa fa-user"></i>
							<p>Jogadores</p>
						</a>
					</li>
                    <li class="active">
						<a href="/posicao">
							<i class="fa fa-user"></i>
							<p>Posicões</p>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="main-panel">
			
			@if (Session::get("status") == "sucesso")
				<div class="alert alert-success alert-dismissible fade show">
					<span>
						{{ Session::get("mensagem") }}
					</span>
				</div>
			@endif
			
			@if (Session::get("status") == "erro")
				<div class="alert alert-danger alert-dismissible fade show">
					<span>
						{{ Session::get("mensagem") }}
					</span>
				</div>
			@endif
			
			@if ($errors->any())
				<div class="alert alert-danger alert-dismissible fade show">
					<span>
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</span>
				</div>
			@endif
			
			<div class="content">
				@yield("content")
			</div>
		</div>
	</div>
</body>