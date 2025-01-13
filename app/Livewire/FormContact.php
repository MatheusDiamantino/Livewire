<?php

namespace App\Livewire;

use App\Models\Contact;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Validate;
use Livewire\Component;

class FormContact extends Component
{
    #[Validate('required|min:3|max:50')]
    public $name;
    #[Validate('required|email|min:5|max:50')]
    public $email;
    #[Validate('required|min:5|max:20')]
    public $phone;

    // error and success messages

    public function newContact()
    {
        // validation
        $this->validate();

        // store contact in database
        $result = Contact::firstOrCreate(
            [
                'name' => $this->name,
                'email' => $this->email,
            ],
            [
                'phone' => $this->phone,
            ]

        );


        // ------- OPTION 2
        // $this->validate([
        //     'name' => 'required|min:3|max:50',
        //     'email' => 'required|email|min:5|max:50',
        //     'phone' => 'required|min:5|max:20',
        // ]);

        // temporary store in log file
        // Log::info('Novo contacto: ' . $this->name . ' - ' . $this->email . ' - ' . $this->phone);

        // clear form

        // check for success
        if ($result->wasRecentlyCreated) {
            $this->reset();

            // success message
            // $this->success = "Contact created successfully";

            // created an event
            $this->dispatch('contactAdded');
            $this->dispatch(
                'notification',
                type: 'success',
                title: 'Contact created successfully',
                position: 'center'
            );
        } else {
            // error message
            // $this->error = "Contact already exists!";
            $this->dispatch(
                'notification',
                type: 'error',
                title: 'Contact already exists!',
                position: 'center'
            );
        }
    }
    public function render()
    {
        return view('livewire.form-contact');
    }
}
