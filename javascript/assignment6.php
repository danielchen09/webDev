<!DOCTYPE html>
<html>
  <header>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
      jQuery(document).ready(function(){
        var p=parseInt(prompt("guess"));
        var n=parseInt(Math.random()*6+1);
        while(p!=n){
          (p<n)?alert("too low"):alert("too high");
          p=prompt("guess");
        }
        document.getElementById("content").innerHTML="*hacker voice*i'm in";
      });
    </script>
  </header>

  <body>
    <h1><strong>Math Functions – Assignment 6</strong></h1>

    <div id="content">

    </div>

    <a href="assignment7.php">next assignment---></a>

  </body>



</html>
