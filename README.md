<h1> simple vip download file using htaccess</h1>
in this project we project a folder ( downloads ) with htaccess . <br>
we can manage .htpasswd users with user.php file . <br>
this project is using <a href="https://github.com/Amhr/htpasswd-parser">Htpasswd parser class</a> library . <br>
<h2>files </h2>
<table>
    <tr>
        <td>index.php</td>
        <td>home page . in this file we have an array called <code>$listofmovie[]</code>. this is a simple project and we can fetch movies ( for example ) from database . </td>
    </tr>
    <tr>
        <td>
            users.php
        </td>
        <td>
            users management file . create , modify and removing users from .htpasswd file .
        </td>
    </tr>
    <tr>
        <td>
            download.php
        </td>
        <td>
            in this file user enter user and pass and we redirect user to file . if username and password is correct user can download file else apache display 401 error ( we modified this error in .htaccess file ) 
        </td>
    </tr>
    <tr>
        <td>
            htpasswd.class.php
        </td>
        <td>
            htpasswd parser class
        </td>
    </tr>
    
</table>
<pre> contact me @ telegram ( <a href="http://telegram.me/pp2007ws">@pp2007ws</a>)</pre>
