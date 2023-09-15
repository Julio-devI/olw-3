<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;

class UserForm extends Form
{
    #[Rule('required|email|unique:users,email')]
    public $email = "";

    #[Rule('required|min:3|max:255')]
    public $name = "";
}
