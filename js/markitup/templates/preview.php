<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>markItUp! preview template</title>
<style>
body {
	background-color:#EFEFEF;
	font:70% Verdana, Arial, Helvetica, sans-serif;
}
</style>
</head>

<body>
<?
print_r($data);
include '../../class/bbcode/bbcode.lib.php';
$bb = new bbcode($text);
echo $bb -> get_html();
?>
</body>
</html>