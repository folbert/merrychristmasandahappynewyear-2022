<?php

namespace App;

class Grid
{

    /**
     * @var string
     */
    private string $template_filename;

    /**
     * @var Template
     */
    private Template $template;

    /**
     * @var GridCell[]
     */
    private array $grid;

    /**
     * @var int
     */
    private int $nr_of_cols;

    /**
     * @var int
     */
    private int $nr_of_rows;

    /**
     * @param string $template_filename
     */
    public function __construct(string $template_filename)
    {

        $this->template_filename = $template_filename;
        $this->nr_of_cols = -1;
        $this->nr_of_rows = -1;

        $this->load_template();

        $this->parse_template_to_grid();

    }

    /**
     * @return void
     */
    private function load_template(): void
    {

        $this->template = new Template();

        try {
            $this->template->load_file('static-assets/grid-templates/' . $this->template_filename . '.txt');
        } catch(Exception $e) {
            die($e->getMessage());
        }

    }

    /**
     * @return void
     */
    private function parse_template_to_grid(): void
    {

        $this->grid = [];

        foreach(array_keys($this->template->get_lines()) as $line_index) {

            $items_on_line = $this->get_items_from_line($line_index);

            $items_on_line = $this->fill_line($items_on_line, $line_index);

            $this->grid[] = $items_on_line;

        }

    }

    /**
     * @param $items
     * @param $line_index
     * @return array
     */
    private function fill_line($items, $line_index): array
    {

        while(count($items) < $this->template->get_line_max_length()) {

            $items[] = new GridCell(' ', $line_index, count($items) - 1);

        }

        return $items;

    }

    /**
     * @return void
     */
    private function load_nr_of_cols(): void
    {

        $max_nr_of_cols = 0;

        foreach($this->grid as $row) {

            $max_nr_of_cols = max($max_nr_of_cols, count($row));

        }

        $this->nr_of_cols = $max_nr_of_cols;

    }

    /**
     * @param int $line_index
     * @return array
     */
    private function get_items_from_line(int $line_index): array
    {

        $grid_item_objects = [];

        foreach($this->template->get_items_from_line($line_index) AS $item_index => $item_content) {

            $grid_item_objects[] = new GridCell($item_content, $line_index, $item_index);

        }

        return $grid_item_objects;

    }

    /**
     * @return int
     */
    public function get_nr_of_cols(): int
    {

        if($this->nr_of_cols === -1) {
            $this->load_nr_of_cols();
        }

        return $this->nr_of_cols;

    }

    /**
     * @return int
     */
    public function get_nr_of_rows(): int
    {

        if($this->nr_of_rows === -1) {
            $this->nr_of_rows = count($this->grid);
        }

        return $this->nr_of_rows;

    }

    /**
     * @return string
     */
    public function get_template_filename(): string
    {

        return $this->template_filename;

    }

    /**
     * @param int $row_index
     * @param int $column_index
     * @return GridCell
     */
    public function get_cell(int $row_index, int $column_index): GridCell
    {

        return $this->grid[$row_index][$column_index];

    }

    /**
     * @param int $row_index
     * @param int $column_index
     * @return string
     */
    public function get_cell_content(int $row_index, int $column_index): string
    {

        if(!isset($this->grid[$row_index][$column_index])) {
            return '';
        }

        return trim($this->grid[$row_index][$column_index]);

    }

    /**
     * @return int
     */
    public function get_nr_of_filled_cells(): int
    {

        $filled_cells = 0;

        for($column_index = 0; $column_index < $this->get_nr_of_cols(); $column_index++) {
            for($row_index = 0; $row_index < $this->get_nr_of_rows(); $row_index++) {

                if(!empty(trim($this->get_cell($row_index, $column_index)->get_content()))) {
                    $filled_cells++;
                }

            }
        }

        return $filled_cells;

    }

}
