<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Static Tee Designer</title>
        <style>
            .drawing-area{
                position: absolute;
                top: 60px;
                left: 122px;
                z-index: 10;
                width: 200px;
                height: 400px;
            }

            .canvas-container{
                width: 200px; 
                height: 400px; 
                position: relative; 
                user-select: none;
            }

            #tshirt-div{
                width: 452px;
                height: 548px;
                position: relative;
                background-color: #fff;
            }

            #canvas{
                position: absolute;
                width: 200px;
                height: 400px; 
                left: 0px; 
                top: 0px; 
                user-select: none; 
                cursor: default;
            }
        </style>
    </head>
    <body>
        <!-- Create the container of the tool -->
        <div id="tshirt-div">
            <!-- 
                Initially, the image will have the background tshirt that has transparency
                So we can simply update the color with CSS or JavaScript dinamically
            -->
            <img id="tshirt-backgroundpicture" src="{{ asset('t-shirts/background_tshirt.png') }}"/>

            <div id="drawingArea" class="drawing-area">					
                <div class="canvas-container">
                    <canvas id="tshirt-canvas" width="200" height="400"></canvas>
                </div>
            </div>
        </div>
        
        <!-- The select that will allow the user to pick one of the static designs -->
        <br>

        <!-- The Select that allows the user to change the color of the T-Shirt -->
        <br><br>
        <label for="tshirt-color">T-Shirt Color:</label>
        <select id="tshirt-color">
            <!-- You can add any color with a new option and definings its hex code -->
            <option value="#fff">White</option>
            <option value="#000">Black</option>
            <option value="#f00">Red</option>
            <option value="#008000">Green</option>
            <option value="#ff0">Yellow</option>
        </select>
        
        <!-- Include Fabric.js in the page -->

    <script type="text/javascript" src="{{ asset('js/fabric.js-4.2.0/dist/fabric.min.js')}}"></script>


        <script>
            let canvas = new fabric.Canvas('tshirt-canvas');

            function updateTshirtImage(imageURL){
                // If the user doesn't pick an option of the select, clear the canvas
                if(!imageURL){
                    canvas.clear();
                }

                // Create a new image that can be used in Fabric with the URL
                fabric.Image.fromURL(imageURL, function(img) {
                    // Define the image as background image of the Canvas
                    canvas.setBackgroundImage(img, canvas.renderAll.bind(canvas), {
                        // Scale the image to the canvas size
                        scaleX: canvas.width / img.width,
                        scaleY: canvas.height / img.height
                    });
                });
            }
            
            // Update the TShirt color according to the selected color by the user
            document.getElementById("tshirt-color").addEventListener("change", function(){
                document.getElementById("tshirt-div").style.backgroundColor = this.value;
            }, false);

            // Update the TShirt color according to the selected color by the user
            
        </script>
    </body>
</html>