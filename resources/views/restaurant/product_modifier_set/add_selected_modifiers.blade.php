@if (empty($edit_modifiers))
    <small>
      
        @foreach ($modifiers as $modifier)
            <div class="product_modifier">
                
                

               <p class="<?php if($modifier->measure <= 0 ) {  echo 'hide'; } ?>"> {{ $modifier->name }} (<span
                    class="modifier_qty_text">{{ @num_format($modifier->measure) }} Inches</span>) </p>
                <input type="hidden" name="products[{{ $index }}][modifier][]" value="{{ $modifier->id }}">
                <input type="hidden" class="modifiers_price" name="products[{{ $index }}][modifier_price][]"
                    value="{{ @num_format($modifier->sell_price_inc_tax) }}">
                <input type="hidden" class="modifiers_quantity"
                    name="products[{{ $index }}][modifier_quantity][]" value="{{ $quantity }}">
                <input type="hidden" class="modifiers_measure"
                    name="products[{{ $index }}][modifiers_measure][]" value="{{ $modifier->measure }}">
                <input type="hidden" name="products[{{ $index }}][modifier_set_id][]"
                    value="{{ $modifier->product_id }}">

                            </div>
        @endforeach
    </small>
    <small>Metrial Required : {{$metrial_need}}</small><br>
    <small>Metrial : {{$metrial->name}}</small>
    <small>Farah : {{$farah->name}}</small>
     <input type="hidden" name="products[{{ $index }}][metrial_need]" value="{{ $metrial_need }}">
     <input type="hidden" name="products[{{ $index }}][metrial_id]" value="{{ $metrial_id }}">
     <input type="hidden" name="products[{{ $index }}][farah_id]" value="{{ $farah_id }}">

@else
    @foreach ($modifiers as $modifier)
        <div class="product_modifier">
            {{ $modifier->variations->name ?? '' }} (<span
                    class="modifier_qty_text">{{ @num_format($modifier->measure) }} Inches</span>)
            <input type="hidden" name="products[{{ $index }}][modifier][]"
                value="{{ $modifier->variation_id }}">
            <input type="hidden" class="modifiers_price" name="products[{{ $index }}][modifier_price][]"
                value="{{ @num_format($modifier->unit_price_inc_tax) }}">
            <input type="hidden" class="modifiers_quantity" name="products[{{ $index }}][modifier_quantity][]"
                value="{{ $modifier->quantity }}">
            <input type="hidden" class="modifiers_measure" name="products[{{ $index }}][modifiers_measure][]"
                value="{{ $modifier->measure }}">
            <input type="hidden" name="products[{{ $index }}][modifier_set_id][]"
                value="{{ $modifier->product_id }}">
            <input type="hidden" name="products[{{ $index }}][modifier_sell_line_id][]"
                value="{{ $modifier->id }}">
        </div>
    @endforeach
    <small>Metrial Required : {{$metrial_need}}</small><br>
    <small>Metrial : {{$metrial->name}}</small>
    <small>Farah : {{$farah->name}}</small>
     <input type="hidden" name="products[{{ $index }}][metrial_need]" value="{{ $metrial_need }}">
     <input type="hidden" name="products[{{ $index }}][metrial_id]" value="{{ $metrial_id }}">
     <input type="hidden" name="products[{{ $index }}][farah_id]" value="{{ $farah_id }}">
     
@endif
