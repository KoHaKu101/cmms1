$(document).ready(function(){
   function fetch_data(page, sort_type, sort_by, query)
   {
    $.ajax({
     url:"/machine/assets/searchmachine?page="+page+"&sortby="+sort_by+"&sorttype="+sort_type+"&query="+query,
     success:function(data)
     {
      $('tbody').html('');
      $('tbody').html(data);
     }
    })
   }

   $(document).on('keyup', '#serach', function(){
    var query = $('#serach').val();
    var column_name = $('#hidden_column_name').val();
    var sort_type = $('#hidden_sort_type').val();
    var page = $('#hidden_page').val();
    fetch_data(page, sort_type, column_name, query);
   });

   $(document).on('click', '.pagination a', function(event){
    event.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    $('#hidden_page').val(page);
    var column_name = $('#hidden_column_name').val();
    var sort_type = $('#hidden_sort_type').val();

    var query = $('#serach').val();


          $(this).parent().addClass('active');
    fetch_data(page, sort_type, column_name, query);
   });

   });
