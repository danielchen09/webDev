<!DOCTYPE html>
<html>
  <header>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
      jQuery(document).ready(function(){
        var s=parseInt(localStorage.getItem("s"));
        localStorage.clear();
        var str="";
        if(s<0){
          str="number is too low";
        }else if(s>100){
          str="number is too high";
        }else if(s>86){
          str="great mark";
        }else if(s==50||s==60||s==67){
          str="just on edge";
        }

        document.getElementById("content").innerHTML=str;
        
        str=confirm("Is the total really "+s)?"Math confirmed":"Math incorrect";

        document.getElementById("content").innerHTML+="<br>"+str;

      });
    </script>
  </header>

  <body>
    <h1><strong>Assignment 3</strong></h1>

    <div id="content">

    </div>

    <a href="assignment4.php">next assignment---></a>

  </body>



</html>
