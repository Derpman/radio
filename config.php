<?php
ini_set("display_errors", "On");
error_reporting(E_ALL ^ E_NOTICE);
header('Content-type: text/html; charset=utf-8');
session_start();
class Config
{
	public $css_path = "/radio/Derpman/assets/css/";
	public $js_path = "/radio/Derpman/assets/js/";
	public $user = 'root';
	public $password = 'root';
	public $db = 'radioDB';
	public $host = 'localhost';
    public $port = 8889;
    public $mysqli;
    public function Init() 
	{
		$this->mysqli=new mysqli($this->host,$this->user,$this->password,$this->db);
		if ($this->mysqli->connect_error) 
		{
    		die('Connect Error (' . $this->mysqli->connect_errno . ') ' . $this->mysqli->connect_error);
		}
		$this->mysqli->query("SET NAMES UTF8");
	}
	public function get_meta() 
	{
		$res = "";
		$arr_css = array("main.css","jquery-ui.css","elfinder.min.css","theme.css","bootstrap.css");
		$arr_js = array("jquery.js","jquery.cookie.js","main.js","jquery-ui.js","elfinder.full.js","elfinder.ru.js","bootstrap.min.js");
		foreach($arr_css as $file) $res .= "<link rel='stylesheet' type='text/css' href='".$this->css_path.$file."' />";
		foreach($arr_js as $file) $res .= "<script type='text/javascript' src='".$this->js_path.$file."'></script>";
		return $res;
	}
	public function is_admin_auth()
	{
		if (isset($_SESSION['admin']))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function admin_auth($login,$password)
	{
		if ($row=$this->mysqli->prepare("call radioAdminAuth(?,?)"))
		{
			$row->bind_param("ss",$login,$password);
			$row->execute();
			$row->bind_result($login);
			if($row->fetch())
			{	
				$_SESSION['admin'] = $login;
			}
			$row->close();
		}
	}
}
?>