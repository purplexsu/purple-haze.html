<?php
$nouse = putenv('TZ=Asia/Shanghai');
mktime(0,0,0,1,1,1970) ;
session_start();
$file=$_POST["source"];
$site=htmlspecialchars($_POST["site"]);
if((strstr($_POST["comment"],"<a ")!=false) || (substr_count($_POST["comment"],"http")>1))
{
	// bad comment filter
	header(sprintf("Location: %s", "index.html")); 
	return;
}
if($_POST["captcha"] != $_SESSION["captcha"] || empty($_POST["captcha"]))
{
	// bad captcha
	header(sprintf("Location: %s", "index.html")); 
	return;
}



if(strlen($_POST["site"])==0)
{
	$site="#";
}
$comment=nl2br(htmlspecialchars($_POST["comment"]));
$id=htmlspecialchars($_POST["id"]);
if(!strstr($file,"comment-"))
{
	header(sprintf("Location: %s", "index.html")); 
}
elseif(strlen($id)==0 || strlen($comment)==0)
{
	header(sprintf("Location: %s", $file)); 
}
else
{
    // Update the specific comment-???.html
	$fr=fopen($file,"r");
	$content=fread($fr,filesize($file));
	fclose($fr);
	
	$tag="<div id=\"CommentArea\">";
	$tmp="\r\n<div><a href=\"".$site."\" rel=\"nofollow\"><strong>".$id."</strong></a> - ".date("Y-m-d H:i:s")."</div>\r\n";
	$tmp=$tmp."<div>".$comment."</div>\r\n<br />";
	$content=str_replace($tag,$tag.$tmp,$content);
	
	$fw=fopen($file,"w");
	fwrite($fw,$content);
	fclose($fw);
	
	// Update the /comment.inc	
	$content1="<div class=\"snippettext\">".$id." - ".date("Y-m-d H:i:s")."</div>"."<div class=\"snippettext\"><a rel=\"nofollow\" href=\"".$file."\">".$comment."</a></div>";
	
	$fw1=fopen("comment.inc","w");
	fwrite($fw1,$content1);
	fclose($fw1);
	
	// Update the /comments.inc	
	$file2="comments.inc";
	$fr2=fopen($file2,"r");
	$content2=fread($fr2,filesize($file2));
	fclose($fr2);
	
	$content2=$content1."<br />\r\n".$content2;
	$content2=str_replace(" class=\"snippettext\"","",$content2);
	
	$fw2=fopen($file2,"w");
	fwrite($fw2,"\r\n".$content2);
	fclose($fw2);
	
	// Redirect and refresh
	header(sprintf("Location: %s", $file)); 
}
?>
