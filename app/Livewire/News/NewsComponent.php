<?php

namespace App\Livewire\News;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use App\Models\InfoNew;
use Livewire\WithFileUploads;


class NewsComponent extends Component
{
    use LivewireAlert, WithFileUploads;

    public $title, $content, $cover_photo, $font;
    public function render()
    {


        return view('livewire.news.news-component', [
            'allnews' => $this->getAllNews(),
        ])->layout('layouts.employee.app');
    }

    public function getAllNews()
    {
        try {
            return InfoNew::query()->get();
        } catch (\Throwable $th) {
            $this->alert('error', 'ERRO', [
                'toast' => false,
                'position' => 'center',
                'showConfirmButton' => true,
                'confirmButtonText' => 'OK',
                'timer' => '120000',
                'text' => 'Ocorreu um erro! ' . $th->GetMessage()
            ]);
        }
    }
}
