<html>
    <head>
        <style>
            canvas{
                border: 1px solid black;
                width: calc(100% - 4px)!important;
                height: calc(100% - 3px)!important;
            }
            body{
                margin: 0;      /* Removes the margin (so the canvas stretches full size) */
                background: black;
                font-family: Tahoma;
            }
            #defaultCanvas0{
                position: absolute;
                top: 0%;
                left: 0%;
                background-color: transparent;
                overflow: visible;
                pointer-events: none;
            }
            .readyBox{
                position: absolute;
                padding: 10px;
                background-color: red;
                top: 0;
                width: 100px;
                text-align: center;
                box-shadow: inset 2px 2px 2px black
            }
            .effects{
                position: absolute;
                bottom: 0;
                background-color: white;
                width: 100%;
                padding: 15px 0px 15px 0px;
            }
            .effect1:active, .effect2:active, .effect3:active, .effect4:active{

            }
            .effect1, .effect2, .effect3, .effect4{
                width: 100px;
            }
            .inner, .mid, .outter{
                display: inline-block;
                padding-left: 10px;
            }
            .diameterControl label{
                display: block;
            }
        </style>
    </head>
    <body>
        <canvas></canvas>
        <div class="readyBox">Loading Song</div>
        <div class="effects">
            <button class="effect1 dragLines">Effect 1</button>
            <button class="effect2 noDragLines">Effect 2</button>
            <button class="effect3 balls">Effect 3</button>
            <button class="effect4 noBalls">Effect 4</button>
            <div class="inner diameterControl">
                <label>Inner Circle Diameter</label>
                <input class="innerCircle" type="text" name="innerCircle" placeholder="Inner Circle" value="2">
            </div>
            <div class="mid diameterControl">
                <label>Middle Circle Diameter</label>
                <input class="middleCircle" type="text" name="middleCircle" placeholder="Middle Circle" value="4">
            </div>
            <div class="outter diameterControl">
                <label>Outter Circle Diameter</label>
                <input class="outterCircle" type="text" name="outterCircle" placeholder="Outter Circle" value="6">
            </div>
        </div>

        <script type="text/javascript" src="p5/p5.min.js"></script>
        <script type="text/javascript" src="p5/addons/p5.sound.min.js"></script>
        <script type="text/javascript" src="p5/addons/p5.dom.min.js"></script>
        <script src="jsExercise.js" type="text/javascript"></script>
    </body>
</html>