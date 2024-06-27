<?php

namespace App\Livewire\Employee;

use App\Models\Address;
use App\Models\UserData;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class TableEmployees extends Component
{
    use LivewireAlert;
    protected $listeners = ['confirmRemoveEmployee' => 'confirmRemoveEmployee'];
    public $search, $name , $phone, $position, $city, $birthday, $neighborhood, $street, $employeeId;
    protected $rules = [
        'name' => 'required', 
        'phone' => 'required', 
        'position' => 'required',
        'neighborhood' => 'required',
        'street' => 'required',
        'city' => 'required',
        'birthday' => 'required',
    ];

    protected $messages = [
     'name.required' => 'Campo obrigatório',
     'phone.required' => 'Campo obrigatório',
     'position.required' => 'Campo obrigatório',
     'city.required' => 'Campo obrigatório',
     'neighborhood.required' => 'Campo obrigatório',
     'birthday.required' => 'Campo obrigatório',
     'street.required' => 'Campo obrigatório'
    ];
    
   

    public function render()
    {
        return view('livewire.employee.table-employees',[
            'listofemployees' => $this->getData(),
        ])->layout('layouts.employee.app');
        
    }

    public function getData (){
        try {
            
            if (empty($this->search)){
                return UserData::query()->get();  

            }else {
                return UserData::query()->where('name', 'LIKE', '%'.$this->search.'%')->get();
            }

        } catch (\Throwable $th) {
            $this->alert('error', 'ERRO', [
                'toast'=>false,
                'position'=>'center',
                 'showConfirmButton' => true,
                 'confirmButtonText' => 'OK',
                 'text'=>'Não existe uma conta com este e-mail!!!'                
              ]);
        }
    }


    public function saveEmployee (){
        $this->validate();
       try {
        \DB::beginTransaction();
        $addressData = Address::create([ 'city' => $this->city, 'street' => $this->street,'neighborhood' => $this->neighborhood]);          
        $personalData = UserData::create(['name' => $this->name, 'birthday' => $this->birthday, 'phone' => $this->phone, 'position' => $this->position,'address_id' => $addressData['id']]);
        \DB::commit();

        $this->alert('success', 'SUCESSO', [
            'toast'=>false,
            'position'=>'center',
             'showConfirmButton' => true,
             'confirmButtonText' => 'OK',
             'text'=>'Salvo com sucesso'                
          ]);

          $this->reset([ 'name' , 'phone', 'position', 'city', 'birthday', 'neighborhood', 'street']);
         
       
       } catch (\Throwable $th) {
        \DB::rollBack();
       
        $this->alert('error', 'ERRO', [
            'toast'=>false,
            'position'=>'center',
             'showConfirmButton' => true,
             'confirmButtonText' => 'OK',
             'text'=>'Erro ao realizar operação!'                
          ]);
       }
    }

    public function delete ($id){
        $this->employeeId = $id;

        $this->alert('warning', 'Confirmar',[
            'icon' => 'warning',
            'position' => 'center',
            'toast' => false,
            'text' => 'Deseja realmente excluir?',
            'showConfirmButton' => true,
            'showCancelButton' => true,
            'cancelButtonText' => 'Cancelar',
            'confirmButtonText' => 'Excluir',
            'confirmButtonColor' => '#3085d6',
            'cancelButtonColor' => '#d33',
            'timer' => 120000,
            'onConfirmed' => 'confirmRemoveEmployee'            
            ]);   
             
            }

        public function confirmRemoveEmployee () {
            try {
              $getaddress = UserData::query()->select('address_id')->where('id',$this->employeeId)->pluck('address_id');                
              $data =  UserData::find($this->employeeId)->delete();
               
              if ($getaddress){
                Address::query()->where('id', $getaddress)->delete();
              }                

            } catch (\Throwable $th) {
                $this->alert('error', 'ERRO', [
                    'toast'=>false,
                    'position'=>'center',
                     'showConfirmButton' => true,
                     'confirmButtonText' => 'OK',
                     'text'=>'Erro ao realizar operação!'                
                  ]);            }
        }
}
