<script>
  $("form").submit(function(event) {
    event.preventDefault();
    var fd=new FormData(this);    
    $("#loading").css("display","block");//w9aft hna 
    $("#action").css("display","none");

    $.ajax({
        url: '/api/user/security/edit',
        method:"POST",
        data:fd,
        contentType: false,processData: false,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success: function(data){
            $("#action").css("display","block");
            $("#loading").css("display","none");
            if(data['flag']) span="<span style='color:green;'>";
            else span="<span style='color:red;'>"
            $.dialog({
                title: span+data['title']+"</span>",
                content: data['message'],
            });
        }
    });
    
});
</script>