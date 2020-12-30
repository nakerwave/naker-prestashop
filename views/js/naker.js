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