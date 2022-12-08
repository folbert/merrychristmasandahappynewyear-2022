@php $cell_class_attribute = ''; @endphp
@if($filled)
    @php $cell_class_attribute = ' cell--filled cell--emoji-' . rand(1,2) . ' cell--emoji-shade-' . rand(1,5) @endphp
@endif

<div class="cell{{ $cell_class_attribute }}"></div>
