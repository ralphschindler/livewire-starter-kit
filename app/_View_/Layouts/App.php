<?php

namespace App\View\Layouts;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;
use Illuminate\View\View;

class App extends Component
{
    public function render(): View
    {
        return view('layouts.app');
    }
}
