</div>

<div id="footer">
	
</div>

</body>
</html>

<script>
var baseBath = "<?php echo BASEPATH; ?>";

$(document).ready(function(){
 
 function load_unseen_notification(view = '')
 {
    $.ajax({
    url: baseBath+"main/fitch",
    method:"POST",
    data:{view:view},
    dataType:"json",
    success:function(data)
    {
        $('.dropdown-menu').html(data.notification);
        if(data.unseen_notification > 0)
        {
            $('.count').html(data.unseen_notification);
        }
    }
    });
 }
 
 load_unseen_notification();
 
 $(document).on('click', '.dropdown-toggle', function(){
    $('.count').html('');
    load_unseen_notification('yes');
 });
 
 setInterval(function(){ 
  load_unseen_notification();; 
 }, 10000);
 
});
</script>