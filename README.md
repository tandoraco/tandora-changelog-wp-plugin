# Tandora wordpress plugin

## Dev setup

- Install docker
- Run the following command to start wordpress
    - `docker-compose up`
    - After this visit localhost:8000 in browser to use wordpress locally.

## Dev testing

- Compress the tandora folder in this repo to a zip file.
- Go to `http://localhost:8000/wp-admin/plugin-install.php`
     - Then click upload plugin.
     - Upload the zip file and click install now.
     - Then click activate plugin
- Now add new post `http://localhost:8000/wp-admin/post-new.php`
    - In the content area place the following text
        
        ```
        [tandora widget_url="https://app.tandora.co/tandora changelog/1"]
        ```
    - Now save or click preview. Verify tandora widget is rendered.
    - *Note: Only if widget url is present in above, tandora widget will be rendered.*
- If you want to test the changes done to code after plugin is installed, first deactivate the plugin. Then delete the plugin. Now upload the updated zip file, install and activate to test the updated plugin.

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
- https://www.sitepoint.com/an-introduction-to-wordpress-plugin-development/
- https://www.sitepoint.com/real-world-example-wordpress-plugin-development/

