
var site_url = "{{ url('/') }}";   
   var page = 1;
   
   load_more(page);

  

   function load_page(){debugger;
     /* if($(window).scrollTop() + $(window).height() >= $(document).height()) {*/
      page++;
      load_more(page);
     // }
    }
    function load_more(page){
        $.ajax({
          url: '/mentee/mentor?page=' + page,
          type: "get",
          datatype: "html",
          beforeSend: function()
          {
            $('.ajax-loading').show();
          }
        })
        .done(function(data)
        {          
          if(data.length == 0){
          $('.ajax-loading').html("No more records!");
          return;
        }
          $('.ajax-loading').hide();
          $("#results").append(data);
           result = $("#mentor-result").val();
          result_value = result+' Mentors found';
         $("#mentor-result-heading").text(result_value);
          /*$("#result-heading").append("<h4>"+result_value+" Mentors found</h4>");*/
        })
        .fail(function(jqXHR, ajaxOptions, thrownError)
        {
          alert('No response from server');
        });
    }

   

    
