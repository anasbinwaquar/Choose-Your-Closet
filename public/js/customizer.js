
var design_count=0;
var total_price=1000;
// var print_price=500;
var element = $('#tshirt-div');
var element2 = $('#tshirt-div-back');
let imagefront,imageback;
let canvas = new fabric.Canvas('tshirt-canvas');
let canvas2 = new fabric.Canvas('tshirt-canvas-back');

canvas.on('mouse:down', function(e) {
 
      if(e.objCanvas)
      {
      
        if(e.objCanvas.type === 'image')
        {
            e.objCanvas.trigger('mousedown', {
                   clientX: e.objCanvasX,
                   clientY: e.objCanvasY 
            });
        }
      }
      
      else {
                console.log('image was clicked');

      }},false);
            function updateTshirtImage(imageURL){
                fabric.Image.fromURL(imageURL, function(img) {                   
                    img.scaleToHeight(150);
                    img.scaleToWidth(150); 
                    canvas.centerObject(img);
                    canvas.add(img);
                    canvas.renderAll();
                });
            }
            function updateTshirtImage2(imageURL){
                fabric.Image.fromURL(imageURL, function(img) {                   
                    img.scaleToHeight(150);
                    img.scaleToWidth(150); 
                    canvas2.centerObject(img);
                    canvas2.add(img);
                    canvas2.renderAll();
                });
            }
            

            // Update the TShirt color according to the selected color by the user
            document.getElementById("tshirt-color").addEventListener("change", function(){
                document.getElementById("tshirt-div").style.backgroundColor = this.value;
                document.getElementById("tshirt-div-back").style.backgroundColor = this.value;
                htmltocanvas();
                document.getElementById("tshirt-back").value = imageback;
                document.getElementById("tshirt-front").value = imagefront;
                console.log(imageback);
            }, false);


            // Update the TShirt color according to the selected color by the user
            document.getElementById("tshirt-design").addEventListener("change", function(){

                // Call the updateTshirtImage method providing as first argument the URL
                // of the image provided by the select
                updateTshirtImage(this.value);
                design_count=design_count+1;
                total_price+=Number(document.getElementById('design_front_price').value);
                console.log("Design Count: "+ design_count + " Price: " + total_price+ "Design Price: "+ Number(document.getElementById('design_front_price').value));

                document.getElementById('price').innerHTML = total_price;
                document.getElementById('design_count').innerHTML = design_count;
                htmltocanvas();
            }, false);
            document.getElementById("tshirt-design-back").addEventListener("change", function(){

                // Call the updateTshirtImage method providing as first argument the URL
                // of the image provided by the select
                updateTshirtImage2(this.value);
                design_count=design_count+1;
                total_price+=Number(document.getElementById('design_back_price').value);
                console.log("Design Count: "+ design_count + " Price: " + total_price+ "Design Price: "+ Number(document.getElementById('design_front_price').value));
                document.getElementById('price').innerHTML = total_price;
                document.getElementById('design_count').innerHTML = design_count;

            }, false);
                //Delete selected prints
            $("#Delete").click(function(){
                deleteObjects();
            });

            function deleteObjects(){
                var activeObject = canvas.getActiveObject();
                var activeObject2 = canvas2.getActiveObject();
                if (activeObject) {
                        canvas.remove(activeObject);
                        design_count=design_count-1;
                        total_price-=print_price;
                        console.log("Design Count: "+ design_count + " Price: " + total_price);
                }
                else if (activeObject2) {
                        canvas2.remove(activeObject2);
                        design_count=design_count-1;
                        total_price-=print_price;
                        console.log("Design Count: "+ design_count + " Price: " + total_price);
                }
                document.getElementById('price').innerHTML = total_price;
                document.getElementById('design_count').innerHTML = design_count;
            };
           
           // Define as node the T-Shirt Div
function htmltocanvas(){
    html2canvas(element, {
            background: '#ffffff',
            onrendered: function(canvas){
                var imgData = canvas.toDataURL('image/jpeg');
                imagefront=imgData;
            }
        });
        html2canvas(element2, {
            background: '#ffffff',
            onrendered: function(canvas){
                var imgData = canvas.toDataURL('image/jpeg');
                imageback=imgData;
            }
        });

        document.getElementById('total_price').value = total_price; 
    };
$(document).ready(function(){
                    
    $("#Submit").on('click',async function(){
        // e.preventDefault();
            // console.log('g');
            
            // console.log($('meta[name="csrf-token"]').attr('content'));
            

        htmltocanvas();
        document.getElementById("tshirt-back").value = imageback;
        document.getElementById("tshirt-front").value = imagefront;
        // console.log(imagefront);
        // console.log(imageback);
        // $.ajaxSetup({
        //       headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
        // $.ajax({
        //     url: "/customizer",
        //     type: "POST",
        //     data: {
        //         imagefront: imagefront,
        //         imageback: imageback
        //     },
        //     success:function(result){
        //         console.log(result);
        //     }
        // })
    });
});


$(function() {
  $('#tshirt').change(function() {
    var e = $("#tshirt :selected").val();;
    // console.log(e);
    var back=e.replace("_front.png","_back.png");
    document.getElementById("tshirt-foregroundpicture").setAttribute("src", e);
    console.log(back);
    document.getElementById("tshirt-backgroundpicture").setAttribute("src", back);
    // Wont apply border to both for some reason
    // var canvascontainer=document.getElementsByClassName('canvas-container');
    // canvascontainer[0].style.border='1px solid #000000';
    // canvascontainer[1].style.border='1px solid #000000';

    document.getElementById("tshirt-foregroundpicture").setAttribute("class", 'border border-primary rounded');
    document.getElementById("tshirt-backgroundpicture").setAttribute("class", 'border border-primary rounded');
    if (e==''){
        document.getElementById("tshirt-foregroundpicture").removeAttribute("class");
    }
})});
