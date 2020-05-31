


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Inicio</title>
</head>
<body>
   

<input type="text" name="" id="msj" placeholder="Escriba el body">
<input onclick="sendEmail()" type="submit" name="" id="Enviar Mail">


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>

function sendEmail(){

$.ajax({
   type: "POST",
   url: "sendMail.php",
   data: {msj :$('#msj').val()},
   dataType: "JSON",
   success: function (res) {
      console.log(res.result);
   }
});



}



</script>

</body>
</html>