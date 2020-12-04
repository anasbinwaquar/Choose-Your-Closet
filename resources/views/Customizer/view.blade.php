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
                top: 100px;
                left: 160px;
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
                width: 530px;
                height: 630px;
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
            <img id="tshirt-backgroundpicture" src="{{ asset('t-shirts/mens_longsleeve_front.png') }}"/>

            <div id="drawingArea" class="drawing-area">					
                <div class="canvas-container">
                    <canvas id="tshirt-canvas" width="200" height="400"></canvas>
                </div>
            </div>
        </div>
        
        <!-- The select that will allow the user to pick one of the static designs -->
        <br>

        <!-- The Select that allows the user to change the color of the T-Shirt -->
        <br><br><br><br><br><br>
        <label for="tshirt-color">T-Shirt Color: ( Select Color and press enter )</label>
        <input type="color" id="tshirt-color" value="#e66465">
        <label for="tshirt-design">T-Shirt Design:</label>
		<select id="tshirt-design">
            <option value="">Select one of our designs ...</option>
            <option value="{{asset('templates/2.png')}}">Batman</option>
        </select>
        <button id="BtnSave" onclick="saveimg()">Take screenshot</button>
		    
		</select>
        
	<!-- Include Fabric.js in the page <--></-->
    <script type="text/javascript" src="{{ asset('js/fabric.js-4.2.0/dist/fabric.min.js')}}"></script>
	<!-- Include DomToImage in the page -->
	<script type="text/javascript" src="{{asset('js/html2canvas.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/domtoimage.js')}}"></script>

        <script>
            let canvas = new fabric.Canvas('tshirt-canvas');

            function updateTshirtImage(imageURL){
                fabric.Image.fromURL(imageURL, function(img) {                   
                    img.scaleToHeight(150);
                    img.scaleToWidth(150); 
                    canvas.centerObject(img);
                    canvas.add(img);
                    canvas.renderAll();
                });
            }
            
            // Update the TShirt color according to the selected color by the user
            document.getElementById("tshirt-color").addEventListener("change", function(){
                document.getElementById("tshirt-div").style.backgroundColor = this.value;
            }, false);

            // Update the TShirt color according to the selected color by the user
            document.getElementById("tshirt-design").addEventListener("change", function(){

                // Call the updateTshirtImage method providing as first argument the URL
                // of the image provided by the select
                updateTshirtImage(this.value);
            }, false);

            // When the user clicks on upload a custom picture
            document.getElementById('tshirt-custompicture').addEventListener("change", function(e){
                var reader = new FileReader();
                
                reader.onload = function (event){
                    var imgObj = new Image();
                    imgObj.src = event.target.result;

                    // When the picture loads, create the image in Fabric.js
                    imgObj.onload = function () {
                        var img = new fabric.Image(imgObj);

                        img.scaleToHeight(300);
                        img.scaleToWidth(300); 
                        canvas.centerObject(img);
                        canvas.add(img);
                        canvas.renderAll();
                    };
                };

                // If the user selected a picture, load it
                if(e.target.files[0]){
                    reader.readAsDataURL(e.target.files[0]);
                }
            }, false);

            // When the user selects a picture that has been added and press the DEL key
            // The object will be removed !
           
           // Define as node the T-Shirt Div
			var node = document.getElementById('tshirt-div');

			domtoimage.toPng(node).then(function (dataUrl) {
			    // Print the data URL of the picture in the Console
			    console.log(dataUrl);

			    // You can for example to test, add the image at the end of the document
			    var img = new Image();
			    img.src = dataUrl;
			    document.body.appendChild(img);
			}).catch(function (error) {
			    console.error('oops, something went wrong!', error);
			});
						$(function() { 
			    $("#btnSave").click(function() { 
			        html2canvas($("#widget"), {
			            onrendered: function(canvas) {
			                theCanvas = canvas;
			                document.body.appendChild(canvas);

			                // Convert and download as image 
			                Canvas2Image.saveAsPNG(canvas); 
			                $("#img-out").append(canvas);
			                // Clean up 
			                //document.body.removeChild(canvas);
			            }
			        });
			    });
			}); 

			// SAVE T-SHIRT Image
			function saveimg(){
		 
		    // Convert the div to image (canvas)
		    window.scrollTo(0, 0);
		    html2canvas(document.getElementById("tshirt-div")).then(function (canvas) {
		 
		        // Get the image data as JPEG and 0.9 quality (0.0 - 1.0)
		        console.log(canvas.toDataURL("image/jpeg", 1));
		        var ajax = new XMLHttpRequest();
		        ajax.open("POST", "save-capture.php", true);
		        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		        ajax.send("image=" + canvas.toDataURL("image/jpeg", 1));
			    });
			    ajax.onreadystatechange = function () {
	 
	            // Check when the requested is completed
	            if (this.readyState == 4 && this.status == 200) {
	 
	                // Displaying response from server
	                console.log(this.responseText);
	            }
			}}
			
        </script>
    </body>
</html>