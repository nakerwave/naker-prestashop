/**

 * NOTICE OF LICENSE

 *

 * This file is licenced under the Software License Agreement.

 * With the purchase or the installation of the software in your application

 * you accept the licence agreement.

 *

 * You must not modify, adapt or create derivative works of this source code

 *

 *  @author    Saif eddine Naimi

 *  @copyright 2020-2025 Naker

 *  @license   LICENSE.txt

 */

<div class="m-b-1 m-t-1">
    <h2>{l s='Custom Attribute from Naker module' mod='naker'}</h2>
        <div class="form-group" style="margin-left: -16px;">
            <div class="col-lg-12 col-xl-4">
                <label class="form-control-label">{l s='Naker id' mod='naker'}</label>
                <input type="text" name="custom_field_naker" class="form-control" value="{if ($custom_field_naker && $custom_field_naker != '')? $custom_field_naker : ''}"{/if}/>
            </div>   
        </div>
</div>