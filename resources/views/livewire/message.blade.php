<div>
    <div class="row justify-content-around p-4">

        <div class="col-12 col-sm-12 col-lg-4 card shadow p-4 mt-4" style="border-radius: 20px">

            <div class="col-12">
                <label for="autor" class="fw-bolder"> Titulo </label>
                <input type="text" id="autor" name="titulo" class="form-control" wire:model.live.debounce.200="titulo">
                
                <div class="text-center">
                    @error('titulo') <span class="fw-bolder text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="col-12">
                <label for="autor" class="fw-bolder"> Autor </label>
                <input type="text" id="autor" name="autor" class="form-control" wire:model.live.debounce.200="autor">

                <div class="text-center">
                    @error('autor') <span class="fw-bolder text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="col-12">
                <label for="autor" class="fw-bolder"> Mensagem </label>
                <input type="text" id="autor" name="mensagem" class="form-control" wire:model.live.debounce.200="mensagem">

                <div class="text-center">
                    @error('mensagem') <span class="fw-bolder text-danger">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="col-12">
                @if($mensagemId)
                    <div class="row">
                        <div class="col-9">
                            <button type="submit" class="btn btn-warning mt-2 w-100" wire:click="atualizar"> Salvar Alterações </button>
                        </div>

                        <div class="col-3">
                            <button type="submit" class="btn btn-primary mt-2 w-100" wire:click="retornar"> Cancelar </button>
                        </div>
                    </div>
                @else             
                    <button type="submit" class="btn btn-primary mt-2 w-100" wire:click="salvar"> Enviar Mensagem </button>
                @endif
            </div>

            <div class="col-12 card mt-4 rounded">

                <p class="h5 mt-2 text-center "> Preview da Mensagem</p>
                <div class="card-body bg-black-900">

                    <div>
                        <span class="fw-bolder"> Titulo: </span> {{ $titulo}}
                    </div>

                    <div class="mt-2">
                        <span class="fw-bolder"> Autor: </span> {{ $autor}}
                    </div>

                    <div class="mt-2">
                        <span class="fw-bolder"> Assunto: </span> {{ $mensagem }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-12 col-lg-7 mt-4 card shadow justify-content-center" style="border-radius: 20px">

            <p class="h3 text-center mt-4"> Mensagens Enviadas </p>

            <div class="row p-4 justify-content-center align-items-center">
                @foreach ($mensagens as $mensagem)
                    
                    <div class="col-12 col-sm-12 col-lg-5 card shadow m-2" style="border-radius: 20px">
                        
                        <div class="card-body">

                            <p class="h5 mt-4 text-start">Titulo: {{ $mensagem->titulo }}</p>
                
                            <div>
                                <span class="fw-bolder"> Autor: </span> {{ $mensagem->autor}}
                            </div>

                            <div>
                                <span class="fw-bolder"> Assunto: </span> {{ $mensagem->mensagem }}
                            </div>

                            <div class="d-flex justify-content-center">

                                <button type="submit" class="btn btn-warning mt-4" wire:click="editar({{ $mensagem->id }})">Editar</button>

                                <form method="POST" wire:submit="deletar({{ $mensagem->id }})">
                                    <button type="submit" class="btn btn-danger ms-2 mt-4">Deletar</button>
                                </form>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>
</div>
