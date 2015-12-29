
<?php
    $downloadFile = "localhost/vipdownload/downloads/".$_GET['file'];

    if(isset($_POST['login'])){
        // check user authentication ( not .htaccess :) ) something like monitoring and etc .
        $usr = $_POST['login']['usrname'];
        $passwd = $_POST['login']['passwd'];
        header("Location:http://$usr:$passwd@$downloadFile");
    }
?>
<html>
    <head>
        <title>
            VIP Required
        </title>
    </head>
    <body>
        <div>
            <h3>
                Login Form
            </h3>
            <form action="" method="post" target="_self">
            <fieldset>
                <label>User name </label>
                <input type="text" name="login[usrname]" />
            </fieldset>
            <fieldset>
                <label>Pass word</label>
                <input type="password" name="login[passwd]" />
            </fieldset>
            <fieldset>
                <input type="submit" value="Login">
            </fieldset>
            </form>
        </div>
    </body>
</html>