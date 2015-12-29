<?php


class htpasswd{
    var $content;
    var $users = [];
    var $address;
    function __construct($address)
    {
        $this->address = $address;
        $this->reload();
    }
    function parse(){
        $users = explode("\n",$this->content);
        if(count($users) > 1 || strlen($users[0]) > 3){
            foreach($users as $usr) {
                $user = explode(":",$usr);
                $this->users[$user[0]] = $user[1];
            }
        }
    }

    function reload(){
        $address = $this->address;
        $content = file_get_contents($address);
        $this->content = $content;
        $this->parse();
    }

    function haveUser(){
        return count($this->users) > 0 ;
    }
    function getUserByUsername($usrname){
        if($this->userExists($usrname)){
            return $this->users[$usrname];
        }else return false;
    }
    function userExists($username){
        return isset($this->users[$username]);
    }
    function addUser($username , $password){
        $this->users[$username] = $password;
    }
    function updateUser($username , $password ){
        $this->addUser($username,$password);
    }
    function deleteUser($username){
        unset($this->users[$username]);
    }
    function generatePw($pw){
        return crypt($pw,base64_encode($pw));
    }
    function save(){
        $newstr = "";
        foreach($this->users as $username => $passwd){
            $newstr.= "$username:".$passwd."\n";
        }
        $newstr = trim($newstr,"\n");
        file_put_contents($this->address,$newstr);
    }
}