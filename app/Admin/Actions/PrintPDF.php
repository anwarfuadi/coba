<?php


namespace App\Admin\Actions;


use Encore\Admin\Actions\RowAction;
use Illuminate\Support\Facades\URL;

class PrintPDF extends RowAction
{
    public $name = 'PDF Print';

    /**
     * @return  string
     */
    public function href()
    {
        $key = $this->getKey();
        return URL::current()."/$key/printPDF";
    }
}