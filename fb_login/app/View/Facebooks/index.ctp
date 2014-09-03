<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
	<head>
		<title>Facebook Login</title>
		<style>
			body { font-family: 'Lucida Grande', Verdana, Arial, sans-serif;}
			a { text-decoration: none; color: #000; }
			a:hover { text-decoration: underline; }
		</style>
	</head>
	<body>
		<?php if ($user): ?>
			<a href="<?php echo $logoutUrl; ?>">Logout</a>
		<?php else: ?>
			<div>
				Login to upload the file:
				<a href="<?php echo $loginUrl; ?>">Upload</a>
			</div>
		<?php endif ?>

		<?php if ($user): ?>
			<!--<h3><?php echo $user_profile['name'];?></h3>
			<img src="https://graph.facebook.com/<?php echo $user; ?>/picture">-->
			<pre><?php //print_r($user_profile);?></pre>
			<?php header("Location: http://www.google.com");exit; ?>
		<?php else: ?>
			<strong><em>You are not Connected.</em></strong>
		<?php endif ?>
	</body>
</html>
