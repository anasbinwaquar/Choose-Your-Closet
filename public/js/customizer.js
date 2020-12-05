
var design_count=0;
var total_price=0;
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
            }, false);


            // Update the TShirt color according to the selected color by the user
            document.getElementById("tshirt-design").addEventListener("change", function(){

                // Call the updateTshirtImage method providing as first argument the URL
                // of the image provided by the select
                updateTshirtImage(this.value);
                design_count=design_count+1;
                total_price+=750;
                console.log("Design Count: "+ design_count + " Price: " + total_price);

            }, false);
            document.getElementById("tshirt-design-back").addEventListener("change", function(){

                // Call the updateTshirtImage method providing as first argument the URL
                // of the image provided by the select
                updateTshirtImage2(this.value);
                design_count=design_count+1;
                total_price+=750;
                console.log("Design Count: "+ design_count + " Price: " + total_price);

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
                        total_price-=750;
                        console.log("Design Count: "+ design_count + " Price: " + total_price);
                }
                else if (activeObject2) {
                        canvas2.remove(activeObject2);
                        design_count=design_count-1;
                        total_price-=750;
                        console.log("Design Count: "+ design_count + " Price: " + total_price);
                }
            }
           
           // Define as node the T-Shirt Div


            $(document).ready(function(){
                // $.ajaxSetup({
                //   headers: {
                //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('#tshirt-div')
                //     }
                // });
    
    var element = $('#tshirt-div');
    
    $("#BtnSave").on('click',function(){
            console.log('g');
        html2canvas(element, {
            background: '#ffffff',
            onrendered: function(canvas){

                var imgData = canvas.toDataURL('image/jpeg');
                
                let _token=$("input[name=_token]").val();
                $.ajax({
                    url: "/customizer",
                    type: "POST",
                    data: {
                        image: imgData,
                        _token: _token
                    },
                    success:function(response){
                      if(response.success){
                          alert(response.message) //Message come from controller
                      }
           },
           error:function(error){
              console.log(error)
           }
                })
                
            }
        });
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
    document.getElementById("tshirt-foregroundpicture").setAttribute("class", 'border border-primary rounded');
    document.getElementById("tshirt-backgroundpicture").setAttribute("class", 'border border-primary rounded');
    if (e==''){
        document.getElementById("tshirt-foregroundpicture").removeAttribute("class");
    }
})});
