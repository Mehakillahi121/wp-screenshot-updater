<?php
/*
Plugin Name: Screenshot-Plugin
Description: Convert URL or HTML content into an image.
version: 4.0
Author: Mehak Illahi

*/
require_once WP_PLUGIN_DIR . 'updater.php';

defined( 'ABSPATH' ) || exit;
register_activation_hook(__FILE__, 'activation');

function activation() {
    add_action('admin_menu', 'screenshot_add_submenu_page');
    new WebfortUpdaterChecker();
   // add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'my_custom_plugin_documentation_link');
}

add_action('admin_init', 'your_plugin_add_action_link_on_activation');

function your_plugin_add_action_link_on_activation() {
    if (is_plugin_active(plugin_basename(__FILE__))) {
        add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'your_plugin_add_action_link');
    }
}

function your_plugin_add_action_link($links) {
    // Add your custom action link
    $action_link = '<a href="' . esc_url(admin_url('options-general.php?page=screenshot-documentation')) . '">Documentation</a>';
    array_push($links, $action_link);

    return $links;
}
function my_custom_plugin_documentation_link($links) {
    // Modify the plugin action links as needed
    $settings_link = '<a href="' . esc_url(admin_url('options-general.php?page=screenshot-documentation')) . '">Documentation</a>';
    array_push($links, $settings_link);
    return $links;
}

function screenshot_submenu_page_callback() {
    include 'documentation/startingpage.php';
}

add_action('admin_menu', 'screenshot_add_submenu_page');
function screenshot_add_submenu_page() {
    add_submenu_page(
        'options-general.php', // Parent menu slug (options-general.php is for the Settings menu)
        'Screenshot Documentation', // Page title
        'Documentation', // Menu title
        'manage_options', // Capability required to access the menu
        'screenshot-documentation', // Menu slug
        'screenshot_submenu_page_callback' // Callback function to render the submenu page
    );
}

class Webfort_ScreenshotPlugin {
    public $puppeteer;

    public function __construct() {
        add_action('rest_api_init', array($this, 'webfort_update_endpoints'));
        $this->updatePhpIni();
       
        
    }

    public function updatePhpIni() {
        $phpIniPath = php_ini_loaded_file(); // Get the path to the loaded php.ini file
        
        if ($phpIniPath) {
            $phpIniContents = file_get_contents($phpIniPath); // Read the contents of php.ini
            
            // Replace the string "extension=socket" with ";extension=socket"
            $phpIniContents = str_replace(';extension=sockets', 'extension=sockets', $phpIniContents);
            
            file_put_contents($phpIniPath, $phpIniContents); // Write the updated contents back to php.ini
                
           $stopCommand = 'C:\xampp\apache\bin\httpd.exe -k stop';
            exec($stopCommand);
            // Start Apache
            $startCommand = 'C:\xampp\apache\bin\httpd.exe -k start';
            exec($startCommand);
           
        }
    }

    public function webfort_update_endpoints() {
        register_rest_route('wp/v2', '/snapshot/(?P<id>\d+)', array(
            'methods' => 'POST',
            'callback' => array($this, 'webfort_update_snapshot')
        ));
    }

    public function webfort_update_snapshot($request) {
        require_once __DIR__ . '/vendor/autoload.php'; // Include the autoload file
        $this->puppeteer = new \Nesk\Puphpeteer\Puppeteer;

        $input = $request->get_param('url') ? trim($request->get_param('url')) : '';
        $filename = $request->get_param('filename') ? trim($request->get_param('filename')) : '';
        $height = $request->get_param('height') ? intval($request->get_param('height')) : 1024;
        $width = $request->get_param('width') ? intval($request->get_param('width')) : 1024;
        $directory = $request->get_param('directory') ? trim($request->get_param('directory')) : 'images';
        $isMobile = $request->get_param('mobile_view') ? filter_var($request->get_param('mobile_view'), FILTER_VALIDATE_BOOLEAN) : false;

        // Activation code goes here

        // Generate a UUID if the filename is not provided
        if (empty($filename)) {
            $filename = uniqid();
        }

        // Check if input is empty
        if (empty($input)) {
            $response = ["error" => "Input is required."];
            return new WP_REST_Response($response, 400);
        }

        // Call takeScreenshot() with the input, filename, height, width, directory, and isMobile parameters and get the result
        $result = $this->takeScreenshot($input, $filename, $height, $width, $directory, $isMobile);

        // Check if there was an error and return it as a JSON response
        if (isset($result['error'])) {
            $response = ["error" => $result['error']];
            return new WP_REST_Response($response, 401);
        } else {
            // Create a new post with the screenshot image as the featured image
            $post_data = array(
                'post_title' => $filename,
                'post_content' => '',
                'post_status' => 'publish',
                'post_type' => 'post'
            );

            $post_id = wp_insert_post($post_data);

            // Set the generated screenshot as the featured image of the post
            $attachment_id = $this->upload_screenshot_image($result, $post_id);
            if (!is_wp_error($attachment_id)) {
            set_post_thumbnail($post_id, $attachment_id);

        }
            // Return the response
            $response = [
                "path" => $result['path'],
                "attachment_id" => $attachment_id
            ];

            return new WP_REST_Response($response, 200);
        }
    }

    public function takeScreenshot($input, $filename, $height, $width, $directory, $isMobile) {
        try {
            $plugin_dir = plugin_dir_path(__FILE__); // Get the path to the plugin directory
            $full_directory = $plugin_dir . $directory; // Create the full path for the directory

            // Check if the specified directory exists or create it
            if (!file_exists($full_directory)) {
                mkdir($full_directory, 0755, true);
            }
            $screenshotPath = $full_directory . '/' . $filename . '.png';

            $browser = $this->puppeteer->launch([
                'args' => ['--no-sandbox', '--disable-setuid-sandbox'],
            ]);
            $page = $browser->newPage();

            // Enable responsive view
            $page->setViewport([
                'width' => $width,
                'height' => $height,
                'isMobile' => $isMobile,
            ]);

            // Check if input is a URL or HTML content
            if (filter_var($input, FILTER_VALIDATE_URL)) {
                // Navigate to the URL
                $page->goto($input, ['waitUntil' => 'domcontentloaded']);
            } else {
                // Set the HTML content directly
                $page->setContent($input);
            }

            // Wait for the page to fully load
            // $page->waitFor(5000);

            $page->screenshot([
                'path' => $screenshotPath,
                'fullPage' => true, // Capture the full page according to the responsive view
            ]);

            $browser->close();
          

           $fullPath = plugins_url('/screenshotter_wp/' . $directory . '/' . $filename . '.png');


            return [
                "path" => $fullPath,
                "dirPath"=>$screenshotPath
            ];
        } catch (Exception $e) {
            return ["error" => $e->getMessage()];
        }
    }

    public function upload_screenshot_image($fileDetail, $post_id) {
        ini_set('display_errors', 1);
        error_reporting(E_ALL);
        
        $file_path = $fileDetail['path'];
        $fileDirPath = $fileDetail['dirPath'];
        $fileDirPath = str_replace('\\', "/", $fileDirPath);
        $targetDir = wp_upload_dir()['path']; // Directory to upload the file
        $targetDir = str_replace('\\', "/", $targetDir);
        $targetFile = $targetDir . '/' . basename($file_path);
      
        if (copy($fileDirPath, $targetFile)) {  /// to move use rename 
            $file_type = wp_check_filetype(basename($file_path), null);
            $attachment_data = array(
                'guid' => $targetFile,
                'post_mime_type' => $file_type['type'],
                'post_title' => preg_replace('/\.[^.]+$/', '', basename($file_path)),
                'post_content' => '',
                'post_status' => 'inherit'
            );
            $attachment_id = wp_insert_attachment($attachment_data, $targetFile, $post_id);
            require_once ABSPATH . 'wp-admin/includes/image.php';
            $attachment_data = wp_generate_attachment_metadata($attachment_id, $targetFile);
            wp_update_attachment_metadata($attachment_id, $attachment_data);
    
            return $attachment_id;
        } else {
            // File move failed, log the error
            $error_message = 'File move failed. Source: ' . $fileDirPath . ', Destination: ' . $targetFile;
            error_log($error_message);
    
            return 0;
        }
    }
    
   
    
    
}

new Webfort_ScreenshotPlugin();
