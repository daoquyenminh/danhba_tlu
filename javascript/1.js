$(document).ready(function(){
    $('#file-upload').change(function(e){
        $('#avatar').attr('src','./images/'+e.target.files[0].name);
    })
})