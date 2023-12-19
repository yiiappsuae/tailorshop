<style type="text/css">
    input[type=checkbox] {
        height: 0;
        width: 0;
        visibility: hidden;
    }

    label {
        cursor: pointer;
        text-indent: -9999px;
        width: 50px;
        height: 30px;
        background: grey;
        display: block;
        border-radius: 100px;
        position: relative;
    }

    label:after {
        content: '';
        position: absolute;
        top: 5px;
        left: 2px;
        width: 20px;
        height: 20px;
        background: #fff;
        border-radius: 90px;
        transition: 0.3s;
    }

    input[type=checkbox]+label {
        margin-top: -15px;
    }

    input[type=checkbox]:checked+label {

        background: #3595f6;
    }

    input[type=checkbox]:checked+label:after {
        left: calc(100% - 1px);
        transform: translateX(-100%);

    }
    label:active:after {
        width: 10px;
    }
</style>


@php
    $id = 'modifier_' . $row_count . '_' . time();
@endphp

<?php if(!empty($product->modifiers)) {
    //print_r($product->modifiers);
$product_id=$product->id;
}
?>

<div>
    <span class="selected_modifiers">
        @if (!empty($edit_modifiers) && !empty($product->modifiers))
            @include('restaurant.product_modifier_set.add_selected_modifiers', [
                'index' => $row_count,
                'modifiers' => $product->modifiers,
            ])
           
        @endif

     


    </span>&nbsp;
    <i class="fa fa-external-link-alt cursor-pointer text-primary select-modifiers-btn" title="@lang('restaurant.modifiers_for_product')"
        data-toggle="modal" data-target="#{{ $id }}"></i>
</div>
<div class="modal fade modifier_modal modal_<?=$product_id;?>_<?=$row_count;?>" id="{{ $id }}" tabindex="-1" role="document">
    <div class="modal-document" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">@lang('restaurant.modifiers_for_product'): <span class="text-success"></span>
                </h4>
            </div>

            <div class="modal-body">


                @if (!empty($product_ms))
                    <div class="panel-group" id="accordion{{ $id }}" role="tablist"
                        aria-multiselectable="true">

                        @foreach ($product_ms as $modifier_set)
                            @php
                                $collapse_id = 'collapse' . $modifier_set->id . $id;
                            @endphp

                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse"
                                            data-parent="#accordion{{ $id }}" href="#{{ $collapse_id }}"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            {{ $modifier_set->name }}
                                        </a>
                                    </h4>
                                </div>
                                <input type="hidden" class="modifiers_exist" value="true">
                                <input type="hidden" class="index" value="{{ $row_count }}">

                                <div class="row" id="add-modifier-table">

                                    <div class="col-md-8">



                                        <?php $total_cloth=0;
                                        $i=0;
                                        ?>
                                        @foreach ($modifier_set->variations as $modifier)

                                        
                                            <div class="col-md-6">
                                                <div class="col-md-4">{{ $modifier->name }}</div>
                                                <div class="col-md-2">
                                                     <div class="form-group">
                                                        <?php if(!empty($product->modifiers)) {
                                                        $checked='';
                                                        $pp=$product->modifiers[$i];
                                                         if($pp->measure > 0){
                                                            $checked='checked';
                                                         }
                                                         $mid=$product->variation_id;

                                                            }
                                                            else{
                                                               
                                                                   if($modifier->default_value > 0){
                                                                      $checked='checked';
                                                                     }
                                                                 }
                                                                  $mid=$modifier->id;
                                                            ?>
                                                        <input <?=$checked;?>

                                                            onclick="enabledisablemodifier(<?=$product_id;?>,<?=$row_count;?>,<?=$mid;?>)"
                                                            onchange="enabledisablemodifier(<?=$product_id;?>,<?=$row_count;?>,<?=$mid;?>)"
                                                            name="modifier_enable[{{ $mid }}]" value="{{$mid}}"
                                                            class="modi_check modi_check_<?=$product_id;?>_<?=$row_count;?>_<?=$mid;?>" 
                                                            id="modifier_enable[{{ $mid }}]" type="checkbox"
                                                             /><label
                                                            for="modifier_enable[{{ $mid }}]">Yes/No
                                                        </label>




                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-6">
                                                  
                                                  <input type="hidden" name="modifier_price[{{ $modifier->id }}]" value="0">
                                                   

                                                

                                                    <?php if(!empty($product->modifiers)) {
                                                        $value=0;
                                                        $pp=$product->modifiers[$i];
                                                         $value=$pp->measure;
                                                         $total_cloth=$total_cloth+$value;
                                                         $dv= $value;

                                                            }
                                                            else{
                                                               $value= $modifier->default_value;
                                                               $total_cloth=$total_cloth+$modifier->default_value;
                                                               $dv= $modifier->default_value;
                                                            }
                                                            ?>
                                                    <div class="input-group input-number">
                                                        <span class="input-group-btn"><button type="button"
                                                                class="btn btn-default btn-flat quantity-down" onclick="calc_cloth(<?=$product_id;?>,<?=$row_count;?>,<?=$mid;?>)"><i
                                                                    class="fa fa-minus text-danger"></i></button></span>
                                                        <input type="text" data-min="0"
                                                            class="form-control input_number mousetrap modi_<?=$product_id;?>_<?=$row_count;?> modi_<?=$product_id;?>_<?=$row_count;?>_<?=$mid;?>"
                                                            value="{{ $value }}"
                                                            name="modifier_value[{{ $mid }}]"
                                                            id="modifier_value[{{ $mid }}]" 
                                                            onkeyup="calc_cloth(<?=$product_id;?>,<?=$row_count;?>,<?=$mid;?>)" 
                                                            onchange="calc_cloth(<?=$product_id;?>,<?=$row_count;?>,<?=$mid;?>)"  data-default="{{ $dv }}" >
                                                        <span class="input-group-btn"><button type="button"
                                                                class="btn btn-default btn-flat quantity-up" onclick="calc_cloth(<?=$product_id;?>,<?=$row_count;?>,<?=$mid;?>)"><i
                                                                    class="fa fa-plus text-success"></i></button></span>
                                                    </div>
                                                </div>
                                            </br></br>
                                            </div>
                                              <?php 
                                              $i=$i+1;

                                              ?>
                                        @endforeach


                                    </div>

                                    <div class="col-md-4">

                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingOne">
                                                <h4 class="panel-title">
                          
                                                <a role="button" data-toggle="collapse"
                                                        data-parent="#accordionmodifier_2_1695706163"
                                                        href="#collapse5modifier_2_1695706163" aria-expanded="true"
                                                        aria-controls="collapseOne">
                                                        Metrial / Cloth
                                                    </a>
                                                </h4>
                                            </div>
                                            <br>
                                            <span class="alert-danger metrial_notification hide">Metrial Selection Required</span>
                                            <select name="metrial_id" id="selectMaterial" class="form-control">
                                                <option>@lang('messages.please_select')</option>
                                                    <?php foreach($material_products as $variation){ ?>
                                                        <option value="{{$variation->id}}">{{$variation->full_name}}</option><?php  } ?>
                                            </select>
                                            <br>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingTwo">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse"data-parent="#accordionmodifier_2_1695706163"
                                                    href="#collapse5modifier_2_1695706163" aria-expanded="true"
                                                    aria-controls="collapseTwo">Farah</a>
                                                </h4>
                                            </div>
                                            <br>
                                            <span class="alert-danger metrial_notification hide">Farah Selection Required</span>
                                            <select name="farah_id" id="selectFarah" class="form-control">
                                                <option>@lang('messages.please_select')</option>
                                                <?php foreach($farah_products as $variation){ ?>
                                                <option value="{{$variation->id}}">{{$variation->full_name}}</option><?php  } ?>
                                            </select>
                                            <br>
                                        </div>
                                            
                                    </div>


                                    </div>

                                </div>


                            </div>
                        @endforeach



                         <h2 class="text-right">
                                Total Material Required : <span id="total_material_<?=$product_id;?>_<?=$row_count;?>_html"> {{$total_cloth}}</span> Inches

                                <input type="hidden" name="metrial_need" id="total_material_<?=$product_id;?>_<?=$row_count;?>" value="{{$total_cloth}}">
                            </h2>
                        


                    </div>
                @endif
            </div>

            <div class="modal-footer">
                <button data-url="{{ action('Restaurant\ProductModifierSetController@add_selected_modifiers') }}"
                    type="button" class="btn btn-primary add_selected_modifiers">
                    @lang('messages.add')</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('messages.close')</button>
            </div>

            {!! Form::close() !!}

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<script type="text/javascript">
    if (typeof $ !== 'undefined') {
        $(document).ready(function() {
            $('div#{{ $id }}').modal('show');
        });
    }

</script>
