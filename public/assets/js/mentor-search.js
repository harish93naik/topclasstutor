 
 var page = 1;
   
 load_mentor(page);

 


   function load_mentor_page(){
    page++;
    load_mentor(page);
   }
 function load_mentor(page){debugger;
      var url=new URL(window.location.href);
      
                  var query_string=url.search;
          //console.log(query_string);
          var search_params=new URLSearchParams(query_string);
          //console.log(search_params);
          element=search_params.get("category");
           category_element = search_params.get("categories");
           segment = search_params.get("segment");
        
          if(element)
          {
            curr_url = url+'&page='+page;
          }
          else if(segment){
            curr_url = url+'&page='+page;
          }
          else if(category_element){
            curr_url = url+'&page='+page;
          }
          else{
            curr_url = url+'?page='+page;
          }
          
     
        $.ajax({
          url: curr_url,
          type: "get",
          datatype: "html",
          beforeSend: function()
          {
            $('.ajax-loading').show();
          }
        })
        .done(function(data)
        {debugger;          
          if(data.length == 0){
          $('.ajax-loading').html("No more records!");
          return;
        }
          $('.ajax-loading').hide();
          $("#mentor-list").append(data);
          result = $("#mentor-result").val();
          result_value = (result==1)?result+' Mentor found':result+' Mentors found';
          
         $("#mentor-result-heading").text(result_value);


        })

        /*.fail(function(jqXHR, ajaxOptions, thrownError)
        {
          alert('No response from server');
        })*/;
        
      if(sessionStorage.getItem('categories')){
       categories_array = sessionStorage.getItem('categories');

       const split_string = categories_array.split(",");
       
      for(i=0;i<split_string.length;i++){

          $("#"+split_string[i]).attr('checked','checked');
      }
      sessionStorage.clear();
     
    
   }


    }

    function filter_category(){


     categories = []; // reset 

        $('input[name="select_segment[]"]:checked').each(function()
        {
            categories.push($(this).val());
        });

       sessionStorage.setItem('categories',categories);

        
      
       

        $("#categories").val(categories);
        $("#sidebar-filter-form").submit();
                 

    
}
    