$(document).ready(function() {
    $('.dropdown-main-menu').hover(function() {
        $(this).find('.dropdown-menu').stop(true, true).fadeIn(100);
    }, function() {
        $(this).find('.dropdown-menu').stop(true, true).fadeOut(500);
    });

    $('.accordion-faq').click(function() {
        var accordion = $(this).next()
        $('.icon-faq').addClass("icon-accordion-faq");
        $('.icon-faq').removeClass("icon-accordion-faq-active");
        if ($(this).hasClass('collapsed')) {
            accordion.removeClass("icon-accordion-faq");
            accordion.addClass("icon-accordion-faq-active");
        } else {
            accordion.removeClass("icon-accordion-faq-active");
            accordion.addClass("icon-accordion-faq");
        }
    });

    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
    
         //>=, not <=
        if (scroll >= 30) {
            //clearHeader, not clearheader - caps H
            $(".main-nav").addClass("nav-scrolled");
        }else{
            $(".main-nav").removeClass("nav-scrolled");
        }
    });

    const baseUrl = document.getElementById("baseUrl").innerText;
    $(".termQuestion").click(function(){
        let termValue = $('input[name="term"]:checked').val();
        let questionId = document.getElementById("questionId").innerText;

        $.ajax({
            url: baseUrl + "answer/" + questionId,
            type: 'POST',
            data: {
                term: termValue
            },
            success: function(data) {
                const obj = JSON.parse(data);
                if(obj.status == true){
                    $("#hiddenDiv").text("Jawaban anda berhasil disimpan!");
                    $("#hiddenDiv").fadeIn(1000);
                    $("#hiddenDiv").fadeOut(1000);                   
                }else{
                    $("#hiddenDiv").text("Terjadi kesalah sistem harap mencoba kembali");
                    $("#hiddenDiv").fadeIn(1000);
                    $("#hiddenDiv").fadeOut(1000);  
                }
            }
        });
    })

    (function () {
        const second = 1000,
              minute = second * 60,
              hour = minute * 60,
              day = hour * 24;
      
        let birthday = document.getElementById("dueDate").innerText;
            countDown = new Date(birthday).getTime(),
            x = setInterval(function() {    
      
              let now = new Date().getTime(),
                  distance = countDown - now;
      
                document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
                document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
                document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);
      
              //do something later when date is reached
              if (distance <= 0) {
                window.location.replace(baseUrl+"done");
                clearInterval(x);
              }
              //seconds
            }, 0)
        }());
});

