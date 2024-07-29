
<div class="row d-flex justify-content-center align-items-center mt-5">
    
    <div class="card shadow w-50 p-5" style="border-radius: 20px">

        <div class="row justify-content-center">
            
            <div class="col-12 col-sm-12 col-lg-8 text-center mt-4 mb-4">
                <span class="h1"> {{ $counter }} </span>
            </div>
        </div>
        

        <div class="row justify-content-center">
            <div class="col-4 pe-0">
                <button class="btn btn-success fw-bolder rounded-start w-100 p-4" wire:click="increment"> + </button>
            </div>

            <div class="col-4 ps-0 ms-2">
                <button class="btn btn-danger fw-bolder rounded-end w-100 p-4" wire:click="decrement"> - </button>
            </div>
        </div>
    </div>
</div>
