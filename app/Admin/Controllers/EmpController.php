<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\PrintPDF;
use App\Admin\Selectable\Poss;
use App\Emp;
use PDF;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class EmpController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Emp';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Emp());

        //ADD Custom Action
        $grid->actions(function ($actions) {
            $actions->add(new PrintPDF());
        });
        //end

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('pos.name', __('Posisi'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));



        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Emp::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('pos.name', __('Posisi'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Emp());

        $form->text('name', __('Name'));
        //$form->select('pos_id', __('Position'))->options(Pos::all()->pluck('name','id'));
        $form->belongsTo('pos_id', Poss::class, 'Position');

        return $form;
    }

    public function printPDF($id){
        $emp = Emp::find($id);
        $pdf = PDF::loadView('emp_pdf',['emp'=>$emp]);
        return $pdf->stream('emp.pdf');
    }


}
