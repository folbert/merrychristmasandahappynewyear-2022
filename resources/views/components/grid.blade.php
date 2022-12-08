<div class="character character--{{ $grid_object->get_template_filename() }}" style="--nr-of-cols: {{ $grid_object->get_nr_of_cols() }}; --nr-of-rows: {{ $grid_object->get_nr_of_rows() }}">
    @for($column_index = 0; $column_index < $grid_object->get_nr_of_cols(); $column_index++)
        <div class="column" data-col-index="{{ $column_index }}">
        @for($row_index = 0; $row_index < $grid_object->get_nr_of_rows(); $row_index++)
            <x-grid-cell :grid_cell_object="$grid_object->get_cell($row_index, $column_index)" />
        @endfor
        </div>
    @endfor
</div>
