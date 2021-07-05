@extends("template.gerencia")

@section("content")
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header ">
				<h5 class="card-title">Cadastrar Jogador</h5>
			</div>
			<div class="card-body">
				<form action="/jogador" method="POST" class="row" enctype="multipart/form-data">
					<div class="col-8 form-group">
						<label for="nome">Nome:</label>
						<input type="text" id="nome" name="nome" class="form-control" value="{{ $jogador->NOME }}" />
					</div>
					<div class="col-4 form-group">
						<label for="dataNascimento">Data de nascimento:</label>
						<input type="date" id="dataNascimento" name="dataNascimento" class="form-control" value="{{ $jogador->DATA_NASCIMENTO }}" />
					</div>
					<div class="col-6 form-group">
						<label>Clube</label>
						<select name="clube_id" id="clube_id" class="form-control" required>
							<option value="">Selecione</option>
							@foreach($clubes as $clube)
							<option value="{{ $clube->id }}" {{ intval(old('clube_id')) === $clube->id ? 'selected' : '' }}>{{ $clube->NOME }}</option>
							@endforeach
						</select>
					</div>
					<div class="col-6 form-group">
						<label>Posicao</label>
						<select name="posicao_id" id="posicao_id" class="form-control" required>
							<option value="">Selecione</option>
							@foreach($posicaos as $posicao)
							<option value="{{ $posicao->id }}" {{ intval(old('posicao_id')) === $posicao->id ? 'selected' : '' }}>{{ $posicao->NOME }}</option>
							@endforeach
						</select>
					</div>
					<div class="col-6 form-group">
						<label>Possui?</label>
						<select name="possui" class="form-control" required>
							<option value="">Selecione</option>
							<option value='1'>Sim</option>
							<option value='0'>Não</option>
						</select>
					</div>
					<div class="ml-auto mr-auto">
						@csrf
						<input type="hidden" name="id" value="{{ $jogador->id }}" />
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
							<th>jogador</th>
							<th>posição</th>
							<th>possui</th>
							<th>Edit</th>
							<th>Del</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($jogadors as $jogador)
						<tr>
							<td>
								@foreach ($clubes as $clube)
								@if($jogador->ID_CLUBE == $clube->id)
								<img src="{{ asset('storage/' . $clube->ESCUDO) }}" width="100px" />
								@endif
								@endforeach
							</td>
							<td>{{ $jogador->NOME }}</td>
							@foreach ($posicaos as $posicao)
							@if($jogador->ID_POSICAO == $posicao->id)
							<td>{{ $posicao->NOME }}</td>
							@endif
							@endforeach
							@if($jogador->POSSUI == true)
							<td>Sim</td>
							@else
							<td>Não</td>
							@endif
							<td>
								<a href="/jogador/{{ $jogador->id }}/edit" class="btn btn-warning btn-round">Editar</a>
							</td>
							<td>
								<form action="/jogador/{{ $jogador->id }}" method="POST">
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