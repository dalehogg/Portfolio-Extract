var canvas = document.querySelector('canvas'); // Selecting the element <canvas>

canvas.width = window.innerWidth;   // Grabbing the windows inner-width
canvas.height = window.innerHeight; // Grabbing the windows inner-height

var c = canvas.getContext('2d');    // Put C to represent context. Context is used a lot
                                    // Pretty much parsing a ton of methods and functions in which we can you to actually draw within the canvas
                                    // Needed to draw anything 2d.
// Rotating Object on its axis
var cx = canvas.width/2;
var cy = canvas.height/2;

var x = -10;
var y = -10;
var width = 50;
var height = 50;
var deg = 45;

c.font = "28px Tahoma";
c.fillStyle = 'yellow';
c.textAlign = "center";
c.fillText("Click me to start", canvas.width / 2, canvas.height / 2.75);

// Animating

var dragLines = document.querySelector('.dragLines');

var noDragLines = document.querySelector('.noDragLines');

var balls = document.querySelector('.balls');

var noBalls = document.querySelector('.noBalls');


var circleArray = [];                                    // The amount of contents in this will be equal to the amount of circles stated below
var amount = 200;                                         // Amount of circles
var colors = ['#32D86E', '#7341DF', '#2D2AF0', '#0FDEDB', 'white'];

var sunColors = ['#32D86E', '#7341DF', '#1C66F9', '#0FDEDB'];
var mouseClick = {
    x: undefined,
    y: undefined
}
// Circle Behaviour Properties
for (var i = 0; i < amount; i++){
    var circleRadius = Math.random() * 10 + 1;                                   // Random number between 1 and 4
    var x = Math.random() * (innerWidth - circleRadius * 2) + circleRadius;     // Random spawn positions (0 to document width) document width - 20 * 2 = 40 is stating the distance at                                                                             which it should avoid spawning. The - is stating it is                                                                             on the right side, the + is the opposite side.
    var y = Math.random() * (innerHeight - circleRadius * 2) + circleRadius;
    var dx = (Math.random() - 0.5) * 10;                // Main velocity (horizontal) // Greatest value you can get from Math.random is 1. If subtracted by 0.5, it will be a max of 0.5. If result is 0 it will take                                                       it off by 0.5
    var dy = (Math.random() - 0.5) * 10;
    circleArray.push(new Circle(x, y, dx, dy, circleRadius, amount));       // Stating that we're ready to use the object and pushing it into an array
}

// Animate (initiate)
function animate () {                              // Using the animate function to call the function requestAnimationFrame which creates a loop by calling the parent function
    requestAnimationFrame(animate);                // The animation works by refreshing the page and each time its refreshed the item will increment by 1. It's giving the illusion of animation
        c.clearRect(0, 0, innerWidth, innerHeight);
    // c.clearRect(0, 0, innerWidth, innerHeight);    // The browser isnt actually refreshing. Delete this to have drag effect (windows 95)

    for (i = 0; i < circleArray.length; i++)  {    // Using the circleArray data from the object "Circle"
        circleArray[i].update();                   // Looping through circleArray to get the data of how many circles there are while each time running the .update function below
    }
}

console.log(circleArray.length);

function Circle (x, y, dx, dy, circleRadius, amount) {            // Object
    // Stating the object properties
    this.x = x;                     // this.x refers to it being a global part of the object
    this.y = y;
    this.dx = dx;
    this.dy = dy;
    this.circleRadius = circleRadius;
    this.amount = amount;
    this.colors = colors[Math.floor(Math.random() * colors.length)];
    this.sunColors = sunColors[Math.floor(Math.random() * sunColors.length)];

    // Circle Repeater (on wall collision)
    function myFunction () {
        // c.beginPath();
        // c.arc(this.x, this.y, this.circleRadius, 0, Math.PI * 2, false);       // Creating another circle
        // c.stroke();                                                            // Initiate the draw
        // c.fill();
        console.log(this.amount++ -10 + 12); // Making each circle have their individual number counter
        this.amount++ * 2;
    }
    // Circle Details
    this.draw = function () {       // Making a method
        c.fillStyle =  this.colors;
        // colors[Math.floor(Math.random() * colors.length)]; //red // USE THIS AND REMOVE THE OBJECT PROPERTY "this.colors" for flashing effect
        c.beginPath();

        // c.shadowBlur = 1000;             // The shadows cause lag, only use on good computers
        // c.shadowOffsetX = 50;
        // c.shadowOffsetY = 15;
        // c.arc(this.x, this.y, this.circleRadius, 0, Math.PI * 2, false);       // Creating another circle
        // c.shadowColor = 'white';
        // c.shadowColor = 'none';
        // Initiate the draw
        c.fill();
        c.lineTo(innerWidth / 2, innerHeight / 2);                                          // Circle lines center position
        c.lineTo(innerWidth, innerHeight / 2);                                              // Horizon line (right)
        c.lineTo(-innerWidth, innerHeight / 2);                                             // Horizon line (left)
        c.arc(innerWidth / 2, innerHeight / 2, this.circleRadius * 20, 0, Math.PI * 2, false);  // sun
        c.strokeStyle = this.sunColors;
        c.stroke();
                                                                      // Initiate the color fill
    }
    // Collision Detection
    this.update = function () {
    if (this.x + this.circleRadius > innerWidth || this.x - this.circleRadius < 0){     // If x is greater than the document width, turn it around and decrement dx by 1
        myFunction();
        this.dx = -this.dx;
                                                                    // Need the velocity to have the ability to be negative and positive so it can go back and forward
    }
    if (this.y + this.circleRadius > innerHeight || this.y - this.circleRadius < 0){    // If y is greater than the document height, turn it around and decrement dx by 1
        myFunction();
        this.dy = -this.dy;
    }
                                                                                        // These two together with the method.random method on each give the animation the ability to move in random directions (diagonal too)
    this.x += this.dx;                                            // Increasing the variable x by 1 each time the loop happens. This acts as the VELOCITY.
    this.y += this.dy;

    // Interactivity (circle size increaser)
    if (mouseClick.x - this.x < 50 && mouseClick.x - this.x > -50 && mouseClick.y - this.y < 50 && mouseClick.y - this.y > -50) {
    // Everything to the right AND left AND top AND bottom within                                                                       50px grow, not only one side and not spread out
    // From mouseClick's coordinate, subtract by circles coordinate and if this is less than the documents width and height, increase the circleRadius by 2;
        this.circleRadius += 3;
    } // Backwards if statement: if circleRadius decreases by 10, stop at 2
    else if (this.circleRadius > 30){ // Size to shrink back to                           /
        this.circleRadius -= 2; // Speed at which it decreases in size
        console.log("Growing...");
    }

    this.draw();                                                  // Run draw function
    }
}
// canvas.addEventListener('click', function(){

// })
canvas.addEventListener('mousemove', function(event){
   mouseClick.x = event.x;      // Setting the properties within the object mouseClick to the coordinates of event
   mouseClick.y = event.y;
   console.log(event);
                                // The point of this is to set a object with dynamically changing x and y values
})
console.log(mouseClick.x);

var readyBox = document.querySelector('.readyBox');

    function setup() {
        mySound = loadSound('assets/Whereisthelove.mp3', loaded);
        amp = new p5.Amplitude();
    }

    function loaded(){
        readyBox.innerHTML = "Song Loaded";
        readyBox.style.backgroundColor = 'Green'

        window.addEventListener('click', function(){
            togglePlaying();
            animate();
        });
        console.log(amp.getLevel());
    }

    function draw(){
        var vol  = amp.getLevel();

        var diameter = map(vol, 0, 0.3, 20, 100);
        ellipse(width / 2, width / 2, diameter, diameter);


        var canva = document.querySelector('.p5Canvas'); // Selecting the element <canvas>

        canva.width = window.innerWidth;   // Grabbing the windows inner-width
        canva.height = window.innerHeight; // Grabbing the windows inner-height

        var ctx = canva.getContext('2d');

        var innerCircle = document.querySelector('.innerCircle');
        var middleCircle = document.querySelector('.middleCircle');
        var outterCircle = document.querySelector('.outterCircle');


        var inner = innerCircle.value;
        var mid = middleCircle.value;
        var out = outterCircle.value;

        ctx.beginPath();
        ctx.arc(canva.width / 2, canva.height / 2, diameter * inner, 0, 2 * Math.PI, true);
        ctx.arc(canva.width / 2, canva.height / 2, diameter * mid, 0, 2 * Math.PI, false);

        ctx.arc(canva.width / 2, canva.height / 2, diameter * out, 0, 2 * Math.PI, false);
        ctx.fillStyle = 'transparent';
        ctx.fill();
        ctx.lineWidth = 4;
        ctx.strokeStyle = 'yellow';
        ctx.stroke();
    }

    function togglePlaying(){
        if (!mySound.isPlaying()){
            mySound.play();
            mySound.setVolume(1.0);
        } else {
            mySound.pause();
        }
    }
