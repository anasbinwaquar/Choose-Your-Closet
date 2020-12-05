
var design_count=0;
var total_price=0;
let canvas = new fabric.Canvas('tshirt-canvas');
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
            

            // Update the TShirt color according to the selected color by the user
            document.getElementById("tshirt-color").addEventListener("change", function(){
                document.getElementById("tshirt-div").style.backgroundColor = this.value;
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
                //Delete selected prints
            $("#Delete").click(function(){
                deleteObjects();
            });
            function deleteObjects(){
                var activeObject = canvas.getActiveObject();
                if (activeObject) {
                    if (confirm('Are you sure?')) {
                        canvas.remove(activeObject);
                        design_count=design_count-1;
                        total_price-=750;
                        console.log("Design Count: "+ design_count + " Price: " + total_price);
                    }
                }
            }
           
           // Define as node the T-Shirt Div

           $.ajaxSetup({
                
            });

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
    document.getElementById("tshirt-backgroundpicture").setAttribute("src", e);
    document.getElementById("tshirt-backgroundpicture").setAttribute("class", 'border border-primary rounded');
    if (e==''){
        document.getElementById("tshirt-backgroundpicture").removeAttribute("class");
    }
})});