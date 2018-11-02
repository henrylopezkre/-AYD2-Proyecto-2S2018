$(document).ready(function(){
   $("#casasoli").submit(function(evento){
      evento.preventDefault();
      console.log($("#hashtag").tagsinput('items') + " ------->");
      console.log($("#hashtag").text() + " ------->");
      console.log($("#hashtag").val('items') + " ------->");

      document.getElementById('fail').style.display = 'none';
      document.getElementById('success').style.display = 'none';
      var formData = new FormData();
      formData.append('_token',$('input[name="_token"]').val());//$('meta[name="csrf-token"]').attr('content'));
      formData.append('file',$('#file')[0].files[0]);
      formData.append('has', $("#hashtag").val());
      formData.append('comment', $("#comment").val());
      //console.log($("#hashtag").val());
      $.ajax({
            url: '/mypublications/insert',  
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,

            beforeSend: function(){
				//$(".loader").fadeIn("slow");        
            },
            success: function(data){   
                

                //document.getElementById('fail').style.display = 'block';
            	if (data[0] == "success") {
                    //document.getElementById('success').style.display = 'block';
                    document.getElementById('success').style.display = 'block';
                    $("#success").append(data[1]);
            		//console.log(data);

            	}        
                else{
                    document.getElementById('fail').style.display = 'block';
                    $("#fail").append(data.fail)
                }
            	//console.log(data);

            },
            //timeout: 100000,
            error: function(jqXHR, textStatus, errorThrown){
		    	//console.log(JSON.stringify(jqXHR));
		        //console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                console.log((jqXHR));

		    }
        });
    });








   $("a[id*='like_']").click(function(evento){
      evento.preventDefault();

      //console.log("Puaauauauau");
      //console.log($(this).attr('id'));
      //console.log($("p[name='235'").text());
      //console.log($("like[name='like_235'").text());

      //console.log('idmultimedia', $("like[name='" + $(this).attr('id') +"'").text());
      var formData = new FormData();
      formData.append('_token',$('input[name="_token"]').val());//$('meta[name="csrf-token"]').attr('content'));
      formData.append('like', 1);
      formData.append('idmultimedia', $("like[name='" + $(this).attr('id') +"'").text());
      //console.log(formData);
      var x = $("like[name='" + $(this).attr('id') +"'").text();//$(this).attr('id');
      $.ajax({
            url: '/rank/update',  
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,

            beforeSend: function(){
                //$(".loader").fadeIn("slow");        
            },
            success: function(data){   
                //console.log('idmultimedia', $("likep[name='" + x +"'").text());
                if (data.success == true) {
                    //$("likep[name='" + x +"'").empty()
                    //console.log($("likep[name='" + x +"'").text());
                    $("likep[name='like_" + x +"'").text(data.like);
                    $("dislikep[name='likes_" + x +"'").text(data.dislike);
                    //$("like[name='" + x +"'").text("&nbsp;" + data.like);
                    //console.log($("likep[name='" + x +"'").text());
                    //console.log("Funciono");
                    //console.log(data);

                }        
                else{
                    console.log("NOFunciono");
                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        });
    });


   
});

$(document).ready(function(){
       $("a[id*='likes_']").click(function(evento){
      evento.preventDefault();

      //console.log("Puaauauauau");
      //console.log($(this).attr('id'));
      //console.log($("p[name='235'").text());
      //console.log($("like[name='like_235'").text());

      //console.log('idmultimedia', $("like[name='" + $(this).attr('id') +"'").text());
      var formData = new FormData();
      formData.append('_token',$('input[name="_token"]').val());//$('meta[name="csrf-token"]').attr('content'));
      formData.append('like', 2);
      formData.append('idmultimedia', $("dislike[name='" + $(this).attr('id') +"'").text());
      //console.log(formData);
      var x = $("dislike[name='" + $(this).attr('id') +"'").text();
      //console.log("------> " + x);
      //console.log("------> " + $("likep[name='like_" + x +"'").text());
      //console.log("------> " + $("dislikep[name='likes_" + x +"'").text());
      $.ajax({
            url: '/rank/update',  
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,

            beforeSend: function(){
                //$(".loader").fadeIn("slow");        
            },
            success: function(data){   
                //console.log('idmultimedia', $("likep[name='" + x +"'").text());
                if (data.success == true) {
                    //$("likep[name='" + x +"'").empty()
                    //console.log($("likep[name='" + x +"'").text());
                    $("likep[name='like_" + x +"'").text(data.like);
                    $("dislikep[name='likes_" + x +"'").text(data.dislike);
                    //$("like[name='" + x +"'").text("&nbsp;" + data.like);
                    //console.log($("likep[name='" + x +"'").text());
                    //console.log("Funciono");
                    //console.log(data);

                }        
                else{
                    console.log("NOFunciono");
                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        });
    });

});