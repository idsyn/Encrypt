<?php 

$key = @$_GET['key'];
$data = @$_GET['data'];
$op = @$_GET['op'];
$result = '';

if (empty($key)) {
	$key = 'DD8E0593-B531-4785-99A7-6CC42325F81E';
}

if (!empty($data)) {
	require_once('des.php');
	$des = new Des($key);
	$result = empty($op) ? $des->Encrypt($data, $key) : $result = $des->Decrypt($data, $key);
}

?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<title>php_des加密/解密</title>
	<meta charset="UTF-8">
	<style type="text/css">
		.txt { width: 400px; }
	</style>
</head>
<body>
	<form action="index.php" method="get">
		<table>
			<tr>
				<td>key</td>
				<td><input type="text" name="key" class="txt" value="<?php echo $key; ?>"></td>
			</tr>
			<tr>
				<td>data</td>
				<td><input type="text" name="data" class="txt" value="<?php echo $data; ?>"></td>
			</tr>
			<tr>
				<td>result</td>
				<td><input type="text" class="txt" value="<?php echo $result; ?>"></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="radio" name="op" value="" id="encrypt" <?php echo empty($op) ? 'checked' : ''; ?>>
					<label for="encrypt">加密</label>
					&nbsp;
					<input type="radio" name="op" value="1" id="decrypt" <?php echo empty($op) ? '' : 'checked'; ?>>
					<label for="decrypt">解密</label>
					&nbsp;
					<input type="submit" value="提交">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>