@extends("template.gerencia")

@section("content")
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header ">
					<h5 class="card-title">Cadastrar Clubes</h5>
				</div>
				<div class="card-body">
					<form action="/clube" method="POST" class="row" enctype="multipart/form-data">
						<div class="col-8 form-group">
							<label for="nome">Nome:</label>
							<input type="text" id="nome" name="nome" class="form-control" value="{{ $clube->NOME }}" />
						</div>
						<div class="col-12 form-group">
							<label for="escudo">escudo:</label>
							<div class="custom-file">
								<input type="file" id="escudo" name="escudo" class="custom-file-input" />
								<label class="custom-file-label" for="escudo">Selecionar Arquivo</label>
							</div>
						</div>
						<div class="ml-auto mr-auto">
							@csrf
							<input type="hidden" name="id" value="{{ $clube->id }}" />
							<button type="submit" class="btn btn-primary btn-round">Salvar</button>
						</div>
					</form>
				</div>
			</div>
			
			<div class="card">
				<div class="card-header ">
					<h5 class="card-title">Listagem</h5>
				</div>
				<div class="card-body">
					<table class="table table-striped">
						<colgroup>
							<col width="500" />
							<col width="500" />
							<col width="200" />
							<col width="200" />
						</colgroup>
						<thead>
							<tr>
								<th></th>
								<th>clube</th>
								<th>Edit</th>
								<th>Del</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($clubes as $clube)
								<tr>
									<td>
										<img src="{{ asset('storage/' . $clube->ESCUDO) }}" width="100px" />
									</td>
									<td>{{ $clube->NOME }}</td>
									<td>
										<a href="/clube/{{ $clube->id }}/edit" class="btn btn-warning btn-round">Editar</a>
									</td>
									<td>
										<form action="/clube/{{ $clube->id }}" method="POST">
											<input type="hidden" name="_method" value="DELETE" />
											@csrf
											<button type="submit" class="btn btn-danger btn-round">Excluir</button>
										</form>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			
		</div>
	</div>
	
@endsection