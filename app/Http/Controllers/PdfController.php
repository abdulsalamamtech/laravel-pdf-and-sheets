<?php

namespace App\Http\Controllers;

// use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Joaovdiasb\LaravelPdfManager\PdfManager;
use Spatie\LaravelPdf\Enums\Format;
use Spatie\LaravelPdf\Facades\Pdf;

class PdfController extends Controller
{
    //


    // joaovdiasb-laravel-pdf-manager
    public function generatePDF(){

    }


    // https://github.com/joaovdiasb/laravel-pdf-manager
    public function joaovdiasbLaravelPdfManager(){

        $pdf = (new PdfManager)
        // ->setHeader(view('pdfs.header'))
        ->setFooter('DOCUMENT FOOTER')
        ->setBody(str_repeat('<u>[NAME]</u><br />', 100))
        ->setData(['[NAME]' => 'Jhon Doe'])
        ->setPageCounter()
        ->save('documents');

        return ($pdf);
    }


    // https://spatie.be/docs/laravel-pdf/v1/introduction
    // https://github.com/spatie/laravel-pdf
    // composer require spatie/laravel-pdf
    // npm install puppeteer
    public function spatieLaravelPdf(){
        $invoice = [
            'amount' => 20,
            'currency' => 'USD',
        ];

       $done =  Pdf::view('pdfs.invoice', ['invoice' => $invoice])
            ->format('a4')
            ->save('invoice.pdf');

        return $done;
    }


    // tailwind-invoice.blade

    public function spatieLaravelPdfWithTailwind(){
        $invoice = [
            'amount' => 20,
            'currency' => 'USD',
        ];

       $done =  Pdf::view('pdfs.tailwind-invoice', ['invoice' => $invoice])
            ->format('a4')
            ->save('invoice.pdf');

        return $done;
    }


    //When you hit that controller, a formatted PDF will be downloaded.
    // namespace App\Http\Controllers;

    //     use function Spatie\LaravelPdf\Support\pdf;

    //     class DownloadInvoiceController
    //     {
    //         public function __invoke()
    //         {
    //             return pdf('pdf.invoice', [
    //                 'invoiceNumber' => '1234',
    //                 'customerName' => 'Grumpy Cat',
    //             ]);
    //         }
    //     }



        // tailwind-invoice.blade with tailwind and format
        // https://spatie.be/docs/laravel-pdf/v1/basic-usage/formatting-pdfs
        public function spatieLaravelPdfWithTailwindAndFormat(){
            $invoice = [
                'amount' => 20,
                'currency' => 'USD',
            ];


            $top = 20;
            $right = 10;
            $bottom = 10;
            $left = 10;

           $done =  Pdf::view('pdfs.tailwind-invoice-and-format', ['invoice' => $invoice])
                ->format('a4')
                // ->format('a6')
                // ->format(Format::A0)
                ->margins($top, $right, $bottom, $left)
                ->save('invoice.pdf');

            return $done;
        }


}
