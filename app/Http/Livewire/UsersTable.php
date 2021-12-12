<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UsersTable extends Component
{
    // Total number of User records within the database.
    public $totalRecords;
    // The number of records to load per scroll event.
    public $loadAmount = 10;

    public function loadMore()
    {
        $this->loadAmount += 10;
    }

    public function mount()
    {
        $this->totalRecords = User::count();
    }

    public function render()
    {
        return view('livewire.users-table')
            ->with(
                'users',
                User::limit($this->loadAmount)->get()
            );
    }
}
