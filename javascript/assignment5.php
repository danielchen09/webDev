<!DOCTYPE html>
<html>
  <header>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script>
        function f(){
          var n1=prompt("enter how many coke u want");
          var n2=prompt("enter how many mars bar u want");
          document.getElementById("content").innerHTML="coke subtotal: $"+(parseInt(n1)*3.99)+"<br>mars bar subtotal: $"+(parseInt(n2)*9.79);
          document.getElementById("content").innerHTML+="<br>total: $"+(parseInt(n1)*3.99+parseInt(n2)*9.79);
        }
      </script>
  </header>

  <body>
    <h1><strong>Assign 5-Functions</strong></h1>
    <a href="assignment6.php">next assignment---></a>
    <p>coke: $3.99<br>mars bar: $9.79<p>
    <div id="content">

    </div>
    <img src="floatcat.png" onclick="f()"/>


  </body>


</html>
