<?php

namespace App\Livewire\Employee;

use App\Models\InfoNew;
use App\Models\UserData;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class HomeComponent extends Component
{
    use LivewireAlert;

    public function render() {
        return view('livewire.employee.home-component',[
            'numberOfEmployes' => $this->quantityofemployees(),
            'numberOfInfoNews' => $this->quantityOfNews(),
        ])->layout('layouts.employee.app');

    }


    public function quantityofemployees(){
        try {

           return UserData::count();

        } catch (\Throwable $th) {
            $this->alert('error', 'ERRO', [
                'toast'=>false,
                'position'=>'center',
                 'showConfirmButton' => true,
                 'confirmButtonText' => 'OK',
                 'text'=>'Ocorreu um erro!'
              ]);
        }
    }

    public function quantityOfNews() {
        try {
          return InfoNew::query()->count();
        } catch (\Throwable $th) {
            $this->alert('error', 'ERRO', [
                'toast'=>false,
                'position'=>'center',
                 'showConfirmButton' => true,
                 'confirmButtonText' => 'OK',
                 'text'=>'Ocorreu um erro ao!'
              ]);
        }
    }




}
