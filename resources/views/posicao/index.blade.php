@extends("template.gerencia")

@section("content")
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header ">
					<h5 class="card-title">Cadastrar posição</h5>
				</div>
				<div class="card-body">
					<form action="/posicao" method="POST" class="row" enctype="multipart/form-data">
						<div class="col-8 form-group">
							<label for="nome">Nome:</label>
							<input type="text" id="nome" name="nome" class="form-control" value="{{ $posicao->NOME }}" />
						</div>
						<div class="col-8 form-group">
							<label for="descricao">Descrição:</label>
							<input type="text" id="descricao" name="descricao" class="form-control" value="{{ $posicao->DESCRICAO }}" />
						</div>
						<div class="ml-auto mr-auto">
							@csrf
							<input type="hidden" name="id" value="{{ $posicao->id }}" />
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
							<col width="200" />
							<col width="800" />
							<col width="200" />
							<col width="200" />
						</colgroup>
						<thead>
							<tr>
								<th>Nome</th>
								<th>Descrição</th>
								<th>Edit</th>
								<th>Del</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($posicaos as $posicao)
								<tr>
									<td>{{ $posicao->NOME }}</td>
                                    <td>{{ $posicao->DESCRICAO }}</td>
									<td>
										<a href="/posicao/{{ $posicao->id }}/edit" class="btn btn-warning btn-round">Editar</a>
									</td>
									<td>
										<form action="/posicao/{{ $posicao->id }}" method="POST">
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