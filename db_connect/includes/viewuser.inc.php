<?php
class ViewUser extends User{

    public function showAllUsers(){
        $datas = $this->getAllUser();
        foreach ($datas as $data)
        {
            echo $data['uid']."<br>";
            echo $data['pwd']."<br>";
        }
    }

}