document.body.addEventListener('keydown', function (e) {
  var keys = {
    37: 'left',
    39: 'right',
    40: 'down',
    38: 'rotate',
    32: 'space'
  };
  canvas.addEventListener('keydown', function (e) {
    move = false;
    x = false;
    y = false;
    var keycode;
    if (window.event) keycode = window.event.keyCode;
    else if (e) keycode = e.which;
    switch (keycode) {
      case 37:
        move = true;
        x = 'negative';
        break;
      case 38:
        move = true;
        y = 'negative';
        break;
      case 39:
        move = true;
        x = 'positive';
        break;
      case 40:
        move = true;
        y = 'positive';
        break;
    }
    e.preventDefault();
    return false;
  });
  if (typeof keys[e.keyCode] != 'undefined') {
    keyPress(keys[e.keyCode]);
    render();
  }
  if (e.keycode === 37 || e.keycode === 39 || e.keycode === 40 || e.keycode === 38 || e.keycode === 32)
    e.preventDefault();
});