<!DOCTYPE html>
<html>
  <header>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  </header>

  <body>
    <h1><strong>Assign 7 – Arrays</strong></h1>

    <div id="content">

    </div>

    <a href="assignment8.php">next assignment---></a>

  </body>
  <script>
    var arr=["strings","in","ar","r","ay"];
    document.getElementById("content").innerHTML="strings in array: "+arr;
    jQuery(document).ready(function(){
      var n=prompt("enter a new element");
      while(arr.includes(n)){
        n=prompt("enter a NEW element");
      }
      arr.push(n);
      document.getElementById("content").innerHTML="strings in array: "+arr;
    });

  </script>


</html>
