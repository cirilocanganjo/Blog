<?php

namespace App\Livewire\Employee\Components\Modals;

use App\Models\InfoNew;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormAddNew extends Component
{
    use LivewireAlert, WithFileUploads;

    public $title, $content, $cover_photo, $font;
    protected $rules = ['title' => 'required', 'content' => 'required', 'cover_photo' => 'required', 'font' => 'required',];
    protected $messages = [
        'title.required' => 'Campo obrigatório',
        'content.required' => 'Campo obrigatório',
        'cover_photo.required' => 'Campo obrigatório',
        'font.required' => 'Campo obrigatório',
    ];

    public function render()
    {
        return view('livewire.employee.components.modals.form-add-new');
    }

    public function save()
    {
        $this->validate($this->rules, $this->messages);
        try {


            $photoWithMask = '';
            if ($this->cover_photo) {
                $photoWithMask = md5($this->cover_photo->getClientOriginalName()) . '.' .
                    $this->cover_photo->getClientOriginalExtension();
                $this->cover_photo->storeAs('/public/images/', $photoWithMask);
            }



            InfoNew::create([
                "title" => $this->title,
                "content" => $this->content,
                "cover_photo" => $photoWithMask,
                "font" => $this->font,
                "user_id" => auth()->user()->id,
            ]);


            $this->alert('success', 'SUCESSO', [
                'toast' => false,
                'position' => 'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'text' => 'Operação Realizada Com Sucesso.'
            ]);
        } catch (\Exception $ex) {
            $this->alert('error', 'ERRO', [
                'toast' => false,
                'position' => 'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'timer' => '120000',
                'text' => 'Ocorreu um erro! ' . $ex->GetMessage()
            ]);
        }
    }
}
