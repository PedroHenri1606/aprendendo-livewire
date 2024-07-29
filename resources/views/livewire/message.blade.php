<div>

    <div class="row mt-5 ms-5">
        <div class="col-4">
            <div class="col-12">
                <label for="autor" class="fw-bolder"> Autor </label>
                <input type="text" id="autor" name="autor" class="form-control" wire:model.live.debounce.200="autor">
            </div>

            <div class="col-12">
                <label for="autor" class="fw-bolder"> Mensagem </label>
                <input type="text" id="autor" name="mensagem" class="form-control" wire:model.live.debounce.200="mensagem">
            </div>

            <div class="col-12">
                @if($mensagemId)
                    <div class="row">
                        <div class="col-9">
                            <button type="submit" class="btn btn-warning mt-2 w-100" wire:click="atualizar"> Salvar Alterações </button>
                        </div>

                        <div class="col-3">
                            <button type="submit" class="btn btn-primary mt-2 w-100" wire:click="cancelar"> Cancelar </button>
                        </div>
                    </div>
                @else             
                    <button type="submit" class="btn btn-primary mt-2 w-100" wire:click="salvar"> Enviar Mensagem </button>
                @endif
            </div>

            <div class="col-12 card mt-4">

                <p class="h5 mt-2 text-center"> Preview da Mensagem</p>
                <div class="card-body bg-black-900">
        
                    <div>
                        <span class="fw-bolder"> Autor: </span> {{ $autor}}
                    </div>

                    <div>
                        <span class="fw-bolder"> Assunto: </span> {{ $mensagem }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 ms-5">

            <p class="h3 text-center"> Mensagens Enviadas </p>

            <div class="row  p-2">
                @foreach ($mensagens as $mensagem)
                    
                    <div class="col-5 card mt-4 me-2">

                        <p class="h5 mt-2 text-center">Mensagem de id: {{ $mensagem->id }}</p>
                        <div class="card-body bg-black-900">
                
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
