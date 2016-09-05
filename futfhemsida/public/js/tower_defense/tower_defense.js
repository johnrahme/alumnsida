var canvas;
var ctx;
var dx = 5;
var dy = 5;
var x = 150;
var y = 100;
var WIDTH = 600;
var HEIGHT = 600;

function circle(x,y,r) {
    ctx.beginPath();
    ctx.arc(x, y, r, 0, Math.PI*2, true);
    ctx.fill();
}

function rect(x,y,w,h) {
    ctx.beginPath();
    ctx.rect(x,y,w,h);
    ctx.closePath();
    ctx.fill();
    ctx.stroke();
}

function clear() {
    ctx.clearRect(0, 0, WIDTH, HEIGHT);
}

function init() {
    canvas = document.getElementById("movable_circle");
    ctx = canvas.getContext("2d");
    return setInterval(draw, 10);
}

function doKeyDown(evt){
    switch (evt.keyCode) {
        case 87:  /* Up arrow was pressed */
            if (y - dy > 0){
                y -= dy;
            }
            break;
        case 83:  /* Down arrow was pressed */
            if (y + dy < HEIGHT){
                y += dy;
            }
            break;
        case 65:  /* Left arrow was pressed */
            if (x - dx > 0){
                x -= dx;
            }
            break;
        case 68:  /* Right arrow was pressed */
            if (x + dx < WIDTH){
                x += dx;
            }
            break;
    }
}

function draw() {
    clear();
    ctx.fillStyle = "white";
    ctx.strokeStyle = "black";
    rect(0,0,WIDTH,HEIGHT);
    ctx.fillStyle = "purple";
    circle(x, y, 10);
}

init();
window.addEventListener('keydown',doKeyDown,true);