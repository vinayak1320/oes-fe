<?php

   if( $_POST["email"] && $_POST["pass"]) {

        $e = $_POST['email'];

        $p = $_POST['pass'];

   }

?>



<!DOCTYPE html>

<html lang="en" >

<head>

  <meta charset="UTF-8">

  <title>Welcome Student</title>

  <script src="https://www.gstatic.com/firebasejs/5.9.4/firebase.js"></script>

  <script type="text/javascript">

    var config = {

                      apiKey: "AIzaSyAZvS1JQtLsKC7W4dlCwGNmrPCZ-98I_SU",

                      authDomain: "collegescholar-d5d53.firebaseapp.com",

                      databaseURL: "https://collegescholar-d5d53.firebaseio.com",

                      projectId: "collegescholar-d5d53",

                      storageBucket: "collegescholar-d5d53.appspot.com",

                      messagingSenderId: "911646095686"

                    };

                    firebase.initializeApp(config);

    var a = '<?php echo $e; ?>';

    var b = '<?php echo $p; ?>';

    console.log(a,b);

    var email_ver = false;

    var user ;

    var email_ver ;

    firebase.auth().signInWithEmailAndPassword(a, b).then(function() {

        user = firebase.auth().currentUser;

        //email_ver = firebase.auth().currentUser.emailVerified;

        console.log("success");

    }).catch(function(error) {

      // Handle Errors here.

      var errorCode = error.code;

      var errorMessage = error.message;

      console.log("errorMessage");

      // ...

    }); 

    var id;

    var main = "";

    

    

    firebase.auth().onAuthStateChanged(function(user) {

       if (user) {

           id = user.uid;

           console.log(id);

           var ref = firebase.database().ref("users/"+id+"/name");

                              ref.on("value", function(snapshot) {

                                main = snapshot.val();

                                document.getElementById('name_id').innerHTML = main;

                                console.log(main);

                              }, function (error) {

                                 console.log("Error: " + error.code);

                              });

       }

    });                       

    if(!email_ver){

        //window.open("http://gstvinpar.000webhostapp.com/","_self");

    }

  </script>

  

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans:600'>

      <link rel="stylesheet" href="./style.css">

  <link rel="shortcut icon" href="vin.png" type="image/png">

  <style>

body {font-family: Arial, Helvetica, sans-serif;}

* {box-sizing: border-box;}

*



/* Create two equal columns that floats next to each other */

.column {

  float: left;

  width: 50%;

  padding: 10px;


}



/* Clear floats after the columns */

.row:after {

  content: "";

  display: table;

  clear: both;

}

input[type=text], select, textarea {

  width: 100%;

  padding: 12px;

  border: 1px solid #ccc;

  border-radius: 4px;

  box-sizing: border-box;

  margin-top: 6px;

  margin-bottom: 16px;

  resize: vertical;

}

input[type=password], select, textarea {

  width: 100%;

  padding: 12px;

  border: 1px solid #ccc;

  border-radius: 4px;

  box-sizing: border-box;

  margin-top: 6px;

  margin-bottom: 16px;

  resize: vertical;

}



input[type=submit] {

  background-color: #4CAF50;

  color: white;

  padding: 12px 20px;

  border: none;

  border-radius: 4px;

  cursor: pointer;

}



input[type=submit]:hover {

  background-color: #45a049;

}



.container {

  border-radius: 5px;

  background-color: #f2f2f2;

  padding: 20px;

}

</style>

</head>

<body>
<div class="row">
<div class="column" style="background-color:#bbb;height: 65px">
	
<img src="http://gstvinpar.000webhostapp.com/gst%20logo.png">
</div>
  

  <div class="column" style="background-color:#aaa;height: 65px">
<p id="name_of_student" align="right">Welcome ! <font color="blue" id="name_id">//Student Name//</font> <strong>-->><button type="button" onclick="alert('Are you sure you want to exit ?')">Logout!</button></strong></p>
</div>


</div>
<hr width=80%>
<marquee behavior="alternate">Today's scholarship test is scheduled for 5:00 PM</marquee><hr width=80%>

<h2 align="center">Important Notifications for students </h2>

<hr width=30%>

<div class="row">

  <div class="column" style="background-color:#aaa;">

    <h2><u>Instructions for Exam</u></h2>

    <h3>keep in mind the timer running</h3>

    
   <p align="right" id="main_button"> <a href="testdash.html">|||<input type="submit" value="Start Test">|||</a></p>

  </div>

  <div class="column" style="background-color:#bbb;">

    <h2><u>Test Schedules</u></h2>

    <h4><ol>

    <li>April 25, 2019 - 5:00 PM

    <li>April 28, 2019 - 8:00 PM

    <li>April 30, 2019 - 11:00 PM

    </ol></h4>

  </div>

</div>



			<hr width=50%>

            <h5 align="center">Developed by :- <a href="v.html" target="_blank"><strong><u>Vinay Saurabh </u>(Front End)</strong></a> and  <a href="p.html" target="_blank"><strong><u>Parth Gaba</u> (Back End)</strong></a></h5>

            <hr width=50%>

            <script type="text/javascript">

              document.getElementById('name_id').innerHTML = main;

              var submit = document.getElementById('main_button');

              submit.style.visibility = 'hidden';

              var phone = document.getElementById('phonenum');

              var confphone = document.getElementById('confphone');

              var appVerifier = window.recaptchaVerifier;

              var sign_in_button = document.getElementById('sign');

              var codeBox = document.getElementById('box_2');

              var code_input = document.getElementById('code_inp');

                var recap = document.getElementById('recaptcha-container');

                

                setTimeout(function() {

                  window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {

                      'size': 'normal',

                      'callback': function(response) {

                          console.log("success", response);

                      },

                      'expired-callback': function() {

                          console.log("expired-callback");

                      }

                  });



                  recaptchaVerifier.render().then(function(widgetId) {

                      window.recaptchaWidgetId = widgetId;

                  });

                },10);

              // signInWithPhoneNumber will call appVerifier.verify() which will resolve with a fake

              // reCAPTCHA response.

              function onmain(){

                var conf = "+91"+confphone.value;

                var phoneNumber = "+91"+phone.value;

              

                if (conf!=phoneNumber){

                  window.alert("phone number doesnot match");

                  return;

                }

                firebase.auth().signInWithPhoneNumber(phoneNumber, recaptchaVerifier)

                    .then(function (confirmationResult) {

                      window.confirmationResult = confirmationResult;

                      console.log('success');

                      codeBox.style.display = "block";

                      codeBox.style.visibility = "visible";

                      recap.style.visibility = "hidden";

                      recap.style.display = "none";

                      sign_in_button.style.visibility = "visible";

                      

                    }).catch(function (error) {

                      console.log(error);

                      // Error; SMS not sent

                      // ...

                    });



                } 





              function signin(){

                //On state change of firebase

                var code = code_input.value;

                    confirmationResult.confirm(code).then(function (result) {

                  // User signed in successfully.

                  var user = result.user;

                 // window.alert("success");

                 // window.open("doc.html","_self");

                 submit.style.visibility = 'visible';

                  // ...

                }).catch(function (error) {

                  window.alert(error);

                  // User couldn't sign in (bad verification code?)

                  // ...

                });}

            </script>

</body>

</html>