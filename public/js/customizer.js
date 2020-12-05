$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
});
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
            document.addEventListener("keydown", function(e) {
                var keyCode = e.keyCode;

                if(keyCode == 46){
                    console.log("Removing selected element on Fabric.js on DELETE key !");
                    canvas.remove(canvas.getActiveObject());
                }
            }, false);

            // When the user clicks on upload a custom picture
            // document.getElementById('tshirt-custompicture').addEventListener("change", function(e){
            //     var reader = new FileReader();
                
            //     reader.onload = function (event){
            //         var imgObj = new Image();
            //         imgObj.src = event.target.result;

            //         // When the picture loads, create the image in Fabric.js
            //         imgObj.onload = function () {
            //             var img = new fabric.Image(imgObj);

            //             img.scaleToHeight(300);
            //             img.scaleToWidth(300); 
            //             canvas.centerObject(img);
            //             canvas.add(img);
            //             canvas.renderAll();
            //         };
            //     };

            //     // If the user selected a picture, load it
            //     if(e.target.files[0]){
            //         reader.readAsDataURL(e.target.files[0]);
            //     }
            // }, false);

            // When the user selects a picture that has been added and press the DEL key
            // The object will be removed !
           
           // Define as node the T-Shirt Div
           $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('#tshirt-div')
                }
            });

            $(document).ready(function(){
                // $.ajaxSetup({
                //   headers: {
                //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('#tshirt-div')
                //     }
                // });
    
    var element = $('#tshirt-div');
    
    $('#BtnSave').submit( function(){
        html2canvas(element, {
            background: '#ffffff',
            onrendered: function(canvas){
                var imgData = canvas.toDataURL('image/jpeg');
                // $.post('customize',{image:imgData},function(data){
                //     console.log(data)
                // });
                
                $.ajax({
                    url: '/customize',
                    type: 'POST',
                    dataType: 'text',
                    data: {
                        image: imgData
                    }
                });
                // alert('Success!');
                console.log(imgData);
            }
        });
    });
    
});