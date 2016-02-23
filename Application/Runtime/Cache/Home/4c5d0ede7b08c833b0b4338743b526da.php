<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>user-agent</title>
	<style type="text/css">
		.main {margin:0 auto;}
		.main td{width:400px;}
		.text {width:400px;}
	</style>
</head>
<body>
	<?php if(!empty($result)): ?><table class="main">
			<tr>
				<textarea name="" cols="250px" rows="40px"><?php echo ($result); ?></textarea>
			</tr>
		</table><?php endif; ?>
	<form action="" method="post">
		<table border="1" class="main">			
			<tr>
				<td>user-agent的值(留空则为本浏览器ua)</td>
				<td><input type="text" name="agent" class="text"/></td>			
			</tr>
			<tr>
				<td>目标url</td>
				<td><input type="text" name="url" class="text"/></td>
			</tr>
			<tr>
				<td>url所带的参数(get方法专用,问号后面的一串东西)</td>
				<td><input type="text" name="canshu" class="text"/></td>
			</tr>
			<tr>
				<td>post传值的name,多个name用逗号隔开(post方法专用)</td>
				<td><input type="text" name="post_name" class="text"/></td>
			</tr>
			<tr>
				<td>post的name对应的值,用逗号隔开(post方法专用)</td>
				<td><input type="text" name="post_value" class="text"/></td>
			</tr>
			<tr>
				<td>传值方式</td>
				<td>
					<input type="radio" name="method" value="get" checked="checked"/>GET		
					<input type="radio" name="method" value="post"/>POST
				</td>											
			</tr>
			<tr>
				<td>
					<input type="submit" value="submit"/>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>