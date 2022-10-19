    <!-- ARCHIVES JS -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>        
    <script src="js/tether.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/mmenu.min.js"></script>
    <script type="text/javascript" src="js/ajax-script.js"></script>
    <script src="js/mmenu.js"></script>
    <script src="js/smooth-scroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/popup.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/counterup.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/ajaxchimp.min.js"></script>
    <script src="js/newsletter.js"></script>
    <script src="js/color-switcher.js"></script>
    <script src="js/inner.js"></script>    
    <script src="js/t&cpopup.js"></script>    
    <script src="js/main.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/glide.js" integrity="sha512-isL0X0NIGuM6rzb9zZ0J18tMNlRCDaLew8hfE85AtQUWuM675YRoFovkbUeKssvgQMGg8YQMZ/eJMm8C/bH9HA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript">
  $(document).ready(function () {
                $('#allstate').change(function () {
                    var stateid = document.getElementById('allstate').value;
                    var test = "states_id=" + stateid;

                    $('#citi').load('getcity.php', test);
                });

                if ($('#allstate').val()) {
                    var city = $('div[city_info]').attr('city_info');
                    var test = "states_id=" + $('#allstate').val()+"&city="+city;

                    $('#citi').load('getcity.php', test);
                }

                $('#allstate').change(function () {
                    var pick = $('#allsate').val();
                    var data = "put=" + pick;
                    $.ajax({
                        url: 'getcity.php',
                        data: data,
                        type: 'post', 
                        dataType: 'json',
                        success: function (msg) {
                            setTimeout(function () {
                                $('#chose').html(msg.message);
                            }, 10);

                        },
                        error: function (err) {
                            console.log(err);
                        },
                    })
                })
      		})

							
	</script>

    <script>
      $('.style1').owlCarousel({
        loop: true,
        margin: 10,
        autoplay: false,
        autoplayTimeout: 5000,
        responsive: {
          0: {
            items: 1
          },
          400: {
            items: 1,
            margin: 20
          },
          500: {
            items: 1,
            margin: 20
          },
          768: {
            items: 1,
            margin: 20
          },
          991: {
            items: 1,
            margin: 20
          },
          1000: {
            items: 1,
            margin: 20
          }
        }
      });

    </script>
    <script>
      $('.style2').owlCarousel({
        loop: true,
        margin: 0,
        dots: false,
        autoWidth: false,
        autoplay: true,
        autoplayTimeout: 5000,
        responsive: {
          0: {
            items: 2,
            margin: 20
          },
          400: {
            items: 2,
            margin: 20
          },
          500: {
            items: 3,
            margin: 20
          },
          768: {
            items: 4,
            margin: 20
          },
          992: {
            items: 5,
            margin: 20
          },
          1000: {
            items: 6,
            margin: 20
          }
        }
      });

    </script>
        <script>
          $("#togglePassword").click(function(){
        $(this).toggleClass("fa-eye fa-eye-slash");
           var type = $(this).hasClass("fa-eye-slash") ? "password" : "text";
            $("#pwd").attr("type", type);

   })
  </script>

    <!-- Date Dropper Script-->
  <script>
            $("#reservation-date").dateDropper();
            </script>

         <!-- Time Dropper Script-->
        <script> 
            this.$("#reservation-time").timeDropper({
                setCurrentTime: false,
                meridians: true,
                primaryColor: "#e8212a",
                borderColor: "#e8212a",
                minutesInterval: "15"
            });

        </script>
         

  </div>
  <!-- Wrapper / End -->
</body>

    </html>