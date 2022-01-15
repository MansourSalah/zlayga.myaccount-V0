<script>
    var ls= localStorage;
    $(document).ready(function(){
        init_navig();
    });
    function navig(e,o){
        e.preventDefault();
        var name= $(o).parent().attr('name')
        ls.setItem("x_nav", name);
        window.location.href = $(o).attr('href');
    }
    function init_navig(){
        if(ls.getItem('x_nav')!=null){
            const path = new String(window.location.pathname);
            const li = new String($(".site-navigation li[name='"+ls.getItem('x_nav')+"']  a").attr('href'));
            if(path.includes(li) || li.includes(path) ){
                $(".site-navigation li[class='active']").removeClass('active');
                $(".site-navigation li[name='"+ls.getItem('x_nav')+"']").addClass("active");
            }
            
        }
    }
</script>