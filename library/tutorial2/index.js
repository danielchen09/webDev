var size=50;
var _pix=15;

var _headx=size/2;
var _heady=size/2;
var _head=[_headx, _heady];
var _bodyx=_headx-1;
var _bodyy=_heady;
var _body=[[_bodyx, _bodyy], [_bodyx-1, _bodyy]];

var _foodx=parseInt(Math.random()*size*2);
var _foody=parseInt(Math.random()*size);
var _food=[[_foodx, _foody]];
console.log(_food);
//head->tail
var main=new Vue({
  el:"#main",
  data:{
    pix:_pix,
    body:_body,
    head:_head,
    food:_food,
    vhorizontal:1,
    vvertical:0,
    alive:1,
    score:0,
    moved:0,
    styleObject:{
      left:0,
      top:0
    }
  },
  created: function(){
    window.addEventListener("keydown", this.changeDirection, false);
  },
  methods:{
    changeDirection: function(e){
      if(!this.moved){
        if(e.keyCode==37 && this.vhorizontal!=1){
          console.log("left");
          this.vvertical=0;
          this.vhorizontal=-1;
        }else if(e.keyCode==38 && this.vvertical!=1){
          console.log("up");
          this.vhorizontal=0
          this.vvertical=-1;
        }else if(e.keyCode==39 && this.vhorizontal!=-1){
          console.log("right");
          this.vvertical=0;
          this.vhorizontal=1;
        }else if(e.keyCode==40 && this.vvertical!=-1){
          console.log("down");
          this.vhorizontal=0;
          this.vvertical=1;
        }else{
          console.log("other");
        }
        this.moved=true;
      }
    },
    move: function(){

      if(this.vhorizontal+this.vvertical!=0&&this.alive){
        this.body.pop();
        this.body.unshift(this.head);
        this.head=[this.head[0]+this.vhorizontal, this.head[1]+this.vvertical];
        var index=-1;
        for(var i=0; i<this.food.length; i++){
          if(this.head[0]==this.food[i][0]&&this.head[1]==this.food[i][1]){
            this.body.push(this.body[this.body.length-1][0]-this.vhorizontal, this.body[this.body.length-1][1]-this.vvertical);
            this.score++;
            index=i;
          }
        }
        if(index!=-1) this.food.splice(index, 1);
        this.moved=0;
      }

      for(var i=1; i<this.body.length; i++){
        if(this.body[0][0]==this.body[i][0]&&this.body[0][1]==this.body[i][1]){
          this.gameOver();
        }
      }
      if(this.body[0][0]<0||this.body[0][1]<0||this.body[0][0]*this.pix>window.innerWidth||this.body[0][1]*this.pix>window.innerHeight){
        this.gameOver();
      }
    },
    addFood: function(){
      if(this.alive){
        var foodx=parseInt(Math.random()*size);
        var foody=parseInt(Math.random()*size);
        this.food.push([foodx, foody]);
      }
    },
    gameOver: function(){
      this.alive=0;
      alert("game over! score:"+this.score);
      clearInterval(game);
      clearInterval(foodspawn);
      location.reload();
    }
  }
});

var game=window.setInterval(function(){
  main.move();
}, 100);
var foodspawn=window.setInterval(function(){
  main.addFood();
}, 2000);
