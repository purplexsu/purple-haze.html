<?php
//ini_set('date.timezone','PRC');
$date = putenv('TZ=Asia/Shanghai');
mktime(0,0,0,1,1,1970) ;
$cmd=$_GET["cmdcmd"];
if($cmd=="1")
{
  exec('/home/purpl24/public_html/cmdcmd/zip.sh');
  header(sprintf("Location: %s", "comment.zip")); 
  return;
}
elseif($cmd=="2")
{
  echo system('/home/purpl24/public_html/cmdcmd/extract.sh');
  return;
}
elseif($cmd=="3")
{
  $tmp=$_FILES['MyFile']['tmp_name'];
  $name=$_FILES['MyFile']['name'];
  $flag=stristr($name,"update.zip");
  if(strlen($flag)>0)
  {
    $result=copy($tmp,$name);
    echo $result;
    echo $_FILES['MyFile']['error'];
  }
  else
  {
    echo "no";
  }
}
elseif($cmd=="4")
{
  exec('cp ~/access-logs/purplexsu.net ~/www/purplexsu.txt');
  exec('chmod +r ~/www/purplexsu.txt');      
}
elseif($cmd=="5")
{
  exec('rm ~/www/purplexsu.txt');
}
else
{
?>
<html>
<body>
<ol>
<li>backup comment</li>
<li>extract the update</li>
</ol>
<?php echo date("Y-m-d H:i:s");?>
  </body>
  </html>
<?php
}
?>
