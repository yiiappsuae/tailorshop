<div class="body2">
<table style="width:100%;">
	<thead>
		<tr>
			<td>
			<div class="col-xs-3">
                <!-- Logo -->
    @if(!empty($receipt_details->logo))
        <img style="max-height: auto; width: 80px;" src="{{$receipt_details->logo}}" class="img">
    
            @endif
        </div>
			
			<div class="col-md-6">
		
		@if(!empty($receipt_details->header_text))
		   {!! $receipt_details->header_text !!}
		@endif
			</div>
			<div class="clearfix"></div>
				
	<div class="col-md-4  invoice-col caja">
		
	
		<!-- Negocio & Datos -->

			<span>
				@if(!empty($receipt_details->display_name))
					{{$receipt_details->display_name}}
					<br/>
				@endif
				@if(!empty($receipt_details->sub_heading_line1))
			{{ $receipt_details->sub_heading_line1 }}<br/>
		@endif
				@if(!empty($receipt_details->address))
					{!! $receipt_details->address !!}
				@endif

				@if(!empty($receipt_details->contact))
					<br/>{!! $receipt_details->contact !!}
				@endif

				@if(!empty($receipt_details->website))
					<br/>{{ $receipt_details->website }}
				@endif

				@if(!empty($receipt_details->tax_info1))
					<br/>{{ $receipt_details->tax_label1 }} {{ $receipt_details->tax_info1 }}
				@endif

				@if(!empty($receipt_details->tax_info2))
					<br/>{{ $receipt_details->tax_label2 }} {{ $receipt_details->tax_info2 }}
				@endif

				@if(!empty($receipt_details->location_custom_fields))
					<br/>{{ $receipt_details->location_custom_fields }}
				@endif
			</span>

	
</div>
</div>
	<div class="invoice-info">
	<div class="col-md-4 invoice-col caja">

		<div class="text-right font-15">
			@if(!empty($receipt_details->invoice_no_prefix))
				<span class="pull-left">{!! $receipt_details->invoice_no_prefix !!}</span>
			@endif

			{{$receipt_details->invoice_no}}
		</div>

		
		<!-- Fecha-->
		@if(!empty($receipt_details->date_label))
			<div class="text-right font-15 ">
				<span class="pull-left">
					{{$receipt_details->date_label}}
				</span>

				{{$receipt_details->invoice_date}}
			</div>
		@endif
		
		<div class="word-wrap">
			@if(!empty($receipt_details->customer_label))
				<b>{{ $receipt_details->customer_label }}</b>
			@endif

			<!-- Info Cliente -->
			@if(!empty($receipt_details->customer_info))
				{!! $receipt_details->customer_info !!}
			@endif
			@if(!empty($receipt_details->client_id_label))
				<br/>
				<strong>{{ $receipt_details->client_id_label }}</strong> {{ $receipt_details->client_id }}
			@endif
			@if(!empty($receipt_details->customer_tax_label))
				<br/>
				<strong>{{ $receipt_details->customer_tax_label }}</strong> {{ $receipt_details->customer_tax_number }}
			@endif
			@if(!empty($receipt_details->customer_custom_fields))
				<br/>{!! $receipt_details->customer_custom_fields !!}
			@endif
			@if(!empty($receipt_details->sales_person_label))
				<br/>
				<strong>{{ $receipt_details->sales_person_label }}</strong> {{ $receipt_details->sales_person }}
			@endif

			@if(!empty($receipt_details->commission_agent_label))
				<br/>
				<strong>{{ $receipt_details->commission_agent_label }}</strong> {{ $receipt_details->commission_agent }}
			@endif

			@if(!empty($receipt_details->customer_rp_label))
				<br/>
				<strong>{{ $receipt_details->customer_rp_label }}</strong> {{ $receipt_details->customer_total_rp }}
			@endif

			<!-- Tipo de servicios -->
			@if(!empty($receipt_details->types_of_service))
				<span class="pull-left text-left">
					<strong>{!! $receipt_details->types_of_service_label !!}:</strong>
					{{$receipt_details->types_of_service}}
					<!-- Info -->
					@if(!empty($receipt_details->types_of_service_custom_fields))
						<br>
						@foreach($receipt_details->types_of_service_custom_fields as $key => $value)
							<strong>{{$key}}: </strong> {{$value}}@if(!$loop->last), @endif
						@endforeach
					@endif
				</span>
			@endif
		</div>
	</div>
	<div class="invoice-info">
	<div class="col-md-4 invoice-col caja">
	@if(!empty($receipt_details->due_date_label))
			<div class="text-right font-15 ">
				<span class="pull-left">
					{{$receipt_details->due_date_label}}
				</span>

				{{$receipt_details->due_date ?? ''}}
			</div>
		@endif

	<div class="text-right padding-4">
	<span class="pull-left">
					Estado:
				</span>
				       		@if(!empty($receipt_details->invoice_heading))
				{!! $receipt_details->invoice_heading !!}
				</div>	
		@endif
		@if(!empty($receipt_details->sub_heading_line2))
				<div class="text-right padding-4">
				<span class="pull-left">
					Ciudad:
				</span>
			{{ $receipt_details->sub_heading_line2 }}
			</div>	
		@endif
		@if(!empty($receipt_details->sub_heading_line3))
	<div class="text-right padding-4">
	<span class="pull-left">
					Actividad Economica:
				</span>
			{{ $receipt_details->sub_heading_line3 }}
			</div>	
		@endif
		<!-- Total Saldo-->
		@if(!empty($receipt_details->all_due))
			<div class="bg-light-blue-active text-right">
				<span class="pull-left bg-light-blue-active">
					{!! $receipt_details->all_bal_label !!}
				</span>

				{{$receipt_details->all_due}}
				
			</div>
		@endif
	</div>

			</td>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>
<!-- informacion -->

</div>
<div class="row mt-5">
<div class="col-xs-12">
		<table class="table table-bordered table-no-top-cell-border table-slim mb-12">
			<thead>
				<tr style="background-color: #357ca5 !important; color: white !important; font-size: 11	px !important" class="table-no-side-cell-border table-no-top-cell-border text-center">
					<td style="background-color: #357ca5 !important; color: white !important; width: 4% !important">COD</td>
					
					@php
						$p_width = 60;
					@endphp
					@if($receipt_details->show_cat_code == 1)
						@php
							$p_width -= 10;
						@endphp
					@endif
					@if(!empty($receipt_details->item_discount_label))
						@php
							$p_width -= 10;
						@endphp
					@endif
					<td style="background-color: #357ca5 !important; color: white !important; width: {{$p_width}}% !important">
						{{$receipt_details->table_product_label}}
					</td>
					
					<td style="background-color: #357ca5 !important; color: white !important; width: 8% !important;">
						{{$receipt_details->table_qty_label}}
					</td>
					<td style="background-color: #357ca5 !important; color: white !important; width: 15% !important;">
						{{$receipt_details->table_unit_price_label}}
					</td>
					@if(!empty($receipt_details->item_discount_label))
					<td style="background-color: #357ca5 !important; color: white !important; width: 0% !important;">
						{{$receipt_details->item_discount_label}}
					</td>
					@endif
					<td style="background-color: #357ca5 !important; color: white !important; width: 15% !important;">
						{{$receipt_details->table_subtotal_label}}
					</td>
				</tr>
			</thead>
			<tbody>
				@php
					$subtotal = 0;
				@endphp
				@foreach($receipt_details->lines as $line)
					<tr>
						<td class="text-center">
							  @if(!empty($line['sub_sku'])) {{$line['sub_sku']}} @endif 
						</td>
						<td>
							@if(!empty($line['image']))
								<img src="{{$line['image']}}" alt="Image" width="0" style="float: left; margin-right: 8px;">
							@endif
                            {{$line['name']}} {{$line['product_variation']}} {{$line['variation']}} 
                            @if(!empty($line['brand'])), {{$line['brand']}} @endif
                            @if(!empty($line['product_custom_fields'])), {{$line['product_custom_fields']}} @endif
                            @if(!empty($line['sell_line_note']))
                            <br>
                            <small>{{$line['sell_line_note']}}</small>
                            @endif
                            @if(!empty($line['lot_number']))<br> {{$line['lot_number_label']}}:  {{$line['lot_number']}} @endif 
                            @if(!empty($line['product_expiry'])), {{$line['product_expiry_label']}}:  {{$line['product_expiry']}} @endif 

                            @if(!empty($line['warranty_name'])) <br><small>{{$line['warranty_name']}} </small>@endif @if(!empty($line['warranty_exp_date'])) <small>- {{@format_date($line['warranty_exp_date'])}} </small>@endif
                            @if(!empty($line['warranty_description'])) <small> {{$line['warranty_description'] ?? ''}}</small>@endif
                        </td>



						<td class="text-center">
							{{$line['quantity']}} {{$line['units']}}
						</td>
						<td class="text-right">
							{{$line['unit_price_inc_tax']}} 
						</td>
						@if(!empty($receipt_details->item_discount_label))
						<td class="text-right">
							{{$line['total_line_discount'] ?? '0.00'}}
						</td>
						@endif
						<!-- aqui es total sin impuesto -->
						<td class="text-right">
							{{$line['line_total']}}
						</td>
					</tr>
					@if(!empty($line['modifiers']))
						@foreach($line['modifiers'] as $modifier)
							<tr>
								<td class="text-center">
									&nbsp;
								</td>
								<td>
		                            {{$modifier['name']}} {{$modifier['variation']}} 
		                            @if(!empty($modifier['sub_sku'])), {{$modifier['sub_sku']}} @endif 
		                            @if(!empty($modifier['sell_line_note']))({{$modifier['sell_line_note']}}) @endif 
		                        </td>

								@if($receipt_details->show_cat_code == 1)
			                        <td>
			                        	@if(!empty($modifier['cat_code']))
			                        		{{$modifier['cat_code']}}
			                        	@endif
			                        </td>
			                    @endif

								<td class="text-right">
									{{$modifier['quantity']}} {{$modifier['units']}}
								</td>
								<td class="text-right">
									{{$modifier['unit_price_inc_tax']}}
								</td>
								@if(!empty($receipt_details->item_discount_label))
								@endif
								<td class="text-right">
									{{$modifier['line_total']}}
								</td>
							</tr>
						@endforeach
					@endif
				@endforeach

				@php
					$lines = count($receipt_details->lines);
				@endphp
<!-- para generar filas vacias en la tabla -->
				@for ($i = $lines; $i < 15; $i++)
    				<tr>
    					<td>&nbsp;</td>
    					<td>&nbsp;</td>
    					<td>&nbsp;</td>
    					<td>&nbsp;</td>
    					<td>&nbsp;</td>
    					@if(!empty($receipt_details->item_discount_label))
    					<td></td>
    					@endif
    				</tr>
				@endfor

		</table>
	</div>
</div>
</div>
	<tfoot>

		<tr>
			<td>
			Esta factura se asimila en sus efectos legales, a una letra de cambio, Articulo 774 del código de comercio.
			<div class="row invoice-info">
	<div class="col-md-6  invoice-col width-50">
		<table class="table table-slim">
			@if(!empty($receipt_details->payments))
				@foreach($receipt_details->payments as $payment)

				@endforeach
			@endif
		</table>
		<div> 

  <span class ="signature">Entregó</span>    
  <span class ="title">Recibió</span>
</div>
</div>
	<div class="col-md-6 invoice-col width-50">
		<table class="table-no-side-cell-border table-no-top-cell-border width-100 table-slim">
			<tbody>

				@if(!empty($receipt_details->total_quantity_label))
					<tr>
						<td style="width:50%">
							{!! $receipt_details->total_quantity_label !!}
						</td>
						<td class="text-right">
							{{$receipt_details->total_quantity}}
						</td>
					</tr>
				@endif
				<tr >
					<td style="width:50%">
						{!! $receipt_details->subtotal_label !!}
					</td>
					<td class="text-right">
						{{$receipt_details->subtotal_exc_tax}}
					</td>
				</tr>
				
				<!-- Cargos envio -->
				@if(!empty($receipt_details->shipping_charges))
					<tr >
						<td style="width:50%">
							{!! $receipt_details->shipping_charges_label !!}
						</td>
						<td class="text-right">
							{{$receipt_details->shipping_charges}}
						</td>
					</tr>
				@endif

				@if(!empty($receipt_details->packing_charge))
					<tr >
						<td style="width:50%">
							{!! $receipt_details->packing_charge_label !!}
						</td>
						<td class="text-right">
							{{$receipt_details->packing_charge}}
						</td>
					</tr>
				@endif

				<!-- Impuesto -->
				@if(!empty($receipt_details->taxes))
					@foreach($receipt_details->taxes as $k => $v)
						<tr >
							<td>{{$k}}</td>
							<td class="text-right">(+) {{$v}}</td>
						</tr>
					@endforeach
				@endif

				<!-- Descuento -->
				@if( !empty($receipt_details->discount) )
					<tr >
						<td>
							{!! $receipt_details->discount_label !!}
						</td>

						<td class="text-right">
							(-) {{$receipt_details->discount}}
						</td>
					</tr>
				@endif

				@if( !empty($receipt_details->total_line_discount) )
					<tr >
						<td>
							{!! $receipt_details->line_discount_label !!}
						</td>

						<td class="text-right">
							(-) {{$receipt_details->total_line_discount}}
						</td>
					</tr>
				@endif

				@if( !empty($receipt_details->additional_expenses) )
					@foreach($receipt_details->additional_expenses as $key => $val)
						<tr >
							<td>
								{{$key}}:
							</td>

							<td class="text-right">
								(+) {{$val}}
							</td>
						</tr>
					@endforeach
				@endif

				@if( !empty($receipt_details->reward_point_label) )
					<tr >
						<td>
							{!! $receipt_details->reward_point_label !!}
						</td>

						<td class="text-right">
							(-) {{$receipt_details->reward_point_amount}}
						</td>
					</tr>
				@endif

				@if(!empty($receipt_details->group_tax_details))
					@foreach($receipt_details->group_tax_details as $key => $value)
						<tr >
							<td>
								{!! $key !!}
							</td>
							<td class="text-right">
								(+) {{$value}}
							</td>
						</tr>
					@endforeach
				@else
					@if( !empty($receipt_details->tax) )
						<tr >
							<td>
								{!! $receipt_details->tax_label !!}
							</td>
							<td class="text-right">
								(+) {{$receipt_details->tax}}
							</td>
						</tr>
					@endif
				@endif

				@if( $receipt_details->round_off_amount > 0)
					<tr >
						<td>
							{!! $receipt_details->round_off_label !!}
						</td>
						<td class="text-right">
							{{$receipt_details->round_off}}
						</td>
					</tr>
				@endif
				
				<!-- Total -->
				<tr>
					<th style="" class="font-20">
						{!! $receipt_details->total_label !!}
					</th>
					<td class="text-right font-20" style="">
						{{$receipt_details->total}}
					</td>
				</tr>
				@if(!empty($receipt_details->total_in_words))
				<tr>
					<td colspan="2" class="text-right">
						<small>({{$receipt_details->total_in_words}})</small>
					</td>
				</tr>
				@endif
			</tbody>
        </table>
	</div>
</div>

<div class="border-bottom col-md-12">
    @if(empty($receipt_details->hide_price) && !empty($receipt_details->tax_summary_label) )
        <!-- Impuesto -->
        @if(!empty($receipt_details->taxes))
        	<table class="table table-slim table-bordered">
        		<tr>
        			<th colspan="2" class="text-center">{{$receipt_details->tax_summary_label}}</th>
        		</tr>
        		@foreach($receipt_details->taxes as $key => $val)
        			<tr>
        				<td class="text-center"><b>{{$key}}</b></td>
        				<td class="text-center">{{$val}}</td>
        			</tr>
        		@endforeach
        	</table>
        @endif
    @endif
</div>



<div class="divFooter"></div>


			</td>
		</tr>
	</tfoot>

	
</table>

<style type="text/css">
	.tabla{
height: 280px;

  }
  .content-block, p {
    page-break-inside: avoid;
  }

	body {
		color: #000000;
	}
	.body2 {
		color: #000000;
		font-size: 10px;
	}

	@page {
  size: landscape; 
}
.signature, .title  { float: left; }
.signature, .title { 
  margin: 20px 10px;
  border-top: 1px solid #000;
  width: 150px; 
  text-align: center;
}
.caja {
margin:0 0 10px;
overflow:hidden;
background-color:;
border:1px solid #242424;
-webkit-border-radius: 5px;
border-radius: 5px;
}
.cuadro {
   width: 25%;
   text-align: left;
   vertical-align: top;
   border: 1px solid #000;
   border-spacing: 0;
}
   @media print {
  div.divFooter {
    position: fixed;
    bottom: 2px;
  }
}
</style>
