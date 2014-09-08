 $(document).ready(function(){


        $('#data').bind("change",function(){

            var date = new Date( $('#data').val());
            var dateNow= new Date();

            if(date.getDay()<dateNow.getDay())
            {
                alert('дата не должна быть меньше текущей');
                $('#data').val(null);
            }
            else
                  if(date.getMonth()<dateNow.getMonth())
                  {
                      alert('дата не должна быть меньше текущей');
                      $('#data').val(null);
                  }
                  else
                       if(date.getYear()<dateNow.getYear())
                       {
                           alert('дата не должна быть меньше текущей');
                           $('#data').val(null);
                       }



        });
			$('.ImgDef').bind("click",function(){
                       $('#InputField').click();
						$('#InputField').show();

        });
       

    });