$(document).ready(function(){

        $(".li_n").bind("click",function(event) {
            var id = this.id;
            $('#parent').val(id);
            $('#otvet_kom').show(1000);
            $('#new_kom').hide();

             });
         });