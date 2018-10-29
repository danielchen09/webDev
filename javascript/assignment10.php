<!DOCTYPE html>
<html>
  <header>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
      jQuery(document).ready(function(){

      });
      function b(){
        document.getElementById("in3").value=parseInt(document.getElementById("in1").value)+parseInt(document.getElementById("in2").value);
      }
      function showgender(){
        if(document.getElementById("radio1").checked){
          document.getElementById("img1").src="male.jpg";
        }else if(document.getElementById("radio2").checked){
          document.getElementById("img1").src="female.jpg";
        }
      }
      function changepic(){
        var option=document.getElementById("select").selectedIndex;
        document.getElementById("img2").src=document.getElementById("select").options[option].value;
      }
    </script>
    <style>
      img{
        width: 25%;
      }
    </style>
  </header>

  <body>
    <h1><strong>Assign 10 – Forms</strong></h1>
    <form>
      <label for="in1">Number 1:</label>
      <input type="text" name="number1" id="in1"/>
      <br>
      <label for="in2">Number 2:</label>
      <input type="text" name="number2" id="in2" onblur="b()"/>
      <br>
      <label for="in3">Answer:</label>
      <input type="text" name="answer" id="in3"/>
      <br>
      <input type="radio" name="gender" id="radio1">Male</input>
      <input type="radio" name="gender" id="radio2">Female</input>
      <br>
      <select id="select" onchange="changepic()">
        <option value="ironman.png">iron man</option>
        <option value="superman.png">super man</option>
        <option value="spiderman.jpg">spider man</option>
      </select>
      <br>
      <image id="img1"/>
      <image id="img2"/>
      <br>
      <p id="ptag">Message: </p>
      <br>
      <input type="button" name="reset" id="button1" value="Action=Reset"></input>
      <input type="button" name="none" id="button2" onclick="showgender()" value="Action=None"></input>

    </form>
    <div id="content">

    </div>

    <a href="assignment11.php">next assignment---></a>

  </body>



</html>
