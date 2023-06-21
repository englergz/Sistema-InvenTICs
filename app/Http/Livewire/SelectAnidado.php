<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Employee;

class SelectAnidado extends Component
{
    
    public $selectedPost = null, $selectedDebtor = null;
    public $body = null, $data = null, $debtors = null;


    public function render()
    {
        return view('livewire.select-anidado', '#debtor', [
            'posts' => Post::all(),
        ]);
    }

    public function updatedselectedPost($id)
    {
        $this->debtors = Employee::where('id', $id->employee_id)->get();
        $this->body = Post::where('id', $id)->get();
        $this->data = Post::where('id', $id)->get();
    }
}