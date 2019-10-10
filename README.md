# Tandora wordpress plugin

## Dev setup

- Install docker
- Run the following command to start wordpress
    - `docker-compose up`
    - After this visit localhost:8000 in browser to use wordpress locally.

## Using tandora widget page with Advanced iframe plugin

 - Use the following code and replace the src with appropriate widget url

 ```[advanced_iframe src="https://app.tandora.co/tandora/changelog/widget/1" width="100%" height="100vh" frameborder="0"  scrolling="no" seamless="seamless" style="display:block; width:100%; height:100vh;" ]```
 
 - If you want to remove banner in widget, add the following javascript in manage widget page in tandora app.

```javascript
<script>
 /* Please be cautious while editing this code as it can modify the appearance of widget. */ 
 // Insert your code below 
var _banner = document.getElementById("c-banner");
_banner.style.visibility = "hidden";
_banner.style.visibility = "none";
_banner.innerHTML = "";
 </script>
```

## References
- https://dillieodigital.wordpress.com/2014/05/14/how-to-embed-full-page-iframes-with-busting-in-wordpress/
- https://stackoverflow.com/questions/43807596/how-can-i-display-a-full-screen-iframe-on-top-of-wp-page
