<!DOCTYPE html>
<html>
<head>
	<title>Ajax Tutorial</title>
</head>
<body>
<input type="submit" id="btn" name="" value="click me">
<p id="para"></p>
<tr>
	<td id="table-data">
		<table>
			<tr>
				<th>username</th>
				<th>email</th>
			</tr>
		</table>
	</td>
</tr>


<script type="text/javascript" src="Jquery/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
      $("#btn").on("click",function(e){
      $.ajax({
      url : "load_data.php",
      type : "POST",
      success : function(data)
      {
      	$("#para").innerHTML=data;
      }
      });
      });
	});
</script>
</body>
</html>