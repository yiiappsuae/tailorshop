{{-- To center items in the DIV and make responsive--}}
<div class="pos_items_featured_center" id="featured_products_box" style="display: none;">
	@if(!empty($featured_products)) 
		@include('sale_pos.partials.featured_products')
	@endif
</div>
<div class="row">
	@if(!empty($categories))
		<div class="col-md-4" id="product_category_div">
			<select class="select2" id="product_category" style="width:100% !important">

				<option value="0">@lang('lang_v1.all_category')</option>

				@foreach($categories as $category)
					<option value="{{$category['id']}}">{{$category['name']}}</option>
				@endforeach

				@foreach($categories as $category)
					@if(!empty($category['sub_categories']))
						<optgroup label="{{$category['name']}}">
							@foreach($category['sub_categories'] as $sc)
								<i class="fa fa-minus"></i> <option value="{{$sc['id']}}">{{$sc['name']}}</option>
							@endforeach
						</optgroup>
					@endif
				@endforeach
			</select>
		</div>
	@endif

	@if(!empty($brands))
		<div class="col-sm-4" id="product_brand_div">
			{!! Form::select('size', $brands, null, ['id' => 'product_brand', 'class' => 'select2', 'name' => null, 'style' => 'width:100% !important']) !!}
		</div>
	@endif

	<!-- used in repair : filter for service/product -->
	<div class="col-md-6 hide" id="product_service_div">
		{!! Form::select('is_enabled_stock', ['' => __('messages.all'), 'product' => __('sale.product'), 'service' => __('lang_v1.service')], null, ['id' => 'is_enabled_stock', 'class' => 'select2', 'name' => null, 'style' => 'width:100% !important']) !!}
	</div>

	<div class="col-sm-4 @if(empty($featured_products)) hide @endif" id="feature_product_div">
		<button type="button" class="btn btn-primary btn-flat" id="show_featured_products">@lang('lang_v1.featured_products')</button>
	</div>
</div>

<div class="row">
	<div class="col-md-4" style="overflow-y: scroll;
    max-height: 700px;">
    <button id="product_category" name="bt0" class="btn btn-prni btn-default_ff" type="button" value="0"  tabindex="-1" title="All" style="width:100%;padding:2px;">
		All
		
		</button>	
@forelse($categories as $category)
		<button id="product_category" name="bt{{$category['id']}}" class="btn btn-prni btn-default_ff" type="button" value="{{$category['id']}}"  tabindex="-1" title="{{$category['name']}}" style="width:100%;padding:2px;">
			{{$category['name']}}
		
		</button>	
@empty
	<input type="hidden" id="no_products_found">
		<div class="col-md-12">
			<h4 class="text-center">
				@lang('lang_v1.no_products_to_display')
			</h4>
		</div>
@endforelse
	</div>
	<div class="col-md-8">
		<div class="{{$theme_pos_class}}" style="border-radius: 4px; border: 2px solid #FFF;" >
	{{-- 
	<i class="fas fa-align-left"></i> @lang('product.available_products')  
	<i class="fas fa-hamburger"></i>
	<i class="fas fa-hotdog"></i> 
	<i class="fas fa-coffee"></i> <i> ... @lang('product.category'): </i> 
	<input class="{{$theme_pos_class}}" disabled id="name_category"  style="border:#ccc; align:center;" >
 	--}}
		{{-- #JCN using pagination no scroll background-color:#D0D5DD; --}}
		<div class="btn-group btn-group-justified pos-grid-nav">
			<div class="btn-group">
				<button style="color: #FFF" class="btn {{$theme_pos_class}}" title="Previous" type="button" id="previous">
					<i class="fa fa-chevron-circle-left fa-lg" aria-hidden="true" > </i> @lang('lang_v1.previous') 
				</button>
			</div>
			<div class="btn-group primary">
				<input  disabled class="btn"  id="name_category" style="background-color:#D0D5DD; font-weight: bold; text-align: center;color: red; "> 
			</div>

			<div class="btn-group">
				<button style="color: #FFF" class="btn {{$theme_pos_class}}" title="Next" type="button" id="next">
					@lang('lang_v1.next') <i class="fa fa-chevron-circle-right fa-lg" aria-hidden="true"></i>
				</button>
			</div>
		</div>
		{{-- #JCN End  --}}
	</div>
	<input type="hidden" id="suggestion_page" value="1">
	{{-- To center items in the DIV and make responsive pos_items_products_center --}}
	<div class="col-md-12" style="padding-left:10px;padding-right:10px;">
		<div class="pos_items_products_center col-md-12" style="padding-left:0px;padding-right:0px;" id="product_list_body"  ></div>

	<div class="col-md-12 text-center" id="suggestion_page_loader" style="display: none; ">
		<i class="fa fa-spinner fa-spin fa-2x" style="color:red"></i>
	</div>
</div>
	</div>
</div>
<!-- Divider and categories-->
<div style="clear:both; padding: 2px 0px 2px 0px;"></div> 
{{-- To center items in the DIV and make responsive--}}
<div class="pos_items_category_center {{$theme_pos_class}}" style="border: 0px" > {{-- To center items in the DIV + responsive--}}

</div>


<div class="row">


{{-- Testing previous and next --}}
