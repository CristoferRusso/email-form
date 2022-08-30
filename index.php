


<?php
//E possibile eseguire lo stesso sistema di javascript con php
//Inizzializza error a zero
$error ="";
$successMessage = "";
//Verifica che cè una variabile post
if($_POST) {

//Verifica se l'indirizzo email è vuoto
if(!$_POST['email']) {
    $error .=" The email field is required<br>";
}
if(!$_POST['subject']) {
    $error .=" The subject field is required<br>";
}
if(!$_POST['text']) {
    $error .=" The text field is required<br>";
}

//Verifica che l'email sia corretta

if (filter_var(!$_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
  $error .= "The email address is invalid.<br>"

}

if($error != "") {
    $error = "<div class='alert alert-danger' role='alert'> <strong>Error!</strong><br>.$error.</div>"
} else {
    $emailTo = "soch.hobby.1994@gmail.com";
    $subject = $_POST['subject'];
    $text = $_POST['text'];
    $headers = "From: ".$_POST['email'];
    
    if(mail($emailTo, $subject,$text,$headers)) {
        $successMessage = "<div class='alert alert-success' role='alert'> <strong>Error!</strong><br>Your message was sent</div>"
    } else {
        "<div class='alert alert-danger' role='alert'> <strong>Error!</strong><br>Message didn't send for unknown reason, please try later</div>"
    }
}
}
?>



<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyEmailProject</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">


    <style>
        body {
            background-color: rgb(201, 210, 237);
        }

        h1 {
            font-size: 60px;
            color: rgb(219, 55, 55);
            margin-left: 20%;
            border: 2px solid rgb(219, 55, 55);
            width: 40%;
            padding-left: 25px;
            border-radius: 50px;

        }

        #container {
            margin: 40px;
            background-color: rgb(201, 210, 237);

        }

        #img1 {

            margin-left: 30%;
            border: 2px solid skyblue;
            width: 40%;
            border-radius: 50%;
        }

        #img2 {
            width: 80px;
            border-radius: 50%;
            float: left;
            margin-top: 15px;
        }

        #alert{
            font-size: 30px;
            font-weight: bold;
            
        }

    </style>
</head>

<body>

    <div id="container">
        <form method="post">
            <img id='img2' src="images/sample-logo-design-png-3-2.png">
            <h1>Get in Touch!</h1>
           <div id="error"> <? echo $error?></div>
          

            <div class="mb-3">
                <label for="email" name="name" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="name@example.com">
            </div>
            
            <div class="mb-3">
                <label for="subject" name="subject" class="form-label">Subject</label>
                <textarea class="form-control" id="subject" rows="1"></textarea>
            </div>
           
            <div class="mb-3">
                <label for="text" name="text" class="form-label">Your question</label>
                <textarea class="form-control" id="text" rows="3"></textarea>
            </div>
            
            <button type="submit" id="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div id="img">
        <img id='img1' src="images/sample-logo-design-png-3-2.png"></a>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js"
        integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7"
        crossorigin="anonymous"></script>

    <script type="text/javascript">

        $("form").submit(function (e) {
            e.preventDefault();

            var error = "";  
          
            //Controlla che il valori di subject, email e text sono vuoti, se è vero stampa il messagio error
            if ($("#subject").val() == "") {

                error += " The subject field is required<br>";
    
            }
            if ($("#email").val() == "") {

                error += " The email field is required<br>";

            }
            if ($("#text").val() == "") {

                error += " The text field is required<br>";
               

            }

            //Se error è vero stampa i il messaggio di alert altrimenti quello di completamento
          if (error != "") {
            $("#error").html("<div class='alert alert-danger' role='alert'> <strong>Error!</strong><br>"+ error + "</div>");

          } else {
            $("#error").html("<div class='alert alert-success' role='alert'>Email sended, we will reply as soon as possible<br> Thank you :) </div>");

          }
        

        });

    
    </script>
</body>

</html>