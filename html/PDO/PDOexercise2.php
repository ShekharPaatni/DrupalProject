<html>
<head><title>CSV</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(document).ready(function(){

//Edit the data
$(this).on('click','#edit',function(){
	this.value="save";
	this.id="save";
var row=$(this).closest('tr');
row.prop('contenteditable', true);
	
});

//Save the data
$(this).on('click','#save',function(){
var row=$(this).closest('tr');
row.prop('contenteditable', false);
var item=row.find("td:eq(0)").text();
var name=row.find("td:eq(1)").text();
var salary=row.find("td:eq(2)").text();
var mobile=row.find("td:eq(3)").text();
var email_id=row.find("td:eq(4)").text();

//AJAX CALL

$.ajax({
url: 'test.php',
type:'POST',
data: {
'item':item,'name':name,'salary':salary,'mobile':mobile,'email':email_id
},
success: function(result){
alert('Successfully updated');
},
 error: function(){
            alert("Error detected");
        }

});

this.value="edit";
	this.id="edit";
location.reload();
});
//delete the row
$(this).on('click','#delete',function(){

var row=$(this).closest('tr');
var item=row.find("td:eq(0)").text();
var con=confirm("Are u sure");
if(con){
$.ajax({
	url: 'delete.php',
	type: 'POST',
		data:{
		'item':item},
	success: function()
			{
			console.log("successfully updated");
			},
	error: function(){
	console.log("error on the ajax");
			}
		});

location.reload();
}
});

});

</script>
</head>
<body>
<table border="2px solid black" cellspacing="3px" cellpadding="2px"> 
<?php
$databasename=new PDO("mysql:host=localhost;dbname=php;","root","root") or die("unable to connect with database");
$result=$databasename->query('select * from csvtable');
while($row = $result->fetch(PDO::FETCH_OBJ)){
echo "<tr>";
echo "<td contenteditable=false>".$row->item."</td><td>".$row->name."</td><td>".$row->salary."</td><td>".$row->mobile
."</td><td>".$row->email_id."</td><td><input type=button value=edit id=edit /><input type=button value=Delete id=delete /></td></tr>";
echo "</tr>";
}

?>
</table>
</body>
</html>
