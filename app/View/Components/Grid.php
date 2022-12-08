<?php

namespace App\View\Components;

class Grid extends AbstractComponent
{

    /**
     * @var string
     */
    protected string $component_view_filename = 'components.grid';

    /**
     * @var \App\Grid
     */
    private \App\Grid $grid_object;

    /**
     * @param \App\Grid $gridObject
     */
    public function __construct(\App\Grid $gridObject)
    {

        $this->grid_object = $gridObject;

    }

    /**
     * @return array
     */
    protected function get_view_data(): array
    {


        return [
            'grid_object' => $this->grid_object,
        ];

    }

}
