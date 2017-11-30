<!DOCTYPE html>
<html lang="uk">
<head>
<title>404 Page Not Found | 404 Сторінку не знайдено | Страница не найдена</title>
<meta charset="utf-8">
<link rel="shortcut icon" href="files/favicon.png" type="image/x-icon" />
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,700&s
ubset=latin,cyrillic' rel='stylesheet' type='text/css'>
<style type="text/css">
html, body {width:100%;height:100%;overflow:hidden;margin:0px;padding:0px;font-f
amily:'Open Sans',sans-serif;font-size:16px}
body {background:url('/files/404.png') center no-repeat #333039}
.content {width:100%;text-align:center;position:absolute;bottom:10%;left:0px;}
.content a {display:inline-block;text-decoration:none}
.content a, .content a:hover {color:rgba(255,255,255,0.3);}
.content a:hover {color:rgba(255,255,255,0.5);}
@media only screen and (max-width: 460px), screen and (max-height: 700px) {
.content {position:static;}
.content a {display:block;width:100%;height:100%;position:absolute;top:0px;left:
0px;font-size:0px;opacity:0;}
body {background-size:cover}
}
</style>
</head>
<body>
    <div class="content">
	<a href="/">Go Home | На головну | На главную</a>
	<h1><?php echo $heading; ?></h1>
	<?php echo $message; ?>
    </div>
</body>
</html>