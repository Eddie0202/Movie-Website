    <!-- SCRIPT -->
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- OWL CAROUSEL -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
   <!--  css -->
  <!--   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <!-- APP SCRIPT -->
    <script src="script/app.js"></script>

<!--     <script >
        (function($) { "use strict";

    $(function() {
        var header = $(".start-style");
        $(window).scroll(function() {    
            var scroll = $(window).scrollTop();
        
            if (scroll >= 10) {
                header.removeClass('start-style').addClass("scroll-on");
            } else {
                header.removeClass("scroll-on").addClass('start-style');
            }
        });
    });     
        
    //Animation
    
    $(document).ready(function() {
        $('body.hero-anime').removeClass('hero-anime');
    });

    //Menu On Hover
        
    $('body').on('mouseenter mouseleave','.nav-item',function(e){
            if ($(window).width() > 750) {
                var _d=$(e.target).closest('.nav-item');_d.addClass('show');
                setTimeout(function(){
                _d[_d.is(':hover')?'addClass':'removeClass']('show');
                },1);
            }
    }); 
    
    //Switch light/dark
    
    $("#switch").on('click', function () {
        if ($("body").hasClass("dark")) {
            $("body").removeClass("dark");
            $("#switch").removeClass("switched");
        }
        else {
            $("body").addClass("dark");
            $("#switch").addClass("switched");
        }
    });  
    
  })(jQuery); 
    </script>
 -->

<script >
    const $dropdown = $(".dropdown");
const $dropdownToggle = $(".dropdown-toggle");
const $dropdownMenu = $(".dropdown-menu");
const showClass = "show";

$(window).on("load resize", function() {
  if (this.matchMedia("(min-width: 768px)").matches) {
    $dropdown.hover(
      function() {
        const $this = $(this);
        $this.addClass(showClass);
        $this.find($dropdownToggle).attr("aria-expanded", "true");
        $this.find($dropdownMenu).addClass(showClass);
      },
      function() {
        const $this = $(this);
        $this.removeClass(showClass);
        $this.find($dropdownToggle).attr("aria-expanded", "false");
        $this.find($dropdownMenu).removeClass(showClass);
      }
    );
  } else {
    $dropdown.off("mouseenter mouseleave");
  }
});
</script>