<div class="word word--{{ $word_object->get_content() }}"
     style="--width-calc-ratio: {{ config('mcaahny.character_width_calc_ratios.' . $word_object->get_content()) }}">

    @foreach($word_object->get_grid_objects() AS $grid_object)
        <x-grid :grid_object="$grid_object" :parent="$word_object" />
    @endforeach

</div>

@if($word_object->get_content() === 'happy')
    <span></span>
@endif
