<?php

namespace App\Livewire;

use App\Models\Mensagem;
use Illuminate\Http\Request;
use Livewire\Component;

class Message extends Component
{
    public $mensagemId;

    public $titulo;
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

        $rules = [
            'titulo' => 'required',
            'autor' => 'required',
            'mensagem' => 'required',
        ];

        $this->validate($rules);

        $mensagem = Mensagem::create([
            'titulo' => $this->titulo,
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
        $this->titulo = $mensagem->titulo;
        $this->autor = $mensagem->autor;
        $this->mensagem = $mensagem->mensagem;
    }

    public function atualizar(){

        $mensagem = Mensagem::findOrFail($this->mensagemId);
        
        $mensagem->update([
            'titulo' => $this->titulo,
            'autor' => $this->autor,
            'mensagem' => $this->mensagem,
        ]);

        $this->mensagens = Mensagem::orderBy('id', 'desc')->get();

        $this->retornar();
    }

    public function retornar(){
        $this->titulo = '';
        $this->autor = '';
        $this->mensagem = '';
        $this->mensagemId = null; 
    }
}
