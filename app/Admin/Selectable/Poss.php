<?php


namespace App\Admin\Selectable;

use App\Pos;
use Encore\Admin\Grid\Filter;
use Encore\Admin\Grid\Selectable;

class Poss extends Selectable
{
    public $model = Pos::class;

    public function make()
    {
        $this->column('id');
        $this->column('name');

        $this->filter(function (Filter $filter) {
            $filter->like('name');
        });
    }
}