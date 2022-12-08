<?php

namespace App;

class Word
{

    /**
     * @var string
     */
    private string $content;

    /**
     * @var Grid[]
     */
    private array $grid_objects;

    /**
     * @param string $content
     */
    public function __construct(string $content)
    {

        $this->content = $content;
        $this->load_grid_objects();

    }

    /**
     * @return void
     */
    private function load_grid_objects(): void
    {

        $characters = str_split($this->content);
        $this->grid_objects = [];

        foreach($characters AS $character) {

            $this->grid_objects[] = new Grid($character);

        }

    }

    /**
     * @return string
     */
    public function get_content(): string
    {

        return $this->content;

    }

    /**
     * @return Character[]
     */
    public function get_grid_objects(): array
    {

        return $this->grid_objects;

    }

    /**
     * @return int
     */
    public function get_nr_of_filled_cells(): int
    {

        $filled_cells = 0;

        foreach($this->get_grid_objects() AS $grid_object) {

            $filled_cells += $grid_object->get_nr_of_filled_cells();

        }

        return $filled_cells;

    }

}
