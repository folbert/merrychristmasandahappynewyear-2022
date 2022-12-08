<?php

namespace App\View\Components;

use App\Canvas;

class GridCell extends AbstractComponent
{

    /**
     * @var string
     */
    protected string $component_view_filename = 'components.grid-cell';

    /**
     * @param \App\GridCell $gridCellObject
     */
    public function __construct(\App\GridCell $gridCellObject)
    {

        $this->grid_cell_object = $gridCellObject;

    }

    /**
     * @return array
     */
    public function get_view_data(): array
    {

        return [
            'filled' => !empty(trim($this->grid_cell_object->get_content())),
        ];

    }

}
