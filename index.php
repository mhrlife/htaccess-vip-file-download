<html>
    <head>
        <title>Welcome to movie store</title>
    </head>
    <body>
    <div>
        <ul>
            <li>
                <a href="index.php">home page</a>
            </li>
            <li>
                <a href="users.php">manage users</a>
            </li>
        </ul>
    </div>
    <h1>
        list of movies
    </h1>
    <ul>
    <?php
        $listofmovies = [
            "file.txt"=>"new TXT file . (VIP) "
        ];
        foreach($listofmovies as $file => $desc){
            ?>
            <li>
                <table>
                    <tr>
                        <td>
                            <?= $desc ?>
                        </td>
                        <td>
                            <a href="download.php?file=<?= $file ?>">
                                Download Now
                            </a>
                        </td>
                    </tr>
                </table>
            </li>

            <?php
        }
    ?>
    </ul>

    </body>
</html>


<h1> htpasswd parser class </h1>
you can parse .htpasswd files and control users .
<h3>Methods</h3>
<code> contructor($address) </code> address of .htpasswd <br>
<code>parse()</code> parse .htpasswd file <br>
<code>reload()</code> fetch content and parse again <br>
<code>haveUser()</code> check .htaccess have user or not <br>
<code>userExists($username)</code> check <code>$username</code> exists or not <br>
<code>addUser($username , $password ) </code> push new user in <code>$users[] </code> <br>
<code>updateUser($username , $password )</code> update user ( user password ) <br>
<code>deleteUser($username) </code> unset <code>$username</code> from <code>$users[]</code> <br>
<code>eneratePw($pw)</code> generate crypted password <br>
<code>save()</code> save changes. needed after <code>addUser , updateUser , deleteUser </code> <br>
<pre> contact me @ telegram ( <a href="http://telegram.me/pp2007ws">@pp2007ws</a>)</pre>

