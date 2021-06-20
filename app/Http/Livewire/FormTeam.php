<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use App\Models\Team;
use App\Models\User;
use Livewire\Component;

class FormTeam extends Component
{
    public $action;
    public $team;
    public $teamId;
    public $optionUser;

    public function mount()
    {
        $this->team['user_id'] = '1';
        $this->optionUser = eloquent_to_options(User::get(), 'id', 'name');
        if ($this->teamId != null) {
            $team = Team::findOrFail($this->teamId);
            $this->team = [
                'user_id' => $team->user_id,
                'order' => $team->order
            ];
        }
    }

    public function rules()
    {
        return [
            'team.user_id' => 'required',
            'team.order' => 'numeric',
        ];
    }

    public function create()
    {
        $this->validate();
        $this->resetErrorBag();
        Team::create($this->team);
        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil masuk',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('redirect', route('admin.team.index'));
    }

    public function update()
    {
        $this->validate();
        $this->resetErrorBag();
        Team::find($this->teamId)->update($this->team);
        $this->emit('swal:alert', [
            'type' => 'success',
            'title' => 'Data berhasil masuk',
            'timeout' => 3000,
            'icon' => 'success'
        ]);
        $this->emit('redirect', route('admin.team.index'));
    }

    public function render()
    {
        return view('livewire.form-team');
    }
}
