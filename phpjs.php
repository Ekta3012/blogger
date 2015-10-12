<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<button onclick="show();">submit</button>
<p id="demo"></p>
<script>
function show(){
document.getElementById('demo').innerHTML = "<?php echo 'hello';?>";
}
</script>
</body>
</html>