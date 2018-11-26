var d1=new Vue({
  el:"#d1",
  data:{
    message: "message"
  }
});

var d2=new Vue({
  el:"#d2",
  data:{
    message:"1"
  }
});

var b1=new Vue({
  el:"#b1",
  data:{
    message:"start"
  }
});
var inter;
function start(){
  if(parseInt(d2.message)>1){
    clearInterval(inter);
    d2.message="1";
    b1.message="start";
  }else{
    i=0;
    b1.message="stop";
    inter=setInterval(function(){
      d2.message=i;
      i++
    }, 50);
  }
}

var d3=new Vue({
  el:"#d3",
  data:{
    seen:true
  }
});

var b2=new Vue({
  el:"#b2",
  data:{
    message:"hide"
  }
});
function show(){
  d3.seen=!d3.seen;
  b2.message=d3.seen?"hide":"show";
  console.log(d3.seen);
}

var n=[];
for(var i=0; i<10; i++){
  n.push({text: i});
}
console.log(n);
var d4=new Vue({
  el:"#d4",
  data:{
    nums:n
  }
});

var d5=new Vue({
  el:"#d5",
  data:{
    message:""
  },
  methods:{
    appendMessage:function(){
      var r=Math.floor((Math.random()*26)+65);
      this.message+=String.fromCharCode(r);
    },
    reset:function(){
      this.message="";
    }
  }
});

var d6=new Vue({
  el:"#d6",
  data:{
    message:""
  }
});

Vue.component("c1", {
  props:["content"],
  template:"<li>{{content.text}}</li>"
});

var d7=new Vue({
  el:"#d7",
  data:{
    nums:n
  }
});

var d8=new Vue({
  el:"#d8",
  data:{
    message:"hi"
  },
  computed:{
    longmessage: function(){
      var msg="";
      for(var i=0; i<this.message.length; i++){
        for(var c=0; c<5; c++){
          msg+=this.message.charAt(i);
        }
      }
      return msg;
    }
  }
});

var d9=new Vue({
  el:"#d9",
  data:{
    message:"hi",
    messagebefore:""
  },
  watch:{
    message:function(after, before){
      this.messagebefore=before;
    }
  }
});
var button=new Vue({
  el:'#button',
  data:{
    available:false,
    nearby:false
  },
  computed:{
    checkclass:function(){
      return{
        available: this.available,
        nearby: this.nearby
      }
    }
  }
});
var array = new Vue({
    el: '#array',
    data: {
        baseObject: {
            fontSize: "50px",
            padding: "10px",
        },
        successObject: {
            color: "green",
            backgroundColor: "lightgreen",
            border: "1px solid green"
        },
        dangerObject: {
            color: "darkred",
            backgroundColor: "red",
            border: "1px solid darkred"
        },
    }
});