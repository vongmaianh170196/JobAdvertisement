$(".delete").click(function(){
       var $confirmbox= confirm("Are you sure to delete?");
  if($confirmbox===true)
    {
      $("#content").hide();
    }
  else{
    event.preventDefault();}
});