<script>
  function loadCart(){
    var arr = JSON.parse(sessionStorage.getItem("order"));
    if(arr==null){
      arr=[];
    }
    document.getElementById("cartitems").innerHTML="";
    for(i=0; i<arr.length; i++){
      document.getElementById("cartitems").innerHTML+="<div class='cartitem'>" + arr[i][0].split(".")[0] + "*" + arr[i][1] + "<br>NT$" + arr[i][2] + "</div>";
    }
    var price=0;
    for(i=0; i<arr.length; i++){
      price+=arr[i][2];
    }
    document.getElementById("cartprice").innerHTML="total: NT$" +price;
  }
  function popup(path){
    if(sessionStorage.getItem("user")){
      var name=path.split(".")[0];
      $.get("resources/" + name + ".html", function(response){
      console.log("resources/" + name + ".html");
        var description=response.split("~")[1];
        var price=parseInt(response.split("~")[0]);
        swal({
          title: name,
          confirmButtonColor: "#000",
          html:
            "<div style='text-align:justify'>"+description +"</div>"+
            "<br><br>Amount<br><select id=\"amount\" class=\"selectoption\" ><option value=\"1\">1</option>"+
            "<option value=\"2\">2</option>"+
            "<option value=\"3\">3</option>"+
            "<option value=\"4\">4</option>"+
            "<option value=\"5\">5</option>"+
            "<option value=\"6\">6</option>"+
            "<option value=\"7\">7</option>"+
            "<option value=\"8\">8</option>"+
            "<option value=\"9\">9</option>"+
            "<option value=\"10\">10</option>"+
            "</select>",
          showCancelButton: true,
          confirmButtonText: "Add to cart",
          preConfirm: function(){
            return new Promise(function(resolve){
              resolve([
                $("#amount").val()
              ]);
            });
          },
        }).then(function(result){
          if(result.value){
            if(sessionStorage.getItem("order")){
              var arr = JSON.parse(sessionStorage.getItem("order"));
              var exist=false;
              for(var i=0; i<arr.length; i++){
                if(arr[i][0]==path){
                  arr[i][1]=Math.min((parseInt(arr[i][1])+parseInt(result["value"][0])).toString(), 10);
                  arr[i][2]=arr[i][1]*price;
                  exist=true;
                }
              }
              if(!exist){
                arr.push([path,result["value"][0],price*parseInt(result["value"][0])]);
              }
              console.log(arr);
              sessionStorage.setItem("order", JSON.stringify(arr));
            }else{
              sessionStorage.setItem("order", JSON.stringify([[path,result["value"][0],price*parseInt(result["value"][0])]]));
            }
            loadCart();
          }
        })
      });
    }else{
      swal({
        title:"You have to login or register first",
        confirmButtonColor: "#000",
        allowOutsideClick: false,
        showCancelButton: true,
        confirmButtonText: "login",
        cancelButtonText: "register"
      }).then(function(result){
        if(result.value){
          login();
        }else{
          register();
        }
      })
    }
  }
  loadCart();
</script>
<table id="menu">
  <div id="menutop"></div>
  <?php
    ini_set('display_errors', 1);
    ini_set('displat_startup_errors', 1);
    error_reporting(E_ALL);
    $items=scandir("./img/menu");
    for($i=0; $i<ceil(count($items)/3); $i++){
      echo "<tr>";
      for($j=0; $j<min(3,count($items)-$i*3-$j-2); $j++){
        $path=$items[$i*3+$j+2];
        $name=explode(".", $path)[0];
        $price=explode("~", file_get_contents("./resources/".$name.".html"))[0];
        echo "<td><div class=\"menuitem\"  style=\"font-size:180%\"  onclick=popup(\"" . $path . "\")><img src=\"img/menu/" . $path . "\"/>" . "<div class='menuitemname'>"
        . $name . "</div><div class='menuitemprice'>NT$" . $price . "</div></div></td>";
      }
      echo "</tr>";
    }
  ?>
</table>
<div id="cart">
  <div id="cartitems">

  </div>
  <div id="cartprice">
  </div>
  <div id="deliverybutton" onclick="setDelivery()">
    <div id="deliverybuttontext">
      Checkout
    </div>
  </div>
</div>
