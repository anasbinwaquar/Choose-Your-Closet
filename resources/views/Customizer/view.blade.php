<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
            #CustomizedShirt {
              margin: auto;
              width: 60%;
              /*border: 5px solid #FFFF00;*/
              padding: 10px;
            }
        </style>
    </head>
    <body>

        <form class="px-4 py-3 btn-submit" id="CustomizedShirt" action="" method="POST">
             <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
            <h2>Front</h2>
            <!-- Create the container of the tool -->
        <div id="tshirt-div" class="row justify-content-center form-group ">
            <!-- 
                Initially, the image will have the background tshirt that has transparency
                So we can simply update the color with CSS or JavaScript dinamically
            -->
            <img id="tshirt-backgroundpicture"  />

            <div id="drawingArea" class="drawing-area">                 
                <div class="canvas-container">
                    <canvas id="tshirt-canvas" width="200" height="400"></canvas>
                </div>
            </div>
        </div>
        
        <!-- The select that will allow the user to pick one of the static designs -->
        <br>

        <!-- The Select that allows the user to change the color of the T-Shirt -->
        <br>
        <label for="tshirt-type">Select Clothing Type:</label>

        <select id="tshirt">
            <option value="">Select one of the clothing ...</option>
            @foreach ($shirts as $shirt)
            @php
            $temp=$shirt->getFilename();
                $temp=str_replace('_front.png', '', $temp);
            @endphp
            @if(strpos($shirt->getFilename(),'front'))
            <option value="{{ asset('t-shirts/' . $shirt->getFilename()) }}">  {{$temp}}  </option>
            @endif
            @endforeach
        </select>
        <br>
        <label for="tshirt-color">T-Shirt Color: ( Select Color and press enter )</label>
        <input type="color" id="tshirt-color" value="#e66465">
        <br>
        <label for="tshirt-design">T-Shirt Design:</label>
        <select id="tshirt-design">
            <option value="">Select one of our designs ...</option>
            @foreach ($images as $image)
            @php
            $temp1="Design ";
            $temp2=$image->getFilename();
                $temp=str_replace('.jpg', '', $temp2);
            $temp3="";
            $temp3.=$temp1 ."" .$temp
            @endphp
            <option value="{{ asset('templates/' . $image->getFilename()) }}">{{$temp3}}  </option>
            
            @endforeach
        </select>
        <br>
        <button type="button" class="btn btn-primary" id="BtnSave" >Take screenshot</button>

        <button type="button" class="btn btn-primary" id="Delete" >Remove Print</button>
        </form>
        
		    
        
	<!-- Include Fabric.js in the page <--></-->
    <script type="text/javascript" src="{{ asset('js/fabric.js-4.2.0/dist/fabric.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js" integrity="sha512-s/XK4vYVXTGeUSv4bRPOuxSDmDlTedEpMEcAQk0t/FMd9V6ft8iXdwSBxV0eD60c6w/tjotSlKu9J2AAW1ckTA==" crossorigin="anonymous"></script>
	<!-- Include DomToImage in the page -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="{{asset('js/domtoimage.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/customizer.js')}}"></script>

        
    </body>
</html>