<!DOCTYPE html>
<html>
  <header>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
      jQuery(document).ready(function(){
        var n=prompt("enter number");
        for(var i=parseInt(n); i>=0; i--){
          document.getElementById("content").innerHTML+=i+"<br>";
        }
        document.getElementById("content").innerHTML+="blast off";
      });
    </script>
  </header>

  <body>
    <h1><strong>Assign 4-Loops</strong></h1>

    <div id="content">

    </div>

    <a href="assignment5.php">next assignment---></a>

  </body>



</html>
