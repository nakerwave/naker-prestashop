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

{if $custom_field_naker && $custom_field_naker != ''}
    <div class="naker_container">
        <input type="text" name="data" value="{$custom_field_naker}" hidden id="naker_id"/>
    </div>
{/if}
