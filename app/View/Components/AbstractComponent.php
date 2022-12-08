<?php

namespace App\View\Components;

use Illuminate\View\Component;

abstract class AbstractComponent extends Component
{

    /**
     * @return string
     */
    public function get_component_view_filename(): string
    {

        return $this->component_view_filename;

    }

    /**
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {

        return view($this->get_component_view_filename(), $this->get_view_data());
    }

}
