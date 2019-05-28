$(document).ready(function(){

 function load_unseen_notification(view = '')
 {
  $.ajax({
    type: 'POST',
   url:"fetch.php",
   data:{view:view},
   dataType:"json",
   success:function(data)
   {
    $('#dropnot').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 }

 load_unseen_notification();

 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  if($('#subject').val() != '' && $('#comment').val() != '')
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     $('#comment_form')[0].reset();
     load_unseen_notification();
    }
   });
  }
  else
  {
   alert("Both Fields are Required");
  }
 });

 $('#navbarnot').on('click', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });

 setInterval(function(){
  load_unseen_notification();
 }, 5000);

});
