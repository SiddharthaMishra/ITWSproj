var usr;
function PlayPong(user)
{
  usr=user;
}
/*function restart()
{
  location.reload();
}*/
var i=1;
var score=0;
beforestart();
function beforestart() {
  if(i==1)
  {
    Start();
    //paddle1.x=200;
    //paddle1.y=300;
  }
  else
    window.location="http://localhost/";
}
//while(i==1) {
//}
function Start()
{
var check=1;
var animate = window.requestAnimationFrame ||
  window.webkitRequestAnimationFrame ||
  window.mozRequestAnimationFrame ||
  function(callback) { window.setTimeout(callback, 1000/60) };//calling function 60 times in a second
  //var canvas = document.createElement('canvas');
  var canvas = document.getElementById('can');
var width = 400;
var height = 600;
/*canvas.width = width;
canvas.height = height;*/
var context = canvas.getContext('2d');//grabbing 2d context
var imge=new Image();
imge.src='hrt_slate.jpg';
imge.onload=function() {
context.drawImage(imge,0,0,400,600);
}
function dothis()  {
  document.body.appendChild(canvas);//attaching a canvas to thw wepage
  animate(step);//calling function step
}
window.onload = function() {
  dothis();
};
var step = function() {
  update();//update all the player objects-player's paddle,computer paddle,ball
  render();//render the objects
  animate(step);
};
var update = function() {
};

var render = function() {
  context.drawImage(imge,0,0,400,600);
  //context.fillStyle = "#FF00FF";//background-colour to pink
  //context.fillRect(0, 0, width, height);//filling colour in these co-ordinates
};
//Adding Paddles and a ball
function Paddle(x, y, width, height) {
  this.x = x;
  this.y = y;
  this.width = width;
  this.height = height;
  this.x_speed = 0;
  this.y_speed = 0;
}//providing the co-ordinates and the speed for the paddle

Paddle.prototype.render = function() {
  //context.fillStyle = "#ffcc00";
  context.fillStyle = "#FFFFFF";
  context.fillRect(this.x, this.y, this.width, this.height);
};//creating a paddle
//player paddle
function Player() {
   this.paddle = new Paddle(175, 580, 50, 10);
}
//computer paddle
function Computer() {
  this.paddle = new Paddle(175, 10, 50, 10);
}
Player.prototype.render = function() {
  this.paddle.render();
};

Computer.prototype.render = function() {
  this.paddle.render();
};
//createing a ball
function Ball(x, y) {
  this.x = x;
  this.y = y;
  this.x_speed = 0;
  this.y_speed = 3;
  this.radius = 5;
}
Ball.prototype.render = function() {
  context.beginPath();
  context.arc(this.x, this.y, this.radius, 2 * Math.PI, false);
  context.fillStyle = "#000000";
  context.fill();
};
//building objects and update render function
var player = new Player();
var computer = new Computer();
var ball = new Ball(200, 300);

var render = function() {
  //context.fillStyle = "#FF00FF";
  //context.fillRect(0, 0, width, height);
  context.drawImage(imge,0,0,400,600);
  player.render();
  computer.render();
  ball.render();
};
//adding movement now
var update = function() {
  ball.update();//update function so it heads towards the player's paddle
};

Ball.prototype.update = function() {
  this.x += this.x_speed;
  this.y += this.y_speed;
};
//reflecting the ball back from the paddles
var update = function() {
  ball.update(player.paddle, computer.paddle);
};

Ball.prototype.update = function(paddle1, paddle2) {
  this.x += this.x_speed;
  this.y += this.y_speed;
  var top_x = this.x - 5;
  var top_y = this.y - 5;
  var bottom_x = this.x + 5;
  var bottom_y = this.y + 5;

  if(this.x - 5 < 0) { // hitting the left wall
    this.x = 5;
    this.x_speed = -this.x_speed;
  } else if(this.x + 5 > 400) { // hitting the right wall
    this.x = 395;
    this.x_speed = -this.x_speed;
  }

  if(this.y < 0 || this.y > 600) { // a point was scored
    score++;
    this.x_speed = 0;
    this.y_speed = 3;
    if(this.y>600)
    {
      score--;
      if(usr!=undefined)
      {
      $.ajax({
        type:"POST",
        url:"scoring.php",
        data:{user:usr,score:score,game:3},
      });
    }
    alert("Game Over\nScore:"+score);
    i=0;
    beforestart();
        //window.location="http://localhost/";
      //var r=confirm("Game Over!\nScore:"+score);
      /*score=0;
      if(r==true)
      {
        i=0;
        //continue;
      }
      else
      {
        i=0;
        beforestart();
      }*/
    }
    this.x = 200;
    this.y = 300;
    document.getElementById("score").value=score;
  }

  if(top_y > 300) {
    if(top_y < (paddle1.y + paddle1.height) && bottom_y > paddle1.y && top_x < (paddle1.x + paddle1.width) && bottom_x > paddle1.x) {
      // hit the player's paddle
      this.y_speed = -3;
      this.x_speed += (paddle1.x_speed / 2);
      this.y += this.y_speed;
    }
  } else {
    if(top_y < (paddle2.y + paddle2.height) && bottom_y > paddle2.y && top_x < (paddle2.x + paddle2.width) && bottom_x > paddle2.x) {
      // hit the computer's paddle
      this.y_speed = 3;
      this.x_speed += (paddle2.x_speed / 2);
      this.y += this.y_speed;
    }
  }
};
//to keep track of which key is pressed
var keysDown = {};

window.addEventListener("keydown", function(event) {
  keysDown[event.keyCode] = true;
});

window.addEventListener("keyup", function(event) {
  delete keysDown[event.keyCode];
});
//Updating the position of paddle according to the key pressed
var update = function() {
  player.update();
  ball.update(player.paddle, computer.paddle);
};

Player.prototype.update = function() {
  for(var key in keysDown) {
    var value = Number(key);
    if(value == 37) { // left arrow
      this.paddle.move(-4, 0);
    } else if (value == 39) { // right arrow
      this.paddle.move(4, 0);
    } else {
      this.paddle.move(0, 0);
    }
  }
};

Paddle.prototype.move = function(x, y) {
  this.x += x;
  this.y += y;
  this.x_speed = x;
  this.y_speed = y;
  if(this.x < 0) { // all the way to the left
    this.x = 0;
    this.x_speed = 0;
  } else if (this.x + this.width > 400) { // all the way to the right
    this.x = 400 - this.width;
    this.x_speed = 0;
  }
}
var update = function() {
  player.update();
  computer.update(ball);
  ball.update(player.paddle, computer.paddle);
};
/*creating computer ai for the computer paddle
so player is able to score a point*/
Computer.prototype.update = function(ball) {
  var x_pos = ball.x;
  var diff = -((this.paddle.x + (this.paddle.width / 2)) - x_pos);
  if(diff < 0 && diff < -4) { // max speed left
    diff = -5;
  } else if(diff > 0 && diff > 4) { // max speed right
    diff = 5;
  }
  this.paddle.move(diff, 0);
  if(this.paddle.x < 0) {
    this.paddle.x = 0;
  } else if (this.paddle.x + this.paddle.width > 400) {
    this.paddle.x = 400 - this.paddle.width;
  }
};
}