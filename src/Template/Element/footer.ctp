<footer>
<p>© <?php echo date('Y');?> All Rights Reserved. <a href="<?php echo SITE_URL; ?>"><b>RINGHEL</b></a></p>
</footer>






    
</div>
<!--page-wrapper--> 

<!------min.js-----------------> 

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>

<!--<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>-->

<!--<script>
            $(document).ready(function() {
              $('.slider-carousel').owlCarousel({
                loop: true,
				autoplay:true,
                responsiveClass: true,
				smartSpeed:1000,
                responsive: {
                  0: {
                    items: 1,
                    nav: false
                  },
                  600: {
                    items: 1,
                    nav: false
                  },
                  1000: {
                    items: 1,
                    nav: false,
                    loop: true
                  }
                }
              })
            })
          </script>
          
<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>-->          
</body>
</html>
