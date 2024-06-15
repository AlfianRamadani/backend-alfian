<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $type;
    public $name;
    public $class;
    public $id;
    public $value;
    public $onclick;
    public $form;
    public $disabled;
    public $data;
    public $data_target;
    public $data_toggle;
    public $data_dismiss;
    public $data_bs_toggle;
    public $icon;
    public $text;
    public $addition;
    public function __construct(
        $type = 'button',
        $name = '',
        $class = '',
        $id = '',
        $value = '',
        $onclick = '',
        $form = '',
        $disabled = false,
        $data = [],
        $data_target = '',
        $data_toggle = '',
        $data_dismiss = '',
        $data_bs_toggle = '',
        $icon = '',
        $text = 'Button',
        $addition = '',
    ) {
        $this->type = $type;
        $this->name = $name;
        $this->class = $class;
        $this->id = $id;
        $this->value = $value;
        $this->onclick = $onclick;
        $this->form = $form;
        $this->disabled = $disabled;
        $this->data = $data;
        $this->data_target = $data_target;
        $this->data_toggle = $data_toggle;
        $this->data_dismiss = $data_dismiss;
        $this->data_bs_toggle = $data_bs_toggle;
        $this->icon = $icon;
        $this->text = $text;
        $this->addition = $addition;
    }

    public function render()
    {
        return view('components.button');
    }
}
