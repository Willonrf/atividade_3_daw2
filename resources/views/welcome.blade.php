@extends("template.default")

@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header ">
                    <h5 class="card-title">Clubes</h5>
                </div>
                <div class="card-body ">
                    <form action="/clube" class="row">
                        <div class="col-5 form-group">
                            Adicione clubes ao album
                        </div>
                        <div class="ml-auto mr-auto">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-round">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header ">
                    <h5 class="card-title">Jogadores</h5>
                </div>
                <div class="card-body ">
                    <form action="/jogadores"  class="row">
                        <div class="col-5 form-group">
                            Adicione jogadores ao album
                        </div>
                        <div class="ml-auto mr-auto">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-round">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header ">
                    <h5 class="card-title">Posições</h5>
                </div>
                <div class="card-body ">
                    <form action="/posicao" method="POST" class="row">
                        <div class="col-5 form-group">
                        Adicione posições dos jogadores
                        </div>
                        <div class="ml-auto mr-auto">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-round">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header ">
                    <h5 class="card-title">Album</h5>
                </div>
                <div class="card-body ">
                    <form action="/album" method="POST" class="row">
                        <div class="col-5 form-group">
                        Visualizar album
                        </div>
                        <div class="ml-auto mr-auto">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-round">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- <div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header ">
						<h5 class="card-title">Login</h5>
					</div>
					<div class="card-body">
						<form action="/login" method="POST" class="row">
							<div class="col-5 form-group">
								<label for="email">Email:</label>
								<input type="email" id="email" name="email" class="form-control" />
							</div>
							<div class="col-5 form-group">
								<label for="password">Senha:</label>
								<input type="password" id="password" name="password" class="form-control" />
							</div>
							<div class="ml-auto mr-auto">
								@csrf
								<button type="submit" class="btn btn-primary btn-round">OK</button>
							</div>
						</form>
					</div>
				</div>
				
			</div>
		</div> -->
@endsection