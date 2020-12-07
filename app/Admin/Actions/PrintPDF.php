<?php


namespace App\Admin\Actions;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;

class PrintPDF extends RowAction
{
    public $name = 'PDF Print';

    public function handle()
    {
        $key = $this->getKey();
        return $this->response()->download("emps/$key/printPDF");
    }

    /**
     * @return  string

    public function href()
    {
        $key = $this->getKey();
        return URL::current()."/$key/printPDF";
    }*/
}