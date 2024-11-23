<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\SimpleExcel\SimpleExcelWriter;



use OpenSpout\Common\Entity\Style\Color;
use OpenSpout\Common\Entity\Style\CellAlignment;
use OpenSpout\Common\Entity\Style\Style;
use OpenSpout\Common\Entity\Style\Border;
use OpenSpout\Common\Entity\Style\BorderPart;



class ExcelController extends Controller
{
    // Writing an Excel file
    //  composer require spatie/simple-excel
    //  https://packagist.org/packages/spatie/simple-excel


    // Advance content on excel
    // https://towardsdev.com/export-and-import-laravel-10-using-spatie-simple-excel-2685630df847

    public function createExcelFile(){

        $writer = SimpleExcelWriter::streamDownload('your-export.xlsx')
            ->addRow([
                'first_name' => 'John',
                'last_name' => 'Doe',
            ])
            ->addRow([
                'first_name' => 'Jane',
                'last_name' => 'Doe',
            ])
            ->toBrowser();


            // writing multiple rows
            // $writer = SimpleExcelWriter::streamDownload('your-export.xlsx')
            // ->addRows([[
            //     'first_name' => 'John',
            //     'last_name' => 'Doe',
            // ],
            // [
            //     'first_name' => 'Jane',
            //     'last_name' => 'Doe',
            // ]])->toBrowser();

    }


    // Make sure to call flush() if you're sending large streams to the browser
    public function createLargeExcelFile(){

        $now = now()->format('Y-m-d H:i:s');
        $file_name = 'export-' . Str::slug($now). '.xlsx';
        $writer = SimpleExcelWriter::streamDownload($file_name);

        // foreach (range(1, 10_000) as $i) {
        foreach (range(1, 1000) as $i) {
            $writer->addRow([
                'first_name' => 'John',
                'last_name' => 'Doe',
                'time' => $now,
            ]);

            if ($i % 1000 === 0) {
                flush(); // Flush the buffer every 1000 rows
            }
        }

        $writer->toBrowser();

    }


    public function createAdvanceExcelFile(){




        /* Create a border around a cell */
        $border = new Border(
            new BorderPart(Border::BOTTOM, Color::LIGHT_BLUE, Border::WIDTH_THIN, Border::STYLE_SOLID),
            new BorderPart(Border::LEFT, Color::LIGHT_BLUE, Border::WIDTH_THIN, Border::STYLE_SOLID),
            new BorderPart(Border::RIGHT, Color::LIGHT_BLUE, Border::WIDTH_THIN, Border::STYLE_SOLID),
            new BorderPart(Border::TOP, Color::LIGHT_BLUE, Border::WIDTH_THIN, Border::STYLE_SOLID)
        );

        $style = (new Style())
            ->setFontBold()
            ->setFontSize(15)
            ->setFontColor(Color::BLUE)
            ->setShouldWrapText()
            ->setBackgroundColor(Color::YELLOW)
            ->setBorder($border);


        // $writer->addRow(['with', 'a', 'border']);


        $now = now()->format('Y-m-d H:i:s');
        $file_name = 'export-' . Str::slug($now). '.xlsx';
        $writer = SimpleExcelWriter::streamDownload($file_name);


        $writer->setHeaderStyle($style);

        // foreach (range(1, 10_000) as $i) {
        foreach (range(1, 1000) as $i) {
            // $writer->addRow([
            //     'first_name' => 'John',
            //     'last_name' => 'Doe',
            //     'time' => $now,
            // ]);

            $writer->addRow(['values', 'of', 'the', 'row'], $style);


            if ($i % 100 === 0) {
                // Flush the buffer every 1000 rows
                flush();
            }
        }

        $writer->toBrowser();

    }


}
