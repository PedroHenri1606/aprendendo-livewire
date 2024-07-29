<div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <button class="nav-link btn" wire:click="changeView('message')">Mensagens</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link btn" wire:click="changeView('counter')">Contador</button>
                    </li>
                </ul>
            </div>

        </div>
    </nav>

    @if ($currentView == 'message')
        @livewire('message')
    @elseif ($currentView == 'counter')
        @livewire('counter')
    @endif
</div>
