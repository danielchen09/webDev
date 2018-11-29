var g=[];
var random=false;
var size=30;
for(var i=0; i<size; i++){
  var x=[];
  for(var j=0; j<size; j++){
    x.push(i==0||i==size-1||j==0||j==size-1?0:Math.round(Math.random()));
  }
  g.push(x);
}
//game loop
var game=0;
function startGame(){
  game=1;
  return window.setInterval(function(){
    //check neighbor
    var copyg=[];
    for(var i=0; i<size; i++){
      var x=[];
      for(var j=0; j<size; j++){
        x.push(g[i][j]);
      }
      copyg.push(x);
    }
    for(var i=1; i<size-1; i++){
      for(var j=1; j<size-1; j++){
        var sum=-copyg[i][j];
        for(var k=i-1; k<=i+1; k++){
          for(var l=j-1; l<=j+1; l++){
            sum+=copyg[k][l];
          }
        }
        if(copyg[i][j]==0){
          if(sum==3){
            g[i][j]=1;
          }
        }else{
          if(sum<2||sum>3){
            g[i][j]=0;
          }
        }
      }
    }

    //random
    if(random){
      for(var i=0; i<size/5; i++){
        g[parseInt(Math.random()*(size-2)+1)][parseInt(Math.random()*(size-2)+1)]=Math.round(Math.random());
      }
    }

    for(var i=0; i<size; i++){
      Vue.set(d1.grid, i, g[i]);
    }
    console.log("update");
  }, 100);
}

var d1=new Vue({
  el:"#d1",
  data:{
    grid:g,
    message:"",
    g:"",
    md:false
  },
  created: function(){
    window.addEventListener('keyup', this.toggle);
  },
  methods:{
    p: function(r, c){
      if(this.md){
        g[r][c]=1;
        Vue.set(this.grid, r, g[r]);
      }
    },
    q: function(r, c){
      g[r][c]=1;
      Vue.set(this.grid, r, g[r]);
    },
    toggle: function(e){
      if(e.keyCode==83){
        this.md=!this.md;
        console.log("toggle");
      }else if(e.keyCode==32){
        if(game){
          clearInterval(this.g);
          game=0;
        }else{
          this.g=startGame();
          game=1;
        }
      }else if(e.keyCode==67){
        if(game){
          clearInterval(this.g);
          game=0;
        }
        resetg();
      }else if(e.keyCode==82){
        g=[];
        for(var i=0; i<size; i++){
          var x=[];
          for(var j=0; j<size; j++){
            x.push(i==0||i==size-1||j==0||j==size-1?0:Math.round(Math.random()));
          }
          g.push(x);
          Vue.set(this.grid, i, g[i]);
        }
      }else if(e.keyCode==49){
        console.log("1");
        resetg();
        var mid=size/2;
        g[mid][mid]=1;
        g[mid-1][mid-1]=1;
        g[mid-1][mid]=1;
        g[mid-1][mid+1]=1;
        g[mid-2][mid-1]=1;
        g[mid-2][mid+1]=1;
        g[mid-3][mid]=1;
        for(var i=0; i<size; i++){
          Vue.set(this.grid, i, g[i]);
        }
      }else if(e.keyCode==50){
        resetg();
        var mid=size/2-2;
        for(var i=0; i<5; i++){
          g[mid+i][mid-1]=1;
          g[mid+i][mid+3]=1;
        }
        g[mid][mid+1]=1;
        g[mid+4][mid+1]=1;
      }else if(e.keyCode==51){
        resetg();
        var mid=size/2;
        for(var i=0; i<10; i++){
          g[mid][mid-5+i]=1;
        }
      }else if(e.keyCode==52){
        resetg();
        g[1][2]=1;
        g[2][3]=1;
        g[3][1]=1;
        g[3][2]=1;
        g[3][3]=1;
      }else if(e.keyCode==53){
        resetg();
        for(var i=1; i<size-1; i++){
          for(var j=1+(i%2==0?1:0); j<size-1; j+=2){
            g[i][j]=1;
          }
        }
      }else if(e.keyCode==54){
        resetg();
        for(var j=0; j<size/2; j+=2){
          for(var i=1+j; i<size-1-j; i++){
            g[1+j][i]=1;
            g[i][1+j]=1;
            g[size-2-j][i]=1;
            g[i][size-2-j]=1;
            g[1+j][i+1]=1;
            g[i+1][1+j]=1;
            g[size-2-j][i-1]=1;
            g[i-1][size-2-j]=1;
          }
        }

      }
    }
  }
});

function resetg(){
  g=[];
  for(var i=0; i<size; i++){
    var x=[];
    for(var j=0; j<size; j++){
      x.push(0);
    }
    g.push(x);
    Vue.set(d1.grid, i, g[i]);
  }
}
