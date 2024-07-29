<div>

    <div class="row mt-5 ms-5">
        <div class="col-4">
            <div class="col-12">
                <label for="autor" class="fw-bolder"> Autor </label>
                <input type="text" id="autor" name="autor" class="form-control" wire:model.live.debounce.500="autor">
            </div>

            <div class="col-12">
                <label for="autor" class="fw-bolder"> Mensagem </label>
                <input type="text" id="autor" name="mensagem" class="form-control" wire:model.live.debounce.500="mensagem">
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary mt-2 w-100" wire:click="salvar"> Enviar Mensagem </button>
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
                
                            <div class="fw-bolder">
                                Autor: {{ $mensagem->autor}}
                            </div>

                            <div class="fw-bolder">
                                Assunto: {{ $mensagem->mensagem }}
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>

</div>
