<?php

namespace App\Http\Controllers;

use Livewire\Attributes\Title;
use Livewire\Component;

class Welcome extends Component
{
    #[Title('Basic News Platform - Home')]
    public function render()
    {
        return view('welcome');
    }
}
