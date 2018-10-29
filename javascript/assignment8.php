<!DOCTYPE html>
<html>
  <header>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
      function f1(){
        window.history.back();
      }
      function f2(){
        alert("width" + screen.width + "\nheight: " + screen.height);
        alert("url: "+window.location.href);
      }
      function f3(){
        document.getElementById("img3").innerHTML='<img src="pic3alt.jpg"/>';
        document.getElementById("d3").innerHTML="banana boi has grown up";
      }
      function f4(){
        var arr=document.getElementsByTagName("img");
        console.log(arr);
        for(var i=0; i<arr.length; i++){
          arr[i].style.width="50px";
        }
        arr[arr.length-1].style.opacity=0;
        document.getElementById("d4").innerHTML="sad cat has left.";
      }
    </script>
    <style>
      img{
        width: 50%;
      }
      table{
        width:100%
      }
      td{
        width:25%;
      }
    </style>
  </header>

  <body>
    <h1><strong>Assign 8 – DOM</strong></h1>
    <a href="assignment9.php">next assignment---></a>
    <table>
      <tr>
        <td><img src="pic1.jpg" onclick="f1()"/></td>
        <td><img src="pic2.jpg" onclick="f2()"/></td>
        <td id="img3"><img src="pic3.jpg" onclick="f3()"/></td>
        <td><img src="pic4.jpg" onclick="f4()"/></td>
      </tr>
      <tr>
        <td>potato cat</td>
        <td>snail cat of wisdom</td>
        <td id="d3">cat no like banana</td>
        <td id="d4">sad cat</td>
      </tr>
    </table>

    <div id="content">

    </div>


  </body>



</html>
