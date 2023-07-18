<head>

  <style>
  *{
    line-height:30px;
  }
    .card{
     
      margin:10px 10%  0 40% ;
    }
    ol li{
      line-height:20px;
    }
    .container{
      margin:0 20%;
    }
    h1{
      font-size:40px;
    }
    h2{
      font-size:30px;
    }
    h3{
      font-size:25px;
    }
    p{
      font-size:20px;
    }
    ol,ul li{
      margin-bottom: 10px;
    }
    span{
      font-size:18px;
    }
    table {
    border-collapse: collapse;
    width: 100%;
    font-size:18px;
  }
  
  th, td {
    text-align: left;
    padding: 8px;
  }
  
  th {
    background-color: #f2f2f2;
  }

  
  tr:nth-child(even) {
    background-color: #f9f9f9;
  }
  </style>
</head>
<div class="container">
  
<h1 >Webfort Screenshot Plugin</h1>
<br>
<section>
<h2>Description</h2>
<p>The Webfort Screenshot Plugin is a powerful tool that allows you to capture screenshots of given URLs or HTML content and save them as images. It simplifies the process of generating website previews, capturing visual content, and automating screenshot tasks within your WordPress environment.</p>
</section>
<section>
<h2>Installation</h2>
<ol style="font-size:20px; line-height:50px;">
  <li >Download the Webfort Screenshot Plugin from the provided source.</li>
  <li >Upload the plugin files to the <code>/wp-content/plugins/</code> directory or install them directly from the WordPress Plugin Dashboard.</li>
  <li>Activate the plugin through the 'Plugins' menu in WordPress.</li>
</ol>
</section>
<section>
<h2>Usage</h2>

<h3>Q. How can i use this plugin?<h3>
<p>To capture a screenshot, send a POST request to the postman. <code>/wp-json/wp/v2/snapshot/{id}</code> endpoint.</p>
<img width="90%;" src="<?php echo plugins_url( 'screenshotter_wp/screenshot/screenshot1.png', __FILE__ ); ?>" alt="Screenshot">

<h3>Request Parameters</h3>
<code><b style="font-size:20px;"><em>Url</em></b></code>: <span>The URL or HTML content to capture the screenshot. For example, use <code>"url": "https://google.com"<span></code>.
<p>Include the following parameters in the request body:</p>  
<img width="90%;" height="30%" src="<?php echo plugins_url('screenshotter_wp/screenshot/screenshot2.png'); ?>" alt="Screenshot">


<p>Your screenshots will be saved in the following path:</p>
<p><code>C:\xampp\htdocs\screenshot\wp-content\plugins\screenshotter_wp\images</code></p>
<ul>
<img width="90%;" src="<?php echo plugins_url('screenshotter_wp/images/64a7a9a807cd6.png'); ?>" alt="Screenshot">
</section>
<section>
<h3>how to take screenshot of url with specific filename</h3>
<ul>
  
  <li style="font-size:20px;margin-bottom: 20px;"><code style="font-size:20px;"><b><em>Filename</em></b></code> (Optional) Specify a custom filename for the screenshot. If not provided, a unique filename will be generated.</li>
  <code> 
    {
       "url": "https://google.com",
       "filename":"file1"          
    }
    <br><br>
    <img width="90%;" src="<?php echo plugins_url('screenshotter_wp/screenshot/file2.png'); ?>" alt="Screenshot">  
</code><br><br>
</section>
<section>
<h3>how to take screenshot of url with specific height or width</h3>
<code><b style="font-size:20px;"><em>Height</em></b></code>: <span>(Optional) Specify the height of the viewport screenshot image. The default height is 1024 pixels.<span></code>.
<br><br> 
<code><b style="font-size:20px;"><em>Width</em></b></code>: <span>(Optional) Specify the width of the viewport screenshot image. The default width is 1024 pixels<span></code>.
<br><br> 
<code> {
    "url": "https://google.com",
    "filename":"file32",
    "height":200         
     }
     or{
    "url": "https://google.com",
    "filename":"file32",
    "width":200         
     }
     <br><br> 
     <img width="90%;" src="<?php echo plugins_url('screenshotter_wp/screenshot/file3.png'); ?>" alt="Screenshot">  
</code><br><br>

<h4>OUTPUT</h4>
<img width="90%;" src="<?php echo plugins_url('screenshotter_wp/screenshot/height.png'); ?>" alt="Screenshot">  
</section>
<section>
<h3>how to take screenshot of url with specific width and height</h3>
 
 <code>
  {
    "url": "https://google.com",
    "filename":"file32",
    "height":200,
    "width":400    
 }
 <br><br>

 <img width="90%;" src="<?php echo plugins_url('screenshotter_wp/screenshot/whscreenshot.png'); ?>" alt="Screenshot">  
</code><br><br>
<h4>OUTPUT</h4>
<img width="90%;" src="<?php echo plugins_url('screenshotter_wp/screenshot/file1.png'); ?>" alt="Screenshot">  
</section>
<section>
<h3>how to take screenshot of url with mobile/desktop view</h3>
<code><b style="font-size:20px;"><em>Mobile_view</em></b></code>: <span> (Optional) Use the boolean variable <code>mobile_view</code> to determine the viewport mode. If set to true, the screenshot will be captured in mobile view; if set to false (default), it will be captured in desktop view.<span></code>.
  <code>
  {
    "url": "https://google.com",
    "filename":"file32",
    "height":200,
    "width":400    
    "mobile_view":"true"  
  }
  <img width="90%;" src="<?php echo plugins_url('screenshotter_wp/screenshot/mobileview.png'); ?>" alt="Screenshot">  
  </code><br><br>
  <h4>OUTPUT</h4>
  <img width="90%;" src="<?php echo plugins_url('screenshotter_wp/screenshot/mobileview2.png'); ?>" alt="Screenshot">  
</section>
<section>
<h3>To capture a screenshot of a specific URL and save it in a specific path<h3>
<code><b style="font-size:20px;"><em>Directory</em></b></code>: <span>  (Optional) Specify the directory path to store the image. By default, the image is stored in the <code>wordpress_screenshot_plugin/images</code> directory.<span></code>.
 
  <code>
  {
    "url": "https://google.com",
    "filename":"file32",
    "height":200,
    "width":400    
    "mobile_view":"true",
    "directory":"newimage"
  }
  </code><br><br>
  <section>
</ul>
<section>
<p>Receive the response with the full path of screenshot image.
  </p>
</section>
<section>
<h4>Example Request</h4>
<pre>

<p><strong style="font-size:25px;">Input:</strong></p>
<img width="90%;" src="<?php echo plugins_url('screenshotter_wp/screenshot/finalimage.png'); ?>" alt="Screenshot">

<p><strong  style="font-size:25px;">Output:</strong></p>
<img width="90%;" src="<?php echo plugins_url('screenshotter_wp/screenshot/finalimage2.png'); ?>" alt="Screenshot">
</section>
</div>
<section style="margin:10px 10%;">
<table>
  <thead>
    <tr>
      <th>Parameter</th>
      <th>Type</th>
      <th>Required</th>
      <th>Description</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Url</td>
      <td>String</td>
      <td>true</td>
      <td>The URL to capture the screenshot. Provide the complete URL, including the protocol (e.g., http:// or https://). This parameter is required and serves as the input for capturing the screenshot. Ensure that the URL is accessible and points to the desired webpage or content that you wish to capture.</td>
    </tr>
    <tr>
      <td>Filename</td>
      <td>String</td>
      <td>Optional</td>
      <td>Specify a custom filename for the screenshot. If not provided, a unique filename will be generated.</td>
    </tr>
    <tr>
      <td>Width</td>
      <td>Number</td>
      <td>Optional</td>
      <td>Specify the width of the viewport screenshot image. The default width is 1024 pixels.</td>
    </tr>
    <tr>
      <td>Height</td>
      <td>Number</td>
      <td>Optional</td>
      <td>Specify the height of the viewport screenshot image. The default height is 1024 pixels.</td>
    </tr>
    <tr>
      <td>Mobile view</td>
      <td>Boolean</td>
      <td>Optional</td>
      <td>Determines the viewport mode. If set to true, the screenshot will be captured in mobile view; if set to false (default), it will be captured in desktop view. To capture the mobile width and height, you need to provide the specific height and width values.</td>
    </tr>
    <tr>
      <td>Directory</td>
      <td>String</td>
      <td>Optional</td>
      <td>Specify the directory path to store the image. By default, the image is stored in the directory.</td>
    </tr>
  </tbody>
</table>

</section>
<div class="container">
<section><h2>How can I access it using a class?</h2>
<p style="font-size:17px;">

//<span style="color:green;font-size:14px;"> Instantiate the Webfort_ScreenshotPlugin class</span><br>
<code>
$plugin = new Webfort_ScreenshotPlugin();<br>
</code>
//<span style="color:green;font-size:14px;"> Define the parameters for the screenshot</span><br>

$input = 'https://example.com';  // URL or HTML content<br>
$filename = 'screenshot1';  // Filename for the screenshot<br>
$height = 800;  // Height of the screenshot<br>
$width = 1200;  // Width of the screenshot<br>
$directory = 'screenshots';  // Directory to save the screenshots<br>
$isMobile = false;  // Whether to emulate a mobile view<br>

// <span style="color:green;font-size:14px;">Call the takeScreenshot() function with the parameters</span><br>
<code>
$result = $plugin->takeScreenshot($input, $filename, $height, $width, $directory, $isMobile);<br>
</code>
// <span style="color:green;font-size:14px;">Access the result of the screenshot</span><br>
<code>
$path = $result['path'];<br>
</code>

//<span style="color:green;font-size:14px;"> Use the screenshot result as needed</span><br>
<code>
echo "Screenshot path: $path\n";<br>
</code>
</p>
</section>

</div>