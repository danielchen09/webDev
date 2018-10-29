<!DOCTYPE html>
<html>
  <header>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
      document.addEventListener("DOMContentLoaded", function(event) {
        var n1= prompt("enter a number");
        var n2= prompt("enter another number");
        var n3= prompt("enter your favorite class");
        localStorage.setItem("s", (parseInt(n1)+parseInt(n2)));

        document.getElementById("content").innerHTML="sum: "+(parseInt(n1)+parseInt(n2))+"<br>concat: "+n2+n3;
      });
    </script>
  </header>

  <body>
    <h1><strong>Assignment 2-Variables</strong></h1>

    <div id="content">

    </div>

    <a href="assignment3.php">next assignment---></a>

  </body>



</html>
