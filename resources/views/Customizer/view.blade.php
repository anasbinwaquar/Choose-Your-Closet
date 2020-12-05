<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
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
        <form >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
            @foreach ($images as $image)
            <option value="{{ asset('templates/' . $image->getFilename()) }}">  {{$image->getFilename()}}  </option>
            @endforeach
        </select>

        <button id="BtnSave" type="Submit" >Take screenshot</button>
        </form>
        
		    
        
	<!-- Include Fabric.js in the page <--></-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/fabric.js-4.2.0/dist/fabric.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js" integrity="sha512-s/XK4vYVXTGeUSv4bRPOuxSDmDlTedEpMEcAQk0t/FMd9V6ft8iXdwSBxV0eD60c6w/tjotSlKu9J2AAW1ckTA==" crossorigin="anonymous"></script>
	<!-- Include DomToImage in the page -->
	<script type="text/javascript" src="{{asset('js/domtoimage.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/customizer.js')}}"></script>

        
    </body>
</html>