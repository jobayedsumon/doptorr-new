<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap-grid.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <title>Software Update Wizard By Xgenious</title>
    <style>
        /*custom font*/
        @import url('//fonts.googleapis.com/css?family=Nunito:400,600,700&display=swap');

        :root {
            --heading-color: #333;
            --paragraph-color: #777;
            --main-color-one: #73cb01;
            --secondary-color: #30373f;
            --body-font: 'Nunito', sans-serif;;
        }

        /*basic reset*/
        * {
            margin: 0;
            padding: 0;
        }

        html {
            background: linear-gradient(rgba(196, 102, 0, 0.6), rgba(155, 89, 182, 0.6));
        }

        body {
            font-family: var(--body-font);
            /*background: linear-gradient(rgba(196, 102, 0, 0.6), rgba(155, 89, 182, 0.6));*/
        }
        .alert.alert-warning {
            background-color: #d2d27a;
            color: #333;
        }
        #msform {
            text-align: center;
            position: relative;
        }

        #msform .content-wrap {
            background: white;
            border: 0 none;
            border-radius: 3px;
            box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.4);
            padding: 40px 30px 40px 30px;
            box-sizing: border-box;
            position: relative;
        }

        #msform .content-wrap:not(:first-of-type) {
            display: none;
        }

        #msform input, #msform textarea {
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
            font-family: montserrat;
            color: #2C3E50;
            font-size: 13px;
        }

        #msform .action-button {
            width: 100px;
            background: var(--main-color-one);
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 1px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px;
        }

        #msform .action-button:hover, #msform .action-button:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px var(--main-color-one);
        }

        .fs-title {
            font-size: 15px;
            text-transform: uppercase;
            color: #2C3E50;
            margin-bottom: 10px;
        }

        .fs-subtitle {
            font-weight: normal;
            font-size: 13px;
            color: #666;
            margin-bottom: 20px;
        }

        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            counter-reset: step;
            display: flex;
            justify-content: space-evenly;
        }

        #progressbar li.active {
            color: #2c3e50;
            font-weight: 700;
        }

        #progressbar li {
            list-style-type: none;
            color: white;
            text-transform: capitalize;
            font-size: 14px;
            position: relative;
            font-weight: 600;
        }

        #progressbar li:before {
            content: counter(step);
            counter-increment: step;
            width: 30px;
            line-height: 30px;
            display: block;
            font-size: 14px;
            color: #333;
            background: white;
            border-radius: 3px;
            margin: 0 auto 15px auto;;
            font-weight: 700;
        }

        #progressbar li:after {
            content: '';
            width: 210%;
            height: 2px;
            background: white;
            position: absolute;
            left: -160%;
            top: 13px;
            z-index: -1;
        }

        #progressbar li:first-child:after {
            content: none;
        }

        #progressbar li:nth-child(2)::after {
            width: 200%;
            left: -140%;
        }

        #progressbar li.active:before {
            background: var(--main-color-one);
            color: white;
        }

        .brand-logo img {
            max-width: 200px;
            text-align: center;
        }

        .brand-logo {
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
            flex-direction: column;
            align-items: center;
        }

        .main-area {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 100px);
            width: 100%;
            padding: 100px 0;
        }

        .copyright-area {
            text-align: center;
            font-size: 14px;
            color: rgba(255, 255, 255, .6);
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            padding-bottom: 30px;
            background-color: rgb(198, 161, 207);
        }


        .copyright-area a {
            color: #fff;
        }

        .brand-logo .title {
            font-size: 40px;
            line-height: 50px;
            font-weight: 700;
            color: #fff;
            display: block;
            margin-bottom: 0px;
        }

        .brand-logo p {
            color: rgba(255, 255, 255, .8);
        }

        .get-support {
            position: fixed;
            right: 60px;
            bottom: 60px;
        }

        .get-support .icon-wrap {
            position: relative;
            z-index: 0;
        }

        .get-support .icon-wrap:hover .support-list {
            visibility: visible;
            opacity: 1;
        }

        .get-support .icon-wrap .support-list {
            position: absolute;
            bottom: 40px;
            left: 100px;
            margin: 0;
            padding: 0;
            list-style: none;
            width: 100%;
            visibility: hidden;
            opacity: 0;
            transition: 300ms all;
        }

        .get-support .icon-wrap .support-list li {
            display: block;
            background-color: #fff;
        }

        .get-support .icon-wrap .support-list li:nth-child(1),
        .get-support .icon-wrap .support-list li:nth-child(2) {
            position: absolute;
            bottom: 50px;
            right: 100px;
        }

        .get-support .icon-wrap .support-list li:nth-child(1) a,
        .get-support .icon-wrap .support-list li:nth-child(2) a {
            text-decoration: none;
            padding: 8px 20px;
            width: 180px;
            display: block;
            color: #333;
            font-weight: 600;
            transition: all 300ms;
        }

        .get-support .icon-wrap .support-list li:nth-child(1) a:hover,
        .get-support .icon-wrap .support-list li:nth-child(2) a:hover {
            background-color: var(--main-color-one);
            color: #fff;
        }

        .get-support .icon-wrap .support-list li:nth-child(2) {
            position: absolute;
            bottom: 90px;
            right: 100px;
        }

        .get-support .icon-wrap .support-list li:nth-child(2) a {
            text-decoration: none;
            padding: 8px 20px;
            width: 180px;
            display: block;
            color: #333;
            font-weight: 600;
            transition: all 300ms;
        }

        .get-support .icon-wrap i {
            display: inline-block;
            width: 80px;
            height: 80px;
            text-align: center;
            line-height: 80px;
            font-size: 40px;
            background-color: #fff;
            border-radius: 50%;
            color: var(--main-color-one);
            cursor: pointer;
        }

        .content-wrap h4 {
            font-size: 26px;
            line-height: 36px;
            margin-bottom: 20px;
            color: var(--heading-color);
        }

        .content-wrap p {
            color: var(--paragraph-color);
        }

        ul.check-list li.title:before {
            display: none;
        }

        ul.check-list li:before {
            position: static;
            content: "\f058";
            margin-right: 0;
            color: #2bad2b;
            font-family: fontawesome;
        }

        ul.check-list li + li {
            margin-top: 8px;
            color: var(--heading-color);
            opacity: .9;
        }

        ul.close-list .title {
            color: red;
        }

        ul.check-list .title {
            color: #2bad2b;
        }

        ul.close-list {
            padding: 0;
            list-style: none;
            margin: 20px 0;
        }

        ul.check-list .title, ul.close-list .title {
            font-size: 20px;
            font-weight: 700;
            margin: 20px 0;
            border-bottom: 1px solid #e2e2e2;
            padding-bottom: 10px;
        }

        ul.check-list {
            margin: 0;
            padding: 0;
            list-style: none;
            margin-bottom: 20px;
        }

        ul.close-list li.title:before {
            display: none;
        }

        ul.close-list li:before {
            position: static;
            content: "\f057";
            font-family: fontawesome;
            margin-right: 5px;
            color: red;
        }

        ul.close-list li {
            color: var(--heading-color);
            opacity: .78;
        }

        #msform .action-button {
            width: auto;
            padding: 15px 30px;
            margin-top: 30px;
            font-size: 16px;
            font-weight: 600;
        }

        #msform .action-button:focus {
            border: none;
            outline: none;
            box-shadow: none;
        }

        .icon.check {
            color: #2bad2b;
        }

        .icon.close {
            color: #f35656;
        }

        table,
        .requirement-check {
            border-collapse: collapse;
            width: 100%;
        }

        th, td,
        .requirement-check th,
        .requirement-check td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(odd),
        .requirement-check tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        tr:nth-child(even),
        .requirement-check tr:nth-child(even) {
            background-color: #ececec;
        }

        #msform .action-button[disabled] {
            background-color: #eee;
            color: #444;
        }

        .content-wrap h5 {
            font-size: 20px;
            text-align: left;
            margin-bottom: 20px;
        }

        .form-block {
            margin-bottom: 30px;
            text-align: left;
        }

        .form-block label {
            opacity: .8;
            margin-bottom: 10px;
            display: block;
        }

        .form-group .form-control {
            border: 1px solid #e2e2e2;
            border-radius: 0;
        }

        .form-group .form-control:focus {
            outline: none;
            box-shadow: none;
        }

        #msform input[readonly] {
            background-color: #f2f2f2;
            font-weight: 600;
        }

        .alert {
            position: relative;
            padding: .75rem 1.25rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: .25rem;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        ul.error-list {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        ul.error-list li + li {
            margin-top: 10px;
        }

        ul.error-list li {
            font-size: 14px;
            font-weight: 600;
        }

        .install-success {
            display: block;
            width: 100%;
            background-color: #fff;
            padding: 10px 20px;
            margin-bottom: 40px;
        }

        .install-success a {
            color: #fff;
            text-decoration: none;
            background-color: #000;
            padding: 3px 10px;
            border-radius: 3px;
            font-size: 14px;
            margin-top: 20px;
            display: inline-block;
        }

        .install-success strong {
            color: red;
        }

        .info strong {
            color: #2bad2b;
        }

        .check-db-connection {
            display: flex;
            justify-content: space-between;
            background-color: #ececec;
            margin-bottom: 30px;
            align-items: center;
            padding: 20px;
            border-radius: 4px;
        }

        .check-db-connection h2 {
            font-size: 16px;
            font-weight: 500;
        }

        .check-db-connection .boxed-btn.success,
        .check-db-connection .boxed-btn.success:hover{
            background-color: #2bad2b;
        }
        .check-db-connection .boxed-btn {
            border: none;
            padding: 10px;
            background-color: #d4a190;
            color: #fff;
            border-radius: 3px;
            transition: all 300ms;
            cursor: pointer;
        }

        .check-db-connection .boxed-btn:hover {
            color: #fff;
            background-color: #fd8a64;
        }
        .hidden-update-wrap{
            display: none;
        }
        .hidden-update-wrap.show{
            display: block;
        }
        @keyframes flickerAnimation {
            0%   { opacity:1; }
            50%  { opacity:0.5; }
            100% { opacity:1; }
        }
        @-o-keyframes flickerAnimation{
            0%   { opacity:1; }
            50%  { opacity:0.5; }
            100% { opacity:1; }
        }
        @-moz-keyframes flickerAnimation{
            0%   { opacity:1; }
            50%  { opacity:0.5; }
            100% { opacity:1; }
        }
        @-webkit-keyframes flickerAnimation{
            0%   { opacity:1; }
            50%  { opacity:0.5; }
            100% { opacity:1; }
        }
        .animate-flicker {
            -webkit-animation: flickerAnimation 3s infinite;
            -moz-animation: flickerAnimation 3s infinite;
            -o-animation: flickerAnimation 3s infinite;
            animation: flickerAnimation 3s infinite;
        }
        .form-control.has-error {
            border: 2px solid #c74343 !important;
        }
        .head-wrap {
            text-align: left;
        }
        .head-wrap strong {
            color: #da4c59;
            font-size: 14px;
            font-weight: 400;
        }

        .info-text {
            font-size: 14px;
            margin: 0 0 15px;
            display: block;
            color: #f17171;
        }

        .info-text strong {
            background-color: #e6e6e6;
            color: #515152;
            padding: 1px 5px;
        }

        .info-text code {
            background-color: #e6e6e6;
            color: #515152;
            padding: 1px 5px;
        }
    </style>
</head>
<body>
<?php
function home_base_url()
{
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'){
        $url = "https://";
    }else{
        $url = "http://";
    }
    // Append the host(domain name, ip) to the URL.
    $url.= $_SERVER['HTTP_HOST'];
    // Append the requested resource location to the URL
    $url.= $_SERVER['REQUEST_URI'];

    return str_replace(['install/index.php','install/','install','update/index','update/','/update'],['','','','','',''],$url);
}
function get_current_file_url($Protocol='http://') {
    $Protocol = isSecure() ?  'https://' : 'http://';
    return $Protocol.$_SERVER['HTTP_HOST'].str_replace(realpath($_SERVER['DOCUMENT_ROOT']), '', realpath(__DIR__));
}

function isSecure() {
  return
    (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
    || $_SERVER['SERVER_PORT'] == 443;
}


$error_list = [];
function extension_check($name)
{
    if (!extension_loaded($name)) {
        $response = false;
    } else {
        $response = true;
    }
    return $response;
}

function check_option_exists(){
    $database_details = get_database_details();
}

function setEnvValue(array $values)
{

    $envFile = '../core/.env';
    $str = file_get_contents($envFile);

    if (count($values) > 0) {
        foreach ($values as $envKey => $envValue) {

            $str .= "\n"; // In case the searched variable is in the last line without \n
            $keyPosition = strpos($str, "{$envKey}=");
            $endOfLinePosition = strpos($str, "\n", $keyPosition);
            $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);

            // If key does not exist, add it
            if (!$keyPosition || !$endOfLinePosition || !$oldLine) {
                $str .= "{$envKey}={$envValue}\n";
            } else {
                $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
            }

        }
    }

    $str = substr($str, 0, -1);
    if (!file_put_contents($envFile, $str)) return false;
    return true;

}
function showErrorMessage($msg){
    return '<div class="alert alert-danger">'.$msg.'</div>';
}

function showSuccessMessage($msg){
    return '<div class="alert alert-success">'.$msg.'</div>';
}


function get_database_details()
{
    $database_info = [];
    $env_file_content = file_get_contents('../core/.env');
    preg_match('/(DB_HOST).\w+/', $env_file_content, $db_host);
    preg_match('/(DB_DATABASE).\w.+/', $env_file_content, $db_name);
    preg_match('/(DB_USERNAME).\w.+/', $env_file_content, $db_username);
    //have to work on database password
    preg_match('/(DB_PASSWORD).\w.+/', $env_file_content, $db_user_password);
    
    $database_info['DB_HOST'] = count($db_host) > 0 ? substr($db_host[0], 8, strlen($db_host[0])) : '';
    $database_info['DB_DATABASE'] = count($db_name) > 0 ? substr($db_name[0], 12, strlen($db_name[0])) : '';
    $database_info['DB_USERNAME'] = count($db_username) > 0 ? substr($db_username[0], 12, strlen($db_username[0])) : '';
    $database_info['DB_PASSWORD'] = count($db_user_password) > 0 ? substr($db_user_password[0], 12, strlen($db_user_password[0])) : '';
    return $database_info;
}

function formatBytes($size, $precision = 2)
{
    $base = log($size, 1024);
    $suffixes = array('', 'KB', 'MB', 'GB', 'TB');

    return round(1024 ** ($base - floor($base)), $precision) . ' ' . $suffixes[floor($base)];
}

function make_slug($title, $separator = '-')
{

    // Convert all dashes/underscores into separator
    $flip = $separator === '-' ? '_' : '-';

    $title = preg_replace('![' . preg_quote($flip) . ']+!u', $separator, $title);

    // Replace @ with the word 'at'
    $title = str_replace('@', $separator . 'at' . $separator, $title);

    // Remove all characters that are not the separator, letters, numbers, or whitespace.
    $title = preg_replace('![^' . preg_quote($separator) . '\pL\pN\s]+!u', '', mb_strtolower($title, 'UTF-8'));

    // Replace all separator characters and whitespace by a single separator
    $title = preg_replace('![' . preg_quote($separator) . '\s]+!u', $separator, $title);

    return trim($title, $separator);
}

$extensions = [
    'BCMath', 'Ctype', 'JSON', 'Mbstring', 'OpenSSL', 'PDO', 'pdo_mysql', 'Tokenizer', 'XML', 'cURL', 'fileinfo','JSON'
];

$folders = [
    '../core/bootstrap/cache/', '../core/storage/', '../core/storage/app/', '../core/storage/framework/', '../@ore/storage/logs/'
];

?>
<div class="main-area">
    <div class="get-support">
        <div class="icon-wrap">
            <ul class="support-list">
                <li><a href="//xgenious.com/">Visit Website</a></li>
                <li><a href="mailto:contact@xgenious.com">Contact Support</a></li>
            </ul>
            <i class="fa fa-support"></i>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="form-outer-wrapper">
                    <div class="brand-logo">
                        <h2 class="title">Xgenious</h2>
                        <p>Software Update Wizard</p>
                    </div>

                    <?php
                    if ($_POST) {
                        $alldata = $_POST;
                        $db_name = $_POST['database_name'];
                        $db_host = $_POST['database_host'];
                        $db_user = $_POST['database_username'];
                        $db_pass = $_POST['database_username'];
                        $status = verify_input_fields($alldata);
                        if (!$status['error']) {
                            if (!importDatabase($alldata)) {
                                echo "<div class='alert-danger alert'>Please Check Your Database Information!<div>";
                            } else {
                                echo '<div class="alert-success alert">Database Update Done....</div>';
                                if (!systemUpdate()) {
                                    echo "<h2 class='text-center text-danger mt-5 mb-5'> Unexpected Error Occurred During Update. Please Contact for Support.</h2>";
                                } else {
                                    echo '<div class="install-success">Update Completed... <strong> Now Delete Update Folder From Script.</strong> <br> <a href="' . home_base_url() . '">Visit Website</a></div>';
                                }
                            }

                        } else {
                            ?>
                            <div class="alert alert-danger">
                                <ul class="error-list">
                                    <?php
                                    foreach ($status['message'] as $error) {
                                        printf('<li>%1$s</li>', str_replace('_', ' ', $error) . ' field is required');
                                    }
                                    ?>
                                </ul>
                            </div>
                        <?php }
                    } ?>
                    <form id="msform" action="index.php" method="post">
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active">Terms Of Use</li>
                            <li>Server Requirement</li>
                            <li>Update Information</li>
                        </ul>
                        <!-- fieldsets -->
                        <div class="content-wrap with-step">
                            <h4>License to be used on one (1) domain only!</h4>
                            <p>The Regular license is for one website / domain only. If you want to use it on multiple
                                websites / domains you have to purchase more licenses (1 website = 1 license).</p>
                            <ul class="check-list">
                                <li class="title">You Can Do</li>
                                <li> Use on one (1) domain only.</li>
                                <li> Modify or edit as you want.</li>
                                <li> Translate language as you want.</li>
                            </ul>
                            <p><i class=""></i> If any error occured after your edit on code/database, we are not
                                responsible for that.</p>
                            <ul class="close-list">
                                <li class="title">You Can Not Do</li>
                                <li> Resell, distribute, give away or trade by any means to any third party or
                                    individual without permission.
                                </li>
                                <li> Include this product into other products sold on Envato market and its affiliate
                                    websites.
                                </li>
                                <li> Use on more than one (1) domain.</li>
                            </ul>
                            <p>For more information, Please Check <a href="//codecanyon.net/licenses/faq">Envato
                                    License FAQ</a></p>
                            <button type="button" class="next action-button">I Agree, Next Step</button>
                        </div>
                        <div class="content-wrap with-step">
                            <h4>Server Requirements</h4>
                            <table class="requirement-check">
                                <tbody>
                                <tr>
                                    <td><strong>PHP</strong></td>
                                    <td>Required <strong>PHP</strong> version 8.0</td>
                                    <td>

                                        <?php
                                        $phpversion = version_compare(PHP_VERSION, '8.0', '>=');
                                        if ($phpversion == true) {
                                            print '<div class="icon check"><i class="fa fa-check-circle" aria-hidden="true"></i></div>';
                                        } else {
                                            print '<div class="icon close"><i class="fa fa-times" aria-hidden="true"></i></div>';
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                                $ext_errors = 0;
                                foreach ($extensions as $ext):
                                    ?>
                                    <tr>
                                        <td><strong><?php echo ucwords($ext); ?></strong></td>
                                        <td>Required <strong><?php echo ucwords($ext); ?></strong> PHP Extension</td>
                                        <td>
                                            <?php
                                            if (extension_check($ext)) {
                                                print '<div class="icon check"><i class="fa fa-check-circle" aria-hidden="true"></i></div>';
                                            } else {
                                                $ext_errors++;
                                                print '<div class="icon close"><i class="fa fa-times" aria-hidden="true"></i></div>';
                                            }
                                            ?>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                            <button type="button" class="previous action-button">Previous</button>
                            <button type="button"
                                    class="next action-button" <?php echo ($ext_errors > 0) ? 'disabled' : ''; ?> >Next
                            </button>
                        </div>
                        <div class="content-wrap with-step">
                            <h4>Database Information</h4>
                            <div class="form-block">
                                <h5>Database Information</h5>
                                <?php $database_details = get_database_details(); ?>
                                <div class="form-group">
                                    <label for="database_host">Database Host</label>
                                    <input type="text" name="database_host" id="database_host" class="form-control"
                                           value="<?php echo $database_details['DB_HOST']; ?>"
                                           placeholder="Database Host">
                                    <span class="info-text">get your database host from <strong>core>.env</strong> file <code>DB_HOST</code></span>
                                </div>
                                <div class="form-group">
                                    <label for="database_username">Database Username</label>
                                    <input type="text" name="database_username" id="database_username"
                                           class="form-control" value="<?php echo $database_details['DB_USERNAME']; ?>"
                                           placeholder="Database Username">
                                    <span class="info-text">get your database username from <strong>core>.env</strong> file <code>DB_USERNAME</code></span>
                                </div>
                                <div class="form-group">
                                    <label for="database_name">Database Name</label>
                                    <input type="text" name="database_name" id="database_name" class="form-control"
                                           value="<?php echo $database_details['DB_DATABASE']; ?>"
                                           placeholder="Database Name">
                                    <span class="info-text">get your database name from <strong>core>.env</strong> file <code>DB_DATABASE</code></span>
                                </div>
                                <div class="form-group">
                                    <label for="database_password">Database Username Password</label>
                                    <input type="text" name="database_password" id="database_password"
                                           class="form-control" value="<?php echo $database_details['DB_PASSWORD']; ?>"
                                           placeholder="Database Password">
                                    <span class="info-text">get your database username password from <strong>core>.env</strong> file <code>DB_PASSWORD</code></span>
                                </div>
                            </div>
                            <div class="error-wrap"></div>
                            <div class="check-db-connection">
                                <h2>Check Database Connection</h2>
                                <div class="right-wrap">
                                    <button class="boxed-btn" id="db_connection_check">Check</button>
                                </div>
                            </div>
                            <div class="hidden-update-wrap">
                                <div class="alert alert-warning">
                                    if any of those failed, try again, <strong>Don't forget to keep a backup your script and database, if possible do update in staging site first</strong>
                                </div>
                                <div class="appendable-message-box"></div>
                                <div class="check-db-connection">
                                    <h2>Update Core Files</h2>
                                    <div class="right-wrap">
                                        <button class="boxed-btn file_update_button" type="button" data-action="_update_core_files">Update</button>
                                    </div>
                                </div>
                                
                               <div class="check-db-connection" >
                                    <h2>Update Database Files</h2>
                                    <div class="right-wrap">
                                        <button class="boxed-btn file_update_button" type="button" data-action="updated_database_file" >Update</button>
                                    </div>
                                </div> 
                                
                                <div class="check-db-connection">
                                    <h2>Update Custom Files</h2>
                                    <div class="right-wrap">
                                        <button class="boxed-btn file_update_button" type="button" data-action="update_custom_file">Update</button>
                                    </div>
                                </div> 
                                <div class="check-db-connection">
                                    <h2>Update Module Files</h2>
                                    <div class="right-wrap">
                                        <button class="boxed-btn file_update_button" type="button" data-action="update_module_file">Update</button>
                                    </div>
                                </div>
                                <div class="check-db-connection">
                                    <h2>Update Plugins Files</h2>
                                    <div class="right-wrap">
                                        <button class="boxed-btn file_update_button" type="button" data-action="update_plugins_file">Update</button>
                                    </div>
                                </div>
                                <div class="check-db-connection">
                                    <h2>Update Public Assets Files</h2>
                                    <div class="right-wrap">
                                        <button class="boxed-btn file_update_button" type="button" data-action="update_public_assets_file">Update</button>
                                    </div>
                                </div>  
                                <div class="check-db-connection">
                                    <h2>Update Route</h2>
                                    <div class="right-wrap">
                                        <button class="boxed-btn file_update_button" type="button" data-action="update_route_file">Update</button>
                                    </div>
                                </div>
                                <div class="check-db-connection">
                                    <h2>Update Config Files</h2>
                                    <div class="right-wrap">
                                        <button class="boxed-btn file_update_button" type="button" data-action="update_config_file">Update</button>
                                    </div>
                                </div>
                                <div class="check-db-connection">
                                    <h2>Update Resources Files</h2>
                                    <div class="right-wrap">
                                        <button class="boxed-btn file_update_button" type="button" data-action="update_resources_files">Update</button>
                                    </div>
                                </div>
                                
                                <div class="check-db-connection">
                                    <h2>Update Assets</h2>
                                    <div class="right-wrap">
                                        <button class="boxed-btn file_update_button" type="button" data-action="update_assets_file">Update</button>
                                    </div> 
                                </div>
                                <div class="check-db-connection">
                                    <div class="head-wrap">
                                        <h2>Update Vendor Files</h2>
                                        <strong>It can take more time than others</strong>
                                    </div>
                                    <div class="right-wrap">
                                        <button class="boxed-btn file_update_button" type="button" data-action="update_vendors_file">Update</button>
                                    </div>
                                </div>  
                                
                                <div class="alert alert-warning">After successfully update all of above files, go to your admin panel, <strong>general settings > upgrade Database</strong>. upgrade database change to work properly with the update. also clear your script cache from <strong>general settings > cache settings</strong></div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="copyright-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="copyright-inner">
                    &copy; <?php echo date('Y');?> All Right Reserved By <a href="//xgenious.com/">Xgenious</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    $(document).ready(function ($) {
        "use strict";

        var current_fs, next_fs, previous_fs;

        $(document).on('click', '.next', function (e) {
            e.preventDefault();

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            $("#progressbar li").eq($(".content-wrap.with-step").index(next_fs)).addClass("active");

            current_fs.hide();
            next_fs.show();
        });

        $(document).on('click', ".previous", function (e) {
            e.preventDefault();

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            $("#progressbar li").eq($(".content-wrap.with-step").index(current_fs)).removeClass("active");

            previous_fs.show();
            current_fs.hide();
        });

        $(".submit").on('click',function () {
            return false;
        });


        /**
         * update views file
         * @since 1.0.1
         * */
        $(document).on('click','.file_update_button',function (e){
            e.preventDefault();

            var el = $(this);
            var buttonWrap = $(this);
            var errorWrap = '';

            //validate database field
            if (validateDatabaseField()){
                el.text('in progress...');
                el.addClass('animate-flicker');
                $.ajax({
                    type: 'POST',
                    url: "<?php echo get_current_file_url().'/ajax.php'?>",
                    data:{
                        'action' : $(this).data('action')
                    },
                    errors: function (response){
                        console.log(response);
                    },
                    success: function (data){
                        buttonWrap.removeClass('animate-flicker');
                        buttonWrap.text('Update');
                        var errorWrap = $('.appendable-message-box');
                        var jsonData = JSON.parse(data);

                        if (jsonData.type === 'success'){
                            buttonWrap.addClass('success');
                            buttonWrap.text('Update Successful');
                            buttonWrap.attr('disabled',true);
                            toastr.success(jsonData.msg)
                            errorWrap.append('<div class="alert alert-'+jsonData.type+'">'+jsonData.msg+'</div>');
                        }else{
                            toastr.error(jsonData.msg)
                            errorWrap.append('<div class="alert alert-'+jsonData.type+'">'+jsonData.msg+'</div>');
                        }
                    }
                });
            }
        });



        /**
         * check database connection
         * @since 1.0.2
         */
        $(document).on('click','#db_connection_check',function (e){
            e.preventDefault();

            var el = $(this);

            //validate database field
            if (validateDatabaseField()){
                el.text('in progress...');
                el.addClass('animate-flicker');
                $.ajax({
                   type: 'POST',
                   url: "<?php echo get_current_file_url().'/ajax.php'?>",
                   data:{
                       'action' : '_db_connection_check',
                       'db_name' : $('input[name="database_name"]').val(),
                       'db_username' : $('input[name="database_username"]').val(),
                       'db_host' : $('input[name="database_host"]').val(),
                       'db_password' : $('input[name="database_password"]').val(),
                   },
                   errors: function (response){
                       console.log(response);
                   },
                   success: function (data){
                       var errorWrap = $('.error-wrap');
                       var hiddenUpdateWrap = $('.hidden-update-wrap');
                       errorWrap.html('');
                       var btnWrap = $('#db_connection_check');
                       btnWrap.removeClass('animate-flicker');
                       var jsonData = JSON.parse(data);
                       if (jsonData.type === 'success'){
                           hiddenUpdateWrap.addClass('show');
                           btnWrap.text('DB Connected');
                           btnWrap.attr('disabled',true)
                           btnWrap.addClass('success');
                       }else{
                           hiddenUpdateWrap.removeClass('show');
                           btnWrap.text('Check Again');
                       }
                       errorWrap.append('<div class="alert alert-'+jsonData.type+'">'+jsonData.msg+'</div>');
                   }
                });
            }
        });

        /**
        *  validate database fields
        * */
        function validateDatabaseField(){
            var allField = [
                'input[name="database_host"]',
                'input[name="database_username"]',
                'input[name="database_name"]',
            ];
            var returnVal = true;
            allField.forEach(function (value,index){
                if ($(value).val() == ''){
                    $(value).addClass('has-error');
                    returnVal = false;
                }else{
                    $(value).removeClass('has-error');
                }
            });

            return returnVal;
        }


    })
</script>
</body>
</html>