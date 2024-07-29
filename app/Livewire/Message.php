<?php

namespace App\Livewire;

use App\Models\Mensagem;
use Illuminate\Http\Request;
use Livewire\Component;

class Message extends Component
{
    public $mensagemId;
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

    public function editar($id){

        $mensagem = Mensagem::findOrFail($id);

        $this->mensagemId = $mensagem->id;
        $this->autor = $mensagem->autor;
        $this->mensagem = $mensagem->mensagem;
    }

    public function atualizar(){

        $mensagem = Mensagem::findOrFail($this->mensagemId);
        
        $mensagem->update([
            'autor' => $this->autor,
            'mensagem' => $this->mensagem,
        ]);

        $this->mensagens = Mensagem::orderBy('id', 'desc')->get();

        $this->cancelar();
    }

    public function cancelar(){
        $this->autor = '';
        $this->mensagem = '';
        $this->mensagemId = null; 
    }
}
