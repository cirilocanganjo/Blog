<?php
use Illuminate\Support\Facades\Route;
use App\Livewire\Employee\{HomeComponent,TableEmployees};
use App\Livewire\News\{NewsComponent};

Route::middleware(['auth', 'employee'])->group(function(){
    Route::get('/funcionario/inicio', HomeComponent::class)->name('dashboard.employee');
    Route::get('/lista/funcionarios', TableEmployees::class)->name('table.employees');
    Route::get('/noticias', NewsComponent::class)->name('dashboard.news');
});
