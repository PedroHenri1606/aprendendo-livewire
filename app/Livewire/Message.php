<?php

namespace App\Livewire;

use App\Models\Mensagem;
use Illuminate\Http\Request;
use Livewire\Component;

class Message extends Component
{
    public $autor;

    public $mensagem;

    public $mensagens;

    public function mount(){
        $this->mensagens = Mensagem::orderBy('id', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.message');
    }

    public function salvar(){

        $mensagem = Mensagem::create([
            'autor' => $this->autor,
            'mensagem' => $this->mensagem,
        ]);

        $this->mensagens->prepend($mensagem);
    }

    public function deletar($id){

        $mensagem = Mensagem::findOrFail($id);
        $mensagem->delete();

        $this->mensagens = $this->mensagens->filter(function ($mensagem) use ($id){
            return $mensagem->id !== $id;
        });
    }
}
