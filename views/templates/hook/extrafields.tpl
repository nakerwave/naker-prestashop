<div class="m-b-1 m-t-1">
    <h2>{l s='Custom Attribute from Naker module' mod='naker'}</h2>
        <div class="form-group" style="margin-left: -16px;">
            <div class="col-lg-12 col-xl-4">
                <label class="form-control-label">{l s='Naker id' mod='naker'}</label>
                <input type="text" name="custom_field_naker" class="form-control" {if $custom_field_naker && $custom_field_naker != ''}value="{$custom_field_naker}"{/if}/>
            </div>   
        </div>
</div>