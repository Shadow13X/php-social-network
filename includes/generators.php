<?php
    //str_gen,tel_gen,user_gen
    function str_gen($len)
    {
        
        $str="";
        for ($i=0;$i<$len;$i++)
        {
            $rnd=chr(rand(97,122));
            $str.=$rnd;
        }
        return $str;
    }
    /////////////////////////////////////////////////////////
    function tel_gen()
    {
        
        $tl="06";
        for ($i=0;$i<8;$i++)
        {
            $rnd=rand(0,9);
            $tl.=$rnd;
        }
        return $tl;
    }
    /////////////////////////////////////////////////////////
    function user_gen($max_len=8)
    {
        $user = array();
    //     $f_name
    //     $l_name
    //     $tel
    //     $email
        $rnd_len= rand(3,$max_len);
        $f_name= str_gen($rnd_len);

        $rnd_len= rand(3,$max_len);
        $l_name= str_gen($rnd_len);
        
        $rnd_len= rand(3,$max_len);
        $email= str_gen($rnd_len)."@gmail.com";

        $tel= tel_gen();
        
        //array_push($user,$f_name,$l_name,$email,$tel);

        $user["f_name"]=$f_name;
        $user["l_name"]=$l_name;
        $user["email"]=$email;
        $user["phone"]=$tel;
        $user['about']='lorem upsum';
        $user['img']='./img/profile.jpg';

        return $user;
    }
?>