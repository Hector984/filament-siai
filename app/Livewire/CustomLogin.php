<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CustomLogin extends Component
{

    public function authenticate()
    {
        $credentials = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
            'custom_field' => 'nullable|string', // Optional custom field validation
        ]);

        if (Auth::attempt([
            'email' => $this->email,
            'password' => $this->password,
            // Optionally, handle the custom field here
        ])) {
            session()->regenerate();

            return redirect()->intended('/admin');
        }

        $this->addError('email', 'The provided credentials are incorrect.');
    }
    
    public function render()
    {
        return view('livewire.custom-login');
    }

    protected function getFormSchema(): array
    {
        return [
            ...parent::getFormSchema(),
            // Add custom fields here
            \Filament\Forms\Components\TextInput::make('custom_field')
                ->label('Custom Field')
                ->required(),
        ];
    }
}
