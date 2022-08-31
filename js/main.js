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

                $('#btn').click(function () {
                })
            })

            
            $(".header-user-name").on("click", function () {
                $(".header-user-menu ul").toggleClass("hu-menu-vis");
                $(this).toggleClass("hu-menu-visdec");
            });


            if (jQuery("input[name='images[]']").length){
                var lpcount = 0;
                jQuery.each(jQuery("input[name='images[]']"), function(k, files) {
                    jQuery.each(jQuery("input[name='images[]']")[k].files, function(i, file) {
                        if(file.size > 1 || file.fileSize > 1) {
                            fd.append('listingfiles[' + lpcount + ']', file);
                            lpcount++;
                        }
                    });
                });
            }



        // partners slider
            $('.autoplay').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
              });
                  
