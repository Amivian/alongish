<?php
    if(isset($_POST['reset']))
    {
        
        $code = htmlspecialchars(strip_tags($_POST['code']));
        $user = new admin\Admin;
        $user->resetCode($code);
    }