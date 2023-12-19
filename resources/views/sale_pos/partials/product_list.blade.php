{{-- dump($products->lastPage()) --}}
@forelse($products as $product)
<div class="col-md-4 no-print" style="padding:0;width: 31%;margin:2px;"> {{-- #JCN change col-md-2 col-xs-3 for css pos_product_list--}}


	<div class="product_box btn-default_ff" data-variation_id="{{$product->id}}" title="{{$product->name}} @if($product->type == 'variable')- {{$product->variation}} @endif {{ '(' . $product->sub_sku . ')'}} @if(!empty($show_prices)) @lang('lang_v1.default') - @format_currency($product->selling_price) @foreach($product->group_prices as $group_price) @if(array_key_exists($group_price->price_group_id, $allowed_group_prices)) {{$allowed_group_prices[$group_price->price_group_id]}} - @format_currency($group_price->price_inc_tax) @endif @endforeach @endif">
	

		<div class="text_div">
			<small class="text text-muted">{{$product->name}} 
			</small>
			{{-- Add to see the stock in the POS of course needs a refresh after sell pending--}}
			@if ($product->type == "single" || $product->type == "variable" )
				@if ($product->qty_available > 5 ) {{-- there is available stock greeen --}}
					<i class="fas fa-arrow-circle-up" style="color:green"></i>
					<small class="text-muted" style="color: green">
						@if ($product->type == "single") 
							{{$product->sub_sku}}:
						@else
							{{$product->variation}}: {{--Variable--}}
						@endif
						{{number_format($product->qty_available)}}
					</small>
				@elseif ($product->qty_available > 0 ) {{-- there is available stock low orange --}}
					<i class="fas fa-arrow-circle-right" style="color: orange"></i> 
					<small class="text-muted" style="color: orange">
						@if ($product->type == "single") 
							{{$product->sub_sku}}:
						@else
							{{$product->variation}}: {{--Variable--}}
						@endif
						{{number_format($product->qty_available)}}
					</small>
				@else
					<i class="fas fa-arrow-circle-down" style="color:red"></i>
					<small class="text-muted" style="color: red"> {{-- there isn't available stock red --}}
						@if ($product->type == "single") 
							{{$product->sub_sku}}:
						@else
							{{$product->variation}}: {{--Variable--}}
						@endif 
						{{number_format($product->qty_available)}}
					</small>
				@endif
			@else
				<small class="text-muted" >
					<i class="fas fa-grip-vertical"></i>
					({{$product->sub_sku}})
				</small>
			@endif
		</div>
	</div>
</div>
<script type="text/javascript">
	var lastPage = {{ $products->lastPage() }}
	var currentPage = {{ $products->currentPage() }}

	if (currentPage == lastPage)
		$('#next').attr('disabled','disabled');
    else
        $('#next').removeAttr('disabled');

	if (currentPage > 1)
		$('#previous').removeAttr('disabled');
	else
		$('#previous').attr('disabled','disabled');

</script>

@empty
	<input type="hidden" id="no_products_found" >
	<div class="col-md-12">
		<h4 class="text-center">
			@lang('lang_v1.no_products_to_display')
		</h4>
	</div>
<script type="text/javascript">

//#JCN If there isn't products to display $products->total() = 0
var totalProducts = {{ $products->total() }}
//#JCN Disable the button´s
if (totalProducts == 0)
	{
		$('#previous').attr('disabled','disabled');
		$('#next').attr('disabled','disabled');
    }

</script>
	
@endforelse

{{-- $products->links() --}}