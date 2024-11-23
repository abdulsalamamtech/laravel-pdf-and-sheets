<?php

use App\Http\Controllers\ExcelController;
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





// Create Excel file
Route::get('/spatie-laravel-excel', [ExcelController::class, 'createExcelFile']);



// creating large excel file
Route::get('/spatie-laravel-excel-large', [ExcelController::class, 'createLargeExcelFile']);


// creatinfg advance laravel file
Route::get('/spatie-laravel-excel-advance', [ExcelController::class, 'createAdvanceExcelFile']);

