<script>
  var arr = JSON.parse(sessionStorage.getItem("order"));
  function loadDelivery(){
    arr = JSON.parse(sessionStorage.getItem("order"));
    if(arr==null){
      arr=[];
    }
    for(i=0; i<arr.length; i++){
      document.getElementById("deliverycontainer").innerHTML +=
      "<div class=\"deliveryitem\">" +
        "<img src=\"img/menu/" + arr[i][0] +"\"/>" +
        "<div class=\"deliveryname\">" +
          "<table>"+
          "<tr>"+
          "<td>"+
          "item name:" + arr[i][0].split(".")[0] +
          "</td>"+
          "<td>"+
          "price:" + "NT$"+parseInt(arr[i][2])/parseInt(arr[i][1])+
          "</td>"+
          "<td>"+
          "amount:" +arr[i][1]+
          "</td>"+
          "<td>"+
          "total:" +arr[i][2]+
          "</td>"+
          "</tr>"+
          "</table"+
        "</div>" +
        "<i  onclick=\"deleteitem(\'" + arr[i][0] + "\')\" class=\"delete fa fa-trash\"/>" +
        "<i  onclick=\"edititem(\'" + arr[i][0] + "\')\" class=\"edit far fa-edit\"/>" +
      "</div>";
    }
    if(arr.length==0){
      document.getElementById("deliverycontainer").innerHTML =
      "<div class=\"deliveryitem\">" +
      "<div class=\"deliveryname\" style=\"margin-left:45%;\">" +
      "Your order is empty" +
      "</div>" +
      "</div>";
    }
    var price=0;
    for(i=0; i<arr.length; i++){
      price+=arr[i][2];
    }
    document.getElementById("pricetext").innerHTML="Total: "+price;
  }
  function deleteitem(path){
    arr = JSON.parse(sessionStorage.getItem("order"));
    for(var i=0; i<arr.length; i++){
      if(arr[i][0]==path){
        arr.splice(i,1);
        break;
      }
    }
    sessionStorage.setItem("order", JSON.stringify(arr));
    document.getElementById("deliverycontainer").innerHTML="";
    loadDelivery();
  }
  function edititem(path){
    swal({
      title: "Amount",
      html:
        "<select id=\"amount\" class=\"selectoption\" ><option value=\"1\">1</option>"+
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
      confirmButtonText: "Edit",
      confirmButtonColor: "#000",
      preConfirm: function(){
        return new Promise(function(resolve){
          resolve([
            $("#amount").val()
          ]);
        });
      },
    }).then(function(result){
      if(result.value){
        arr = JSON.parse(sessionStorage.getItem("order"));
        for(var i=0; i<arr.length; i++){
          if(arr[i][0]==path){
            arr[i][2]=parseInt(arr[i][2])/parseInt(arr[i][1])*parseInt(result["value"][0]);
            arr[i][1]=parseInt(result["value"][0]).toString();
          }
        }
        sessionStorage.setItem("order", JSON.stringify(arr));
        document.getElementById("deliverycontainer").innerHTML="";
        loadDelivery();
      }
    })
  }
  $(document).ready(function(){
    loadDelivery();
  });

  function checkout(){
    var arr = JSON.parse(sessionStorage.getItem("order"));
    if(arr==null||arr.length==0){
      swal({
        title: "Your order is empty!",
        confirmButtonColor: "#000"
      });
    }else{
      swal({
        title: "Send your order?",
        showCancelButton: true,
        confirmButtonColor: "#000"
      }).then(function(result){
        console.log(JSON.stringify(arr));
        if(result.value){
          $.ajax({
            type: "POST",
            url: "order.php",
            data: {
              "username":sessionStorage.getItem("user"),
              "foodarr":JSON.stringify(arr)
            },
            cashe: false,
            success: function(response){
              swal({
                title:"your order is added!",
                confirmButtonColor: "#000"
              });
              sessionStorage.removeItem("order");
              document.getElementById("deliverycontainer").innerHTML="";
              loadDelivery();
              console.log(response);
            },
            failure: function(response){
              swal({
                title:"fail",
                confirmButtonColor: "#000"
              });
              console.log(response);
            }
          })
        }
      })
    }
  }

</script>
<div id="deliverycontainer">

</div>

<div id="checkout" onclick="checkout()">

  <div id="checkouttext">
    Checkout
  </div>
</div>
<div id="price">
  <div id="pricetext">

  </div>
</div>
