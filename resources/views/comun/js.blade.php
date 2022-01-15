<script>
    function setLang(e,o){
        e.preventDefault();
        $.get($(o).attr('href'))
        .done(function(data,statut){
            if(statut=="success")  
                location.reload();
            
        });
    }
</script>