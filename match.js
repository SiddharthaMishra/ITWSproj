var memory_array = ['A','A','B','B','C','C','D','D','E','E','F','F','G','G','H','H','I','I','J','J','K','K','L','L'];
var memory_values = [];// variable to store values of flipped tiles
var memory_tile_ids = [];// variable to store tile ids
var tiles_flipped = 0;// counter to count no of tiles flipped
var score=0;
Array.prototype.memory_tile_shuffle = function(){
    var i,j, temp;
    for(i = this.length-1;i>0;--i){
        j = Math.floor(Math.random() * (i+1));
        temp = this[j];
        this[j] = this[i];
        this[i] = temp;
    }
};
function newBoard(user){
  score=0;
  document.getElementById("turn").value=0;
  tiles_flipped = 0;
  var output = '';
    memory_array.memory_tile_shuffle();
  for(var i = 0; i < memory_array.length; i++){
    output += '<div id="tile_'+i+'" onclick="FlipTile(this,\''+memory_array[i]+'\',\''+user+'\')"></div>';
  }
  document.getElementById('Main_canvas').innerHTML = output;
}
function FlipTile(tile,val,user){
  score++;
  if(tile.innerHTML == "" && memory_values.length < 2){
    tile.style.background = "#fff";
    tile.innerHTML = val;
    if(memory_values.length == 0){
      memory_values.push(val);
      memory_tile_ids.push(tile.id);
        }
        else if(memory_values.length == 1){
      memory_values.push(val);
      memory_tile_ids.push(tile.id);
      if(memory_values[0] == memory_values[1]){
        tiles_flipped += 2;
        // Clearing both arrays
        memory_values = [];
              memory_tile_ids = [];
        // Check to see if the whole board is cleared
        if(tiles_flipped == memory_array.length){
          var fin_score=(124-(Math.floor(score/2))*2)*10;
          alert("Well Done!!! Your score is: "+fin_score);
          if(user!=undefined){
            console.log(user);
            $.ajax({
              type: "POST",
              url: "scoring.php",
              data:{ user: user, score:fin_score, game:5 }, 
            });
          }
          document.getElementById('Main_canvas').innerHTML = "";
          document.getElementById('but').value="Play again?";
          document.getElementById("turn").value=0;

        }
      }
      else {
        function flipBack(){
            // Flip the 2 tiles back over
            var tile_1 = document.getElementById(memory_tile_ids[0]);
            var tile_2 = document.getElementById(memory_tile_ids[1]);
            tile_1.style.background = 'url(match.jpg) no-repeat';
                  tile_1.innerHTML = "";
            tile_2.style.background = 'url(match.jpg) no-repeat';
                  tile_2.innerHTML = "";
            // Clear both arrays
            memory_values = [];
                  memory_tile_ids = [];
        }
        setTimeout(flipBack, 700);
      }
    }
  }
  document.getElementById("turn").value=Math.floor(score/2);
}
