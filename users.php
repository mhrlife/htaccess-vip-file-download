<?php
ini_set('display_errors','On');
error_reporting(E_ALL);

    require "htpasswd.class.php";
    $users = new htpasswd(dirname(__FILE__)."/downloads/.htpasswd");

    if(isset($_POST['addusr'])){
        $usrname = $_POST['addusr']["usrname"];
        $passwd = $_POST['addusr']["passwd"];
        if (strlen($usrname) > 3 && strlen($passwd) > 3){

            if(!$users->userExists($usrname)){

                $users->addUser($usrname,$users->generatePw($passwd));
                $users->save();
                $echo = "User added .";


            }else{
                $echo = "user exists .";
            }

        }else{
            $echo = "username / password must be at least 4 chars .";
        }

    }

    if(isset($_POST['del'])){
        $username = $_POST['del']['username'];
        $users->deleteUser($username);
        $users->save();
        $echo = "User deleted .";
    }

    if(isset($_POST['update'])){
        $username = $_POST['update']['username'];
        $passwd = $_POST['update']['passwd'];
        $users->updateUser($username,$users->generatePw($passwd));
        $users->save();
        $echo = "User updated .";
    }
    $users->reload();


?>
<html>
    <head>

    </head>
    <body>
        <div>
            <h2>Users </h2>
            <?php
                if($users->haveUser()):
                    echo "<table style='width: 100%'>";
                        foreach($users->users as $usr=>$passwd){
                           ?>
                                <tr>
                                    <td>
                                        <?= $usr; ?>
                                    </td>
                                    <td>
                                        <?= $passwd; ?>
                                    </td>
                                    <td>
                                        <form action="" method="post" target="_self">
                                            <input type="hidden" name="del[username]" value="<?= $usr ?>"/>
                                            <input type="submit" value="Delete"/>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="" method="post" target="_self">
                                            <input type="hidden" name="update[username]" value="<?= $usr ?>"/>
                                            <input type="password" name="update[passwd]" value=""/>
                                            <input type="submit" value="Change Passwd"/>
                                        </form>
                                    </td>
                                </tr>

                            <?php
                        }
                    echo "</table>";
                else:
                        echo "<b> No User Found </b>";
                endif;
            ?>
        </div>
        <div>
            <h2>Adding User</h2>
            <form action="" method="post" target="_self">
                <fieldset>
                    <label> User name : </label>
                    <input type="text" name="addusr[usrname]"/>
                </fieldset>
                <fieldset>
                    <label> Password : </label>
                    <input type="password" name="addusr[passwd]"/>
                </fieldset>
                <fieldset>
                    <input type="submit" name="addUser"/>
                </fieldset>
            </form>

            <?= isset($echo) ? $echo : ""  ?>

        </div>
    </body>
</html>