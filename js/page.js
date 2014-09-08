 $(document).ready(function(){

        $('#dat').bind("change",function(){
           var date =  $('#dat').val();

                 window.location.href='http://web/page/PageCriteria?data='+date;




        });

    });