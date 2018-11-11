<!DOCTYPE html>
<html>

  <head>
    <link rel="stylesheet" href="css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <title>web hw</title>
  </head>
  <script>


    $(function() {

      var $body = $(document);
      $body.bind('scroll', function() {
          // "Disable" the horizontal scroll.
          if ($body.scrollLeft() !== 0) {
              $body.scrollLeft(0);
          }
      });

    });
    //is visible
    (function($) {

      /**
       * Copyright 2012, Digital Fusion
       * Licensed under the MIT license.
       * http://teamdf.com/jquery-plugins/license/
       *
       * @author Sam Sehnert
       * @desc A small plugin that checks whether elements are within
       *     the user visible viewport of a web browser.
       *     only accounts for vertical position, not horizontal.
       */

      $.fn.visible = function(partial) {

          var $t            = $(this),
              $w            = $(window),
              viewTop       = $w.scrollTop(),
              viewBottom    = viewTop + $w.height(),
              _top          = $t.offset().top,
              _bottom       = _top + $t.height(),
              compareTop    = partial === true ? _bottom : _top,
              compareBottom = partial === true ? _top : _bottom;

        return ((compareBottom <= viewBottom) && (compareTop >= viewTop));

      };

    })(jQuery);

    //animation on visible
    window.setInterval(function(){
      $(".slideright").each(function(i, el) {
        var el = $(el);
        if (el.visible(true)) {
          el.addClass("come-in-left");
        }
      });
      $(".slideleft").each(function(i, el) {
        var el = $(el);
        if (el.visible(true)) {
          el.addClass("come-in-right");
        }
      });
      $(".slidedown").each(function(i, el) {
        var el = $(el);
        if (el.visible(true)) {
          el.addClass("come-in-top");
        }
      });
      $(".slideup").each(function(i, el) {
        var el = $(el);
        if (el.visible(true)) {
          el.addClass("come-in-bottom");
        }
      });

    }, 50);

    window.onscroll=function(){
      var i=pending.length;
      while(i--){
        var e=pending[i][0];
        var val=pending[i][1];
        var el=$(e);
        if(el.length&&el.visible(true)){
          if(el.hasClass("value")){
            animateValue(e, 0, val, 1000);
          }
          if(el.hasClass("progress")){
            animateProgress(e, 0, val, 500);
          }
          pending.splice(i,1);
        }
      }
    }

    var pending=[];

    //count up number
    function animateValue(el, start, end, duration) {
      var range = end - start;
      var current = start;
      var increment = end > start? 1 : -1;
      var stepTime = Math.abs(Math.floor(duration / range));
      var obj = el;
      var timer = setInterval(function() {
          current += increment;
          obj.innerHTML = current;
          if (current == end) {
              clearInterval(timer);
          }
      }, stepTime);
    }

    //count up number
    function animateProgress(el, start, end, duration) {
      var range = end - start;
      var current = start;
      var increment = end > start? 1 : -1;
      var stepTime = Math.abs(Math.floor(duration / range));
      var obj = el;
      var timer = setInterval(function() {
          current += increment;
          obj.value = current;
          if (current == end) {
              clearInterval(timer);
          }
      }, stepTime);
    }

    $(document).ready(function(){
      document.getElementById("top").style.paddingTop=document.getElementById("header").offsetHeight+"px";
      console.log(document.getElementById("header").offsetHeight);
      $(".value").each(function(i, el) {
        var e=el;
        var el = $(el);
        var val=el.attr("value");
        if (el.visible(true)) {
          animateValue(e, 0, val, 500);
        }else{
          pending.push([e, val]);
        }
      });
      $(".progress").each(function(i, el) {
        var e=el;
        var el = $(el);
        var val=el.attr("value");
        if (el.visible(true)) {
          console.log(val);
          animateProgress(e, 0, val, 500);
        }else{
          pending.push([e,val]);
        }
      });
    });

  </script>


  <body>
    <div id="header">
      <div id="navbar">
        <h1 id="logo"><div style="color:white; width:50%; float:left; text-align:right">LO</div><div style="color:#17a2b8; width:50%; float:left; text-align:left">GO</div></h1>
        <table id="nav">
          <tr>
            <td>HOME</td>
            <td>ABOUT ME</td>
            <td>SERVICES</td>
            <td>MY BOOKS</td>
            <td>BLOG</td>
            <td>PORTFOLIO</td>
            <td>PAGES</td>
            <td>CONTACTS</td>
          </tr>
        </table>
      </div>
    </div>

    <div id="top">
    </div>

    <section style="width:50%; height:80vh">
      <h1 style="padding-left:25%; padding-top:20%">
        <div class="slidedown">
          <progress class="progress" value="100" max="100" style="width:15%;"></progress><br>
          Writing Texts and Stories<br>
          <strong>on Your Request</strong>
        </div>
      </h1>
      <div class="slideup">
        <p style="padding-left:25%; padding-right: 25%">
          My name is Daniel Booker and as a highly professional copywriter, I can provide you with texts of any complexity and topic for the success of your business.
        </p>
        <button type="button" style="margin-left:25%; color:white">READ MORE</button>
      </div>
    </section>

    <section style="width:50%;height: 80vh; background: #eee; text-align: center">
      <img src="img/large-features-4-960x790.jpg" style="width:100%"/>
    </section>

    <section style="width:100%;height: 40vh;padding-left:25%; background: #f7f7f7">
      <div style="width:15%; float:left; padding-top:5%">
        <h1>Writing</h1>
        <p class="slideup">I provide high-quality writing services for various purposes including writing books, essays, and articles for magazines.</p>
      </div>
      <div style="width:20%; float:left; padding-top:5%">
        <h1>Copy Writing</h1>
        <p class="slideup">From blog posts and email newsletters to white papers and eBooks, my copywriting services cover everything you may need.</p>
      </div>
      <div style="width:20%; float:left; padding-top:5%">
        <h1>Publishing</h1>
        <p class="slideup">If you need to prepare your written material for publishing, I will be glad to assist you with reliable editorial and production services.</p>
      </div>
    </section>

    <section style="width:100%;height: 60vh; background: white">
      <div class="slidedown">
        <h1 style="text-align:center;">Advantages and Achievements</h1>
      </div>
      <div class="slideup">
        <p style="text-align:center;">Since the first day of providing great copywriting & publishing solutions to my clients, I have achieved a lot. Here are some notable facts and numbers.</p>
      </div>
      <div style="padding-top: 5%; padding-left:10%;">
        <div  style="float:left;width:10%; padding-left:10%">
          <div class="value" value="12">0</div>
          <p style="text-align:center;color:black;">Years of Experience</p>
        </div>
        <div  style="float:left;width:10%; padding-left:10%">
          <div class="value" value="238">0</div>
          <p style="text-align:center;color:black;">Books and Stories</p>
        </div>
        <div  style="float:left;width:10%; padding-left:10%">
          <div class="value" value="15">0</div>
          <p style="text-align:center;color:black;">International Awards</p>
        </div>
        <div  style="float:left;width:10%; padding-left:10%">
          <div class="value" value="54">0</div>
          <p style="text-align:center;color:black;">Happy Clients</p>
        </div>
      </div>
    </section>

    <section style="width:50%;height: 80vh; background: white; text-align: center">
      <div class="slidedown" style="padding-left: 35%; padding-top:3%">
        <h1 style="font-weight: 100; font-size:250%">A Few Words About Me</h1>
      </div>
      <div class="slideup" style="padding-left: 35%">
        <p style="text-align: left; width: 70%">I was born in Boston, MA in 1985 to a family of an English teacher and car mechanic. Since my childhood, I have been obsessed with reading books. No wonder that at the age of 10, I achieved some success in writing texts and stories.</p>
      </div>

      <div style="padding-left:35%; float:left; width:50%">
        <div class="slidedown">
          <p style="float:left">Writing</p>
          <p style="float:right">90%</p>
        </div>
        <progress class="progress" value="90" max="100" style="float: left; width:100%"></progress><br>
      </div>
      <div style="padding-left:35%; float:left; width:50%">
        <div class="slidedown">
          <p style="float:left">Cpoywriting</p>
          <p style="float:right">65%</p>
        </div>
        <progress class="progress" value="65" max="100" style="float: left; width:100%"></progress><br>
      </div>
      <div style="padding-left:35%; float:left; width:50%">
        <div class="slidedown">
          <p style="float:left">Publishing</p>
          <p style="float:right">100%</p>
        </div>
        <progress class="progress" value="100" max="100" style="float: left; width:100%"></progress><br>
      </div>
      <div style="padding-left:35%; float:left; width:50%">
        <div class="slidedown">
          <p style="float:left">Blog Content</p>
          <p style="float:right">75%</p>
        </div>
        <progress class="progress" value="75" max="100" style="float: left; width:100%"></progress><br>
      </div>
      <div class="slideup" style="padding-left: 35%">
        <button type="button" style="float:left; color:white; width:20%; margin-top:5%">LEARN MORE</button>
      </div>
    </section>

    <section style="width:50%;height: 80vh; background: #eee; text-align: center">
      <img src="img/large-features-4-960x790.jpg" style="width:100%"/>
    </section>

    <section style="background: #343a40; width: 100%; padding: 0px 1%;">
      <h1 style="margin-left:10%" id="logo"><div style="color:white; width:50%; float:left; text-align:right">LO</div><div style="color:#17a2b8; width:50%; float:left; text-align:left">GO</div></h1>
      <p style="float:right; margin-right: 10%">&copy;copyright</p>
    </section>

  </body>
</html>
