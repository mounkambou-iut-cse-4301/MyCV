<?php

namespace App\Http\ViewComposers;
use App\Models\Utilisateur;
use Illuminate\View\View;

class SideComposer{
    public function compose(View $view)
    {
        $view->with('user', Utilisateur::where('id',session('LoggedUser'))->get());
    }
}