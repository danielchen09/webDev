<!DOCTYPE html>
<html>
  <header>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
      jQuery(document).ready(function(){
        var name=prompt("enter your name");
        var age=prompt("enter your age");
        while(isNaN(age)){
          age=prompt("enter a number for your age");
        }

      });
      function f(){
        document.getElementById("rock").src="rocklaugh.jpg";
        document.getElementById("d").innerHTML="rock is LAUGHING";
        setTimeout(function(){
            document.getElementById("rock").src="rock.png";
            document.getElementById("d").innerHTML="";
        }, 2000);
      }

    </script>
    <style>
      img{
        width: 25%;
        float:left;
      }
      a{
        float:left;
      }
    </style>
  </header>

  <body>
    <h1><strong>Assign 9 – Pet Rock</strong></h1>
    <a href="assignment10.php">next assignment---></a>
    <br>
    <p id="d"></p>
    <img src="rock.png" onclick="f()" id="rock"/>
    <div id="content">

    </div>


  </body>



</html>
