<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use PhpParser\Node\Expr\FuncCall;

class NoteController extends Controller
{   
    private $array = ['error' => '', 'result' => [] ];
    
    // LISTANDO TODAS AS NOTAS
    public function all(){
        $notes = Note::all();

        foreach($notes as $note){   
            $this->array['result'][] = [
                'id' => $note->id,
                'tittle' => $note->tittle
            ];
        }

        return $this->array;
    }

    //PEGANDO APENAS UMA NOTA
    public function one($id){
        $note = Note::find($id);

        if($note){
            $this->array['result'] = $note;
        }else{
            $this->array['error'] = 'ID NÃO ENCONTRADO!!!';
        }

        return $this->array;
    }
}
