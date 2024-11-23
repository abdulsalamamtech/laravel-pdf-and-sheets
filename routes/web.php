<?php

use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});



Route::get('/generate-pdf', [PdfController::class, 'generatePDF']);


Route::get('/joaovdiasb-laravel-pdf-manager', [PdfController::class, 'joaovdiasbLaravelPdfManager']);


// spatieLaravelPdfWithCss
Route::get('/spatie-laravel-pdf', [PdfController::class, 'spatieLaravelPdf']);

// spatieLaravelPdfWithTailwind
Route::get('/spatie-laravel-pdf-with-tailwind', [PdfController::class, 'spatieLaravelPdfWithTailwind']);



// spatieLaravelPdfWithTailwind
Route::get('/spatie-laravel-pdf-with-tailwind-and-format', [PdfController::class, 'spatieLaravelPdfWithTailwindAndFormat']);

