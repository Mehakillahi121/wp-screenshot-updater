<style>
     .col-lg-4 ul {
    list-style-type: none;
   
  }
  .card{
    border:none;
    padding:10px 30px;
    margin:0 10%;
  }
  /* Style for the list items */
  .col-lg-4 li {
    padding: 5px 0;
   
  }
  .col-lg-4 li a{
    text-decoration:none;
    color:black;
  }
  .side-bar{ 
    position: fixed;
    top:20px;
    right:30px;}
   .div-style{
    border:1px solid dashed;
   } 
   button {
        padding: 5px 10px;
        background-color: navy;
        color: white;
        border: none;
        border-radius: 48px;
        cursor: pointer;
        
    }

    button:hover {
        background-color: blue;
    }
</style>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <?php
 $plugin_url = dirname(__FILE__);
 $check = explode("\\", $plugin_url);
 $drivePath = $check[0].'\\'.$check[1].'\\'.$check[2].'\\'.$check[3].'\\'.$check[4].'\\'.$check[5].'\\'.$check[6];
 // Stop Apache
 
?>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-9">
            <div class="card">
        <h1 >Webfort Screenshot Plugin</h1>
        <br>
        <section id="description-section">
         <h2>Description</h2>
           <p>The Webfort Screenshot Plugin is a powerful tool that allows you to capture screenshots of given URLs or HTML content and save them as images. It simplifies the process of generating website previews, capturing visual content, and automating screenshot tasks within your WordPress environment.</p>
        </section>
        <section id="works-section">
            <h2>Usage</h2>
            <h3>Q. How it works?</h3>
             <p>To use the plugin for capturing screenshots via the REST API and you can test it in  <a href="#postman">postman</a>., follow these steps:</p>
            <ol>
                <li>    Open Postman.</li>
                <li>Set the HTTP method to POST.</li>
                <li> Enter this url<br>       
                    <code>localhost<?php echo "\\".$check[3]?>\wp-json\wp\v2\snapshot\71</code>
                    <button onclick="copyCode()">Copy</button>
                   <br><br> <img width="100%" src="screenshot\Screenshot1.png"> <br></li>  <br>
                <li>In the request body, select the "raw" option and set the content type to "JSON".</li>
                <li>Provide the necessary parameters in the JSON format. For example:
                    <br>
                    <code>
                        {<br>
                        "url": "https://google.com"       <br>
                        }<br>
                    </code>
                     <br>
                </li>
                <li>Click the "Send" button to send the POST request.</li>
                <li>Review the response from the API to ensure the request was successful.</li>
                <li>Check the specified path to find and access the captured screenshot.</li>
            </ol>
            
           
            
            <h3>Request Parameters</h3>
            <code><b style="font-size:20px;"><em>Url</em></b></code>: <span>The "url" parameter is a required input that specifies the URL or HTML content you want to capture a screenshot of. This parameter is used to indicate the website address or the HTML content that you want to render and capture as an image. It can refer to either a live website accessible on the internet or a website running on your local machine (localhost).</span>
            <br><br>
            <code>
                {
                "url": "https://google.com"       
                }
            </code>
            <br><br>
          
        
            <p>Include the following parameters in the request body:</p>
            <img width="100%" src="screenshot\Screenshot2.png" alt="Screenshot Example">  
            <p>Your screenshots will be saved in the following path:</p>
            <p><code> <?php echo $drivePath."\images"?></code></p>
            <p>Output</p>
            <img width="100%" src="screenshot/output1.png" alt="Screenshot Example">  
        </section>

       
        <section  id="filename-section">
            <h3>Q.how to take screenshot of url with specific filename</h3>
            <ul>
            <code><b style="font-size:20px;"><em>Filename</em></b></code>: <span> (Optional) Specify a custom filename for the screenshot. If not provided, a unique filename will be generated.</span>
           <br><br>
            <p>Include the following parameters in the request body:</p>
            <code> 
                {<br>
                "url": "https://facebook.com",<br>
                "filename":"file1"  <br>        
                }
                <br><br>
                <img width="100%" src="screenshot/file2.png" alt="Screenshot Example">  
            </code>
            <p>Output</p>
            <img width="100%" src="screenshot/file1.png" alt="Screenshot Example">  
                </code><br><br>
        </section>
        <section id="specific-heightwidth">
            <h3>how to take screenshot of url with specific height or width</h3>
            <code><b style="font-size:20px;"><em>Height</em></b></code>: <span>(Optional) Specify the height of the viewport screenshot image. The default height is 1024 pixels.<span></code>.
            <br><br> 
            <code><b style="font-size:20px;"><em>Width</em></b></code>: <span>(Optional) Specify the width of the viewport screenshot image. The default width is 1024 pixels<span></code>.
            <br><br> 
            <code> {<br>
                "url": "https://facebook.com",<br>
                "filename":"file32",<br>
                "height":200         <br>
                }<br>
                or<br>
                {<br>
                "url": "https://facebook.com",<br>
                "filename":"file32",<br>
                "width":200         <br>
                }<br>
        
                or<br>
                {<br>
                "url": "https://facebook.com",<br>
                "filename":"file32",<br>
                "width":200,<br>
                "height":300      <br>
                }
                <img width="100%" src="screenshot/whscreenshot.png" alt="Screenshot Example">  
            </code><br><br>
               
                <h4>OUTPUT</h4>
                <img width="100%" src="screenshot/file1.png" alt="Screenshot Example">  
                </code><br><br>
        </section>
        <section>
                <h3>how to take screenshot of url with mobile/desktop view</h3>
                <code><b style="font-size:20px;"><em>Mobile_view</em></b></code>: <span> (Optional) Use the boolean variable <code>mobile_view</code> to determine the viewport mode. If set to true, the screenshot will be captured in mobile view; if set to false (default), it will be captured in desktop view.<span></code>.
                <code><br><br>
                {<br>
                    "url": "https://google.com",<br>
                    "filename":"file32",<br>
                    "height":200,<br>
                    "width":400 ,<br>
                    "mobile_view":"true"<br>
                }<br><br>
                <img width="100%" src="screenshot/mobileview.png" alt="Screenshot Example">  
                </code><br><br>
                <h4>OUTPUT</h4>
                
            </section>
            <section id="specific-directory">
            <h3>To capture a screenshot of a specific URL and save it in a specific path</h3>
            <code><p style="font-size:20px;"><em>Directory</em></b></code>: <span>  (Optional) Specify the directory path to store the image. By default, the image is stored in the wordpress_screenshot_plugin/images directory.<span></code>.
                <code><br><br>
                {<br>
                    "url": "https://google.com",<br>
                    "filename":"file32",<br>
                    "height":200,<br>
                    "width":400,<br>
                    "mobile_view":"true",<br>
                    "directory":"newimage"<br>
                }<br><br>
                <img width="100%" src="screenshot/finalimage.png" alt="Screenshot Example">  
                </code><br><br>
                <h4>OUTPUT</h4>
                <img width="100%" src="screenshot/file32.png" alt="Screenshot Example">  
        <section>
        <section id="postman">
                <h3 id="postman-section">  To use Postman Desktop, follow these steps:</h3>
              
                <ol>
                <li>Download and Install Postman: Go to the official Postman website<code><a href="https://www.postman.com/">(https://www.postman.com/)</a></code> and download the appropriate version of Postman Desktop for your operating system (Windows, macOS, or Linux). Once the download is complete, run the installer and follow the on-screen instructions to install Postman.</li>

                <li>Launch Postman: After installation, open the Postman application on your computer. It should be available in your applications or programs list.</li>

                <li>Create a Postman Account (optional): You can choose to create a Postman account, which allows you to synchronize your requests, collections, and settings across multiple devices. If you prefer not to create an account, you can use Postman without signing in.</li>

                <li>Explore the Postman Interface: Once you open Postman, you'll see the main interface with various sections such as the sidebar, the request builder, and the response viewer. Take a moment to familiarize yourself with the different components and menus.</li>

                <li>Send Your First Request: To send a request, start by selecting the HTTP method (GET, POST, PUT, DELETE, etc.) from the dropdown menu. Enter the URL of the API endpoint you want to send the request to in the request URL field. You can also add request headers, query parameters, and request body as needed.</li>

                <li>Configure Request Parameters: If your request requires specific headers, query parameters, or authentication, you can add them in the appropriate sections. Postman provides user-friendly input fields for adding these parameters.</li>

                <li>Send the Request: Once you've configured your request, click the "Send" button to send the request to the server. Postman will display the response in the response viewer, showing the status code, response headers, and response body.</li>


                These steps should help you get started with Postman Desktop. As you become more familiar with the tool, you can explore its advanced features, such as setting up environments, writing tests, and generating API documentation. Postman also offers extensive documentation and tutorials on their website, which can provide more in-depth guidance and help you make the most of the tool.
        </section>
            </div>
           
        </div>
        <div class="col-lg-4 col-md-3 side-bar">
            <ul>
                <li><a  href="#works-section">  How it works?</a></li>
                <li> <a  href="#filename-section"> how to take screenshot of url with specific filename?</a></li>
                <li>  <a  href="#specific-heightwidth"> how to take screenshot of url with specific height and width?</a></li>
                <li>  <a  href="#specific-directory"> how to take screenshot of url with specific directory?</a></li>
                <li>  <a  href="#postman-section"> how to use postman?</a></li>
            </ul>
        </div>
    </div>

</div>
</body>
<script>
    function copyCode() {
        var code = 'localhost\\<?php echo$check[3]?>\\wp-json\\wp\\v2\\snapshot\\71';
        var tempInput = document.createElement("input");
        tempInput.value = code;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand("copy");
        document.body.removeChild(tempInput);
        alert("Code copied to clipboard!");
    }
</script>