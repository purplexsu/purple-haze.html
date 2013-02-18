<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Cache-Control" content="no-cache"/>
</head>
<body>
<?php
function submitPing(){
$server_ping=array(
array('host'=>'blogsearch.google.com','path'=>'/ping/RPC2'),
array('host'=>'rpc.technorati.com','path'=>'/rpc/ping'),
array('host'=>'rpc.weblogs.com','path'=>'/RPC2')
// array('host'=>'api.my.yahoo.com','path'=>'/RPC2'),
);
$s1='<param><value><string>';
$s2='</string></value></param>';
$p='<?xml version="1.0" encoding="UTF-8"?><methodCall><methodName>weblogUpdates.ping</methodName><params>';
$p.=$s1.htmlspecialchars("Purplexsu's Space").$s2;
$p.=$s1.htmlspecialchars("http://www.purplexsu.net/atom.xml").$s2;
//$p.=$s1.htmlspecialchars(implode('|',explode(',',$item[_COLUMN_ITEM_TAG]))).$s2;
$p.='</params></methodCall>';
$r=$p;
foreach($server_ping as $s){
$r.="\r\n".submitPost($s['host'],$s['path'],$p,"text/xml");
}
return $r;
}
function submitPost($host,$path,$query_string,$content_type) {
$http_request = "POST ".$path." HTTP/1.1\r\n";
$http_request .= "Host: ".$host."\r\n";
$http_request .= "Content-Type: ".$content_type."\r\n";
//$http_request .= "User-Agent: Fomalhaut\r\n";
$http_request .= "Connection: close\r\n";
$http_request .= 'Content-Length: '.strlen($query_string)."\r\n";
$http_request .= "\r\n";
$http_request .= $query_string;
$response = '';
if( false !== ( $fs = @fsockopen($host, 80, $errno, $errstr, 3) ) ) {
fwrite($fs, $http_request);
while ( !feof($fs) )
$response .= fgets($fs, 1024); // One TCP-IP packet
fclose($fs);
}
return $http_request."\r\n".$response;
}

echo submitPing();
?>
</body>
</html>
