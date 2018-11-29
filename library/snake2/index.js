var size=50;
var _pix=15;

var _headx=size/2;
var _heady=size/2;
var _head=[_headx, _heady];
var _head2=[2,0];
var _bodyx=_headx-1;
var _bodyy=_heady;
var _body=[[_bodyx, _bodyy], [_bodyx-1, _bodyy]];
var _body2=[[0,0], [1,0]];

var _foodx=parseInt(Math.random()*size*2);
var _foody=parseInt(Math.random()*size);
var _food=[[_foodx, _foody]];
console.log(_food);
//head->tail
var main=new Vue({
  el:"#main",
  data:{
    keymap:{37: false, 38: false, 39: false, 40:false, 65:false, 87:false, 68:false, 83:false},
    pix:_pix,
    body:_body,
    body2:_body2,
    head:_head,
    head2:_head2,
    food:_food,
    vhorizontal:1,
    vvertical:0,
    vhorizontal2:1,
    vvertical2:0,
    alive:1,
    score:0,
    score2:0,
    moved:0,
    moved2:0,
    styleObject:{
      left:0,
      top:0
    },
    styleObject2:{
      left:0,
      top:0
    }
  },
  created: function(){
    window.addEventListener("keydown", this.kd, false);
    window.addEventListener("keyup", this.ku, false)
  },
  methods:{
    ku: function(e){
      this.keymap[e.keyCode]=false;
    },
    kd: function(e){
      this.keymap[e.keyCode]=true;
    },
    changeDirection: function(){
      if(!this.moved){
        if(this.keymap[37] && this.vhorizontal!=1){
          console.log("left");
          this.vvertical=0;
          this.vhorizontal=-1;
        }else if(this.keymap[38] && this.vvertical!=1){
          console.log("up");
          this.vhorizontal=0
          this.vvertical=-1;
        }else if(this.keymap[39] && this.vhorizontal!=-1){
          console.log("right");
          this.vvertical=0;
          this.vhorizontal=1;
        }else if(this.keymap[40] && this.vvertical!=-1){
          console.log("down");
          this.vhorizontal=0;
          this.vvertical=1;
        }else{
          console.log("other");
        }
        this.moved=true;
      }
      if(!this.moved2){
        if(this.keymap[65] && this.vhorizontal2!=1){
          console.log("left");
          this.vvertical2=0;
          this.vhorizontal2=-1;
        }else if(this.keymap[87] && this.vvertical2!=1){
          console.log("up");
          this.vhorizontal2=0
          this.vvertical2=-1;
        }else if(this.keymap[68] && this.vhorizontal2!=-1){
          console.log("right");
          this.vvertical2=0;
          this.vhorizontal2=1;
        }else if(this.keymap[83] && this.vvertical2!=-1){
          console.log("down");
          this.vhorizontal2=0;
          this.vvertical2=1;
        }else{
          console.log("other");
        }
        this.moved2=true;
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
          alert("player 2 win");
          this.gameOver();
        }
      }
      for(var i=1; i<this.body2.length; i++){
        if(this.body[0][0]==this.body2[i][0]&&this.body[0][1]==this.body2[i][1]){
          alert("player 2 win");
          this.gameOver();
        }
      }
      if(this.body[0][0]<0||this.body[0][1]<0||this.body[0][0]*this.pix>window.innerWidth||this.body[0][1]*this.pix>window.innerHeight){
        alert("player 1 win");
        this.gameOver();
      }

      //----------------------------------------------------------------------------

    },
    move2: function(){
      if(this.vhorizontal2+this.vvertical2!=0&&this.alive){
        this.body2.pop();
        this.body2.unshift(this.head2);
        this.head2=[this.head2[0]+this.vhorizontal2, this.head2[1]+this.vvertical2];
        var index=-1;
        for(var i=0; i<this.food.length; i++){
          if(this.head2[0]==this.food[i][0]&&this.head2[1]==this.food[i][1]){
            this.body2.push(this.body2[this.body2.length-1][0]-this.vhorizontal2, this.body2[this.body2.length-1][1]-this.vvertical2);
            this.score2++;
            index=i;
          }
        }
        if(index!=-1) this.food.splice(index, 1);
        this.moved2=0;
      }

      for(var i=1; i<this.body2.length; i++){
        if(this.body2[0][0]==this.body2[i][0]&&this.body2[0][1]==this.body2[i][1]){
          alert("player 1 win");
          this.gameOver();
        }
      }
      for(var i=1; i<this.body.length; i++){
        if(this.body2[0][0]==this.body[i][0]&&this.body2[0][1]==this.body[i][1]){
          alert("player 1 win");
          this.gameOver();
        }
      }
      if(this.body2[0][0]<0||this.body2[0][1]<0||this.body2[0][0]*this.pix>window.innerWidth||this.body2[0][1]*this.pix>window.innerHeight){
        alert("player 1 win");
        this.gameOver();
      }
    },
    addFood: function(){
      if(this.alive){
        var foodx=parseInt(Math.random()*size*2);
        var foody=parseInt(Math.random()*size);
        this.food.push([foodx, foody]);
      }
    },
    gameOver: function(){
      this.alive=0;
      //alert("game over! score:"+this.score);
      clearInterval(game);
      clearInterval(foodspawn);
      location.reload();
    }
  }
});

var game=window.setInterval(function(){
main.changeDirection();
  main.move();
  main.move2();
}, 80);
var foodspawn=window.setInterval(function(){
  main.addFood();
}, 2000);
