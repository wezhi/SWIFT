<?php

/**
 * Created by PhpStorm.
 * User: FROST
 * Date: 2015/10/28
 * Time: 16:42
 */
class Snow
{
    /**
     * 获取ip地址
     * @return string
     */
    function GetIP(){
        $ip='';
        IF(Getenv('HTTP_CLIENT_IP') And StrCaseCmp(Getenv('HTTP_CLIENT_IP'),'unknown')){
            $ip=Getenv('HTTP_CLIENT_IP');
        }ElseIF(Getenv('HTTP_X_FORWARDED_FOR') And StrCaseCmp(Getenv('HTTP_X_FORWARDED_FOR'),'unknown')){
            $ip=Getenv('HTTP_X_FORWARDED_FOR');
        }ElseIF(Getenv('REMOTE_ADDR')And StrCaseCmp(Getenv('REMOTE_ADDR'),'unknown')){
            $ip=Getenv('REMOTE_ADDR');
        }ElseIF(isset($_SERVER['REMOTE_ADDR']) And $_SERVER['REMOTE_ADDR'] And StrCaseCmp($_SERVER['REMOTE_ADDR'],'unknown')){
            $ip=$_SERVER['REMOTE_ADDR'];
        }Else{
            $ip='127.0.0.1';
        }
        return $ip;
    }

    /**
     * 根据IP地址获取城市信息
     * @param null $ip
     * @return mix|string
     */
    function GetAddress($ip = null){
        if ($ip == null){
            $ip = $this->GetIP();
        }
        $address = file_get_contents("http://int.dpool.sina.com.cn/iplookup/iplookup.php?ip=" . $ip);
//        return $address;
        $tmp = explode(' ',$address);
        return count($tmp);
        foreach ($tmp as $val){
            $tmp .= $val;
        }
        return $tmp;
    }

    /**
     * 获取操作系统类型
     * @return string
     */
    function GetOS(){
        $OS = "";
        if(!empty($_SERVER['HTTP_USER_AGENT'])){
            $OS = $_SERVER['HTTP_USER_AGENT'];
            if (preg_match('/win/i',$OS)) {
                $OS = 'Windows';
            }elseif (preg_match('/mac/i',$OS)) {
                $OS = 'MAC';
            }elseif (preg_match('/linux/i',$OS)) {
                $OS = 'Linux';
            }elseif (preg_match('/unix/i',$OS)) {
                $OS = 'Unix';
            }elseif (preg_match('/bsd/i',$OS)) {
                $OS = 'BSD';
            }else {
                $OS = 'Other';
            }
            return $OS;
        }else{
            return "��ȡ�ÿͲ���ϵͳ��Ϣʧ�ܣ�";
        }
    }

    /**
     * 获取浏览器类型
     * @return string
     */
    function GetBrowser(){
        if(!empty($_SERVER['HTTP_USER_AGENT'])){
            $br = $_SERVER['HTTP_USER_AGENT'];
            if (preg_match('/MSIE/i',$br)) {
                $br = 'MSIE';
            }elseif (preg_match('/Firefox/i',$br)) {
                $br = 'Firefox';
            }elseif (preg_match('/Chrome/i',$br)) {
                $br = 'Chrome';
            }elseif (preg_match('/Safari/i',$br)) {
                $br = 'Safari';
            }elseif (preg_match('/Opera/i',$br)) {
                $br = 'Opera';
            }else {
                $br = 'Other';
            }
            return $br;
        }else{return "��ȡ�������Ϣʧ�ܣ�";}
    }

    /**
     * 获取浏览器语言
     * @return string
     */
    function GetBrowserLang(){
        if(!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])){
            $lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
            $lang = substr($lang,0,5);
            if(preg_match("/zh-cn/i",$lang)){
                $lang = "��������";
            }elseif(preg_match("/zh/i",$lang)){
                $lang = "��������";
            }else{
                $lang = "English";
            }
            return $lang;

        }else{
            return "��ȡ���������ʧ�ܣ�";
        }
    }
}