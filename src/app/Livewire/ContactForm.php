<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactForm extends Component
{
    public $name = '';
    public $email = '';
    public $subject = '';
    public $message = '';
    public $success = false;

    protected $rules = [
        'name' => 'required|min:3|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'required|min:3|max:255',
        'message' => 'required|min:10',
    ];

    protected $messages = [
        'name.required' => 'Nama wajib diisi',
        'name.min' => 'Nama minimal 3 karakter',
        'email.required' => 'Email wajib diisi',
        'email.email' => 'Format email tidak valid',
        'subject.required' => 'Subject wajib diisi',
        'message.required' => 'Pesan wajib diisi',
        'message.min' => 'Pesan minimal 10 karakter',
    ];

    public function submit()
    {
        $this->validate();

        Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
        ]);

        $this->reset(['name', 'email', 'subject', 'message']);
        $this->success = true;

        session()->flash('message', 'Pesan Anda telah terkirim!');
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
