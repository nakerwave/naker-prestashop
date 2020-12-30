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

naker_id = document.getElementById('naker_id')
if (naker_id != null) {
    var head = document.getElementsByTagName('head')[0];
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = 'https://d23jutsnau9x47.cloudfront.net/studio/v1.1.4/viewer.js';
    script.id = 'naker3d';
    head.appendChild(script);
    var naker3d = document.getElementById('naker3d');
    naker3d.setAttribute("data-option", "{|id|:|" + naker_id.value + "|}");
    naker3d.setAttribute("data-container", ".naker_container");
}