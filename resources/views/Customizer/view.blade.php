<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
        <title>Static Tee Designer</title>
        <style>
            .drawing-area{
                position: absolute;
                top: 120px;
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
                border: 1px solid #000000;
                /*padding: 10px;*/
            }
            #design_front_price{
                visibility: hidden;
            }
            #tshirt-div{
                width: 530px;
                height: 630px;
                position: relative;
                background-color: #fff;
            }
            #tshirt-div-back{
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
              /*padding: 10px;*/
            }
            #Left-Pane{
                float: left;
            }
            #Right-Pane{
                float: right;
            }
        </style>
    </head>
    <body>

        <form class="px-4 py-3 btn-submit" id="CustomizedShirt" method="post" action="/customizer">
             {{csrf_field()}}
        <div id="Left-Pane">
                <h2>Front</h2>
            <!-- Create the container of the tool -->
        <div id="tshirt-div" class="row justify-content-center form-group ">
            <!-- 
                Initially, the image will have the background tshirt that has transparency
                So we can simply update the color with CSS or JavaScript dinamically
            -->
            <img id="tshirt-foregroundpicture"  />
            <div id="drawingArea" class="drawing-area">                 
                <div class="canvas-container">
                    <input type="hidden" id="tshirt-front" name="tshirt_front">
                    <canvas id="tshirt-canvas" width="200" height="400"></canvas>
                </div>
            </div>
        </div>
        
        <!-- The select that will allow the user to pick one of the static designs -->
        <br>

        <!-- The Select that allows the user to change the color of the T-Shirt -->
        <br>
        <label for="tshirt-type">Select Clothing Type:</label>

        <select id="tshirt" name="clothing_type">
            <option value=" ">Select one of the clothing ...</option>
            @foreach ($shirts as $shirt)
            @php
            $back=$shirt->getFilename();
            $temp=$shirt->getFilename();
            $temp=str_replace('_front.png', '', $temp);
            $back=str_replace('_front.png', '_back.png', $back)
            @endphp
            @if(strpos($shirt->getFilename(),'front'))
            <option value="{{ asset('t-shirts/' . $shirt->getFilename()) }}" >  {{$temp}}  </option>
            @endif
            @endforeach
        </select>
        <br>
        <label for="tshirt-color">T-Shirt Color: ( Select Color and press enter )</label>
        <input type="color" name="tshirt_color" id="tshirt-color" value="#e66465">
        <br>
        <label for="tshirt-design">Front T-Shirt Design:</label>
        <select id="tshirt-design">
            <option value="">Select designs for front ...</option>
            @foreach ($images as $image)
            <option value="{{ asset('templates/' . $image->image) }}" data-price='{{$image->price}}' data-name='{{$image->image}}' >{{$image->name}} | Rs:{{$image->price}}</option>
            @endforeach
        </select>
        <br>
        <input type="submit" class="form-control" id="Submit" >
{{-- <button id="Submit" name="Submit" type="submit" class="btn btn-primary" required>SUBMIT</button> --}}
        <button type="button" class="btn btn-primary" id="Delete" >Remove Print</button>
            </div>


        <div id="Right-Pane">
            <h2>Back</h2>

                <div id="tshirt-div-back" class="row justify-content-center form-group ">
                    <img id="tshirt-backgroundpicture" />
                    <div id="drawingArea" class="drawing-area">                 
                        <div class="canvas-container">
                            <input type="hidden" id="tshirt-back" name="tshirt_back">
                            <canvas id="tshirt-canvas-back" width="200" height="400"></canvas>
                        </div>
                    </div>
                </div>
                <br><br>
                <label for="tshirt-design">Back T-Shirt Design:</label>
                <select id="tshirt-design-back">
                    <option value="">Select designs for back ...</option>
                        @foreach ($images as $image)
            <option value="{{ asset('templates/' . $image->image) }}" data-price='{{$image->price}}' >{{$image->name}} | Rs:{{$image->price}}</option>
                        @endforeach
                </select>
                <div>
                    
                <h3>Price: <span id="price"></span></h3>
                <h3>Total Designs used: <span id="design_count"></span></h3>
                </div>
        </div>

        <input type="hidden" id="total_price" name="total_price">
        </form>
        
		    <div id="data"></div>
        
	<!-- Include Fabric.js in the page <--></-->
    <script type="text/javascript" src="{{ asset('js/fabric.js-4.2.0/dist/fabric.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js" integrity="sha512-s/XK4vYVXTGeUSv4bRPOuxSDmDlTedEpMEcAQk0t/FMd9V6ft8iXdwSBxV0eD60c6w/tjotSlKu9J2AAW1ckTA==" crossorigin="anonymous"></script>
	<!-- Include DomToImage in the page -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="{{asset('js/domtoimage.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/customizer.js')}}"></script>

        
    </body>
</html>