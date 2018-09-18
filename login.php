<?php
ob_start();
session_start();
require_once('includes/db.php');


if(isset($_POST['submit']))
{
    $username=mysqli_real_escape_string($con,$_POST['username']);
    $password=mysqli_real_escape_string($con,md5($_POST['password']));

    $check_uname_query="select * from pasistence_admin where username='$username' or email='$username'";
    $query_run=mysqli_query($con,$check_uname_query);
    if(mysqli_num_rows($query_run)>0)
    {
        $row=mysqli_fetch_array($query_run);

        $db_uname=$row['username'];
        $db_email=$row['email'];
        $db_password=$row['password'];
        $db_fname=$row['fname'];
        $db_image=$row['image'];
        // $password=crypt($password, $db_password);

        if(($username==$db_uname && $password==$db_password)  or  ($username==$db_email && $password==$db_password))    
        {
            
            $_SESSION['username']=$db_uname;
            $_SESSION['email']=$db_email;  
            $_SESSION['image']=$db_image;
            header('location:index.php');
        }

    }
    else
    {
        $error=" wrong username or password";
    }
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login : LifeClub</title>
        <meta name="description" content="Login : LifeClub">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="img/logopng.png">
        <link rel="shortcut icon" href="img/logopng.png">

      
        <link rel="stylesheet" href="assets/scss/style.css">

        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

        
        <style>
        @import url('https://fonts.googleapis.com/css?family=Nunito');
@import url('https://fonts.googleapis.com/css?family=Poiret+One');

body, html {
	height: 100%;
	background-repeat: no-repeat;    /*background-image: linear-gradient(rgb(12, 97, 33),rgb(104, 145, 162));*/
	background:black;
	position: relative;
}
#login-box {
	position: absolute;
	top: 0px;
	left: 50%;
	transform: translateX(-50%);
	width: 350px;
	margin: 0 auto;
	border: 1px solid black;
	background: rgba(48, 46, 45, 1);
	min-height: 250px;
	padding: 20px;
	z-index: 9999;
}
#login-box .logo .logo-caption {
	font-family: 'Poiret One', cursive;
	color: white;
	text-align: center;
	margin-bottom: 0px;
}
#login-box .logo .tweak {
	color: #ff5252;
}
#login-box .controls {
	padding-top: 30px;
}
#login-box .controls input {
	border-radius: 0px;
	background: rgb(98, 96, 96);
	border: 0px;
	color: white;
	font-family: 'Nunito', sans-serif;
}
#login-box .controls input:focus {
	box-shadow: none;
}
#login-box .controls input:first-child {
	border-top-left-radius: 2px;
	border-top-right-radius: 2px;
}
#login-box .controls input:last-child {
	border-bottom-left-radius: 2px;
	border-bottom-right-radius: 2px;
}
#login-box button.btn-custom {
	border-radius: 2px;
	margin-top: 8px;
	background:#ff5252;
	border-color: rgba(48, 46, 45, 1);
	color: white;
	font-family: 'Nunito', sans-serif;
}
#login-box button.btn-custom:hover{
	-webkit-transition: all 500ms ease;
	-moz-transition: all 500ms ease;
	-ms-transition: all 500ms ease;
	-o-transition: all 500ms ease;
	transition: all 500ms ease;
	background: rgba(48, 46, 45, 1);
	border-color: #ff5252;
}
#particles-js{
  	width: 100%;
  	height: 100%;
  	background-size: cover;
  	background-position: 50% 50%;
  	position: fixed;
  	top: 0px;
  	z-index:1;
}
        </style>
    </head>
    <body class="bg-dark">





    <div class="container ">
        <div id="login-box">
            <div class="logo">
                <img src="img/lifeclub.jpg" class="img img-responsive img-circle center-block"/>
                <h1 class="logo-caption"><span class="tweak" style="border-radius:5px;color:#8fbf29;">L</span>ogin</h1>
            </div><!-- /.logo -->
            <div class="controls animated shake">
                <form action="" method="post" autocomplete="off">
                <input type="text" name="username" placeholder="Username or Email" class="form-control" />
                <input type="text" name="password" placeholder="Password" class="form-control" />
                
                
                
                 <input type="submit" value="Sign In" class="btn btn-default btn-block btn-custom" style="border-radius:5px; background-color:#16bef0;" name="submit"/>

                </form>
            </div><!-- /.controls -->
        </div><!-- /#login-box -->
    </div><!-- /.container -->
    <div id="particles-js"></div>


<script type="application/javascript">
    $.getScript("https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js", function(){
    particlesJS('particles-js',
      {
        "particles": {
          "number": {
            "value": 80,
            "density": {
              "enable": true,
              "value_area": 800
            }
          },
          "color": {
            "value": "#ffffff"
          },
          "shape": {
            "type": "circle",
            "stroke": {
              "width": 0,
              "color": "#000000"
            },
            "polygon": {
              "nb_sides": 5
            },
            "image": {
              "width": 100,
              "height": 100
            }
          },
          "opacity": {
            "value": 0.5,
            "random": false,
            "anim": {
              "enable": false,
              "speed": 1,
              "opacity_min": 0.1,
              "sync": false
            }
          },
          "size": {
            "value": 5,
            "random": true,
            "anim": {
              "enable": false,
              "speed": 40,
              "size_min": 0.1,
              "sync": false
            }
          },
          "line_linked": {
            "enable": true,
            "distance": 150,
            "color": "#ffffff",
            "opacity": 0.4,
            "width": 1
          },
          "move": {
            "enable": true,
            "speed": 6,
            "direction": "none",
            "random": false,
            "straight": false,
            "out_mode": "out",
            "attract": {
              "enable": false,
              "rotateX": 600,
              "rotateY": 1200
            }
          }
        },
        "interactivity": {
          "detect_on": "canvas",
          "events": {
            "onhover": {
              "enable": true,
              "mode": "repulse"
            },
            "onclick": {
              "enable": true,
              "mode": "push"
            },
            "resize": true
          },
          "modes": {
            "grab": {
              "distance": 400,
              "line_linked": {
                "opacity": 1
              }
            },
            "bubble": {
              "distance": 400,
              "size": 40,
              "duration": 2,
              "opacity": 8,
              "speed": 3
            },
            "repulse": {
              "distance": 200
            },
            "push": {
              "particles_nb": 4
            },
            "remove": {
              "particles_nb": 2
            }
          }
        },
        "retina_detect": true,
        "config_demo": {
          "hide_card": false,
          "background_color": "#b61924",
          "background_image": "",
          "background_position": "50% 50%",
          "background_repeat": "no-repeat",
          "background_size": "cover"
        }
      }
    );

});






    </script>
    </body>
</html>
