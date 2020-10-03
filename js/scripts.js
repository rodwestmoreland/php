$('#loginModalButton').click(function()
            {
                $('#loginModal').modal('show');
        
            }
        );
        
        $('#reserveModalButton').click(function()
            {
                $('#reserveModal').modal('show');
            }
        );

        $("#carouselButton").click(function()
            {    
                if ($("#carouselButton").children("span").hasClass('fa-pause')) 
                {
                    alert("you click it - in pause loop");
                    $("#mycarousel").carousel('pause');
                    $("#carouselButton").children("span").removeClass('fa-pause');
                    $("#carouselButton").children("span").addClass('fa-play');
                }
                else if ($("#carouselButton").children("span").hasClass('fa-play'))
                {
                    $("#mycarousel").carousel('cycle');
                    $("#carouselButton").children("span").removeClass('fa-play');
                    $("#carouselButton").children("span").addClass('fa-pause');                    
                }
            }
        );