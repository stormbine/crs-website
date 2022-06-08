jQuery(document).ready(function($){
    if($('.rellax').length) {
        var rellax = new Rellax('.rellax');
    } 

    if(document.getElementsByClassName('full-gallery').length > 0)
    {
        // init Masonry
        var $grid = $('.grid').masonry({
            percentPosition: true,
            columnWidth: '.grid-sizer',
            itemSelector: '.grid-item',
        });
        // layout Masonry after each image loads
        $grid.imagesLoaded().progress( function() {
            $grid.masonry('layout');
        });
    }

    var waypoints = $('.hide-start').waypoint({
        handler: function(direction) {
            var adjust = this.element.id;
            $('#' + adjust).addClass('animate-fade');
        },
        offset:'90%'
        
    });

    var waypointscroll = $('.change-scroller').waypoint({
        handler: function(direction) {
            if(direction == "down")
            {
                let adjust = this.element.id;

                let scrollerElement = document.getElementById('scrollText')
                let scrolledIntoText = document.getElementById(adjust);

                if(scrollerElement)
                {
                    scrollerElement.querySelector('.text').textContent = scrolledIntoText.dataset.newText

                    if(scrolledIntoText.dataset.classSwitch == "red")
                    {
                        scrollerElement.classList.add('red')
                    }
                    else
                    {
                        scrollerElement.classList.remove('red')
                    }
                }
            }
        },
        offset:'50%'
    });

    var waypointscrollUp = $('.change-scroller').waypoint({
        handler: function(direction) {
            if(direction == "up")
            {
                let adjust = this.element.id;

                let scrollerElement = document.getElementById('scrollText')
                let scrolledIntoText = document.getElementById(adjust);

                scrollerElement.querySelector('.text').textContent = scrolledIntoText.dataset.newText

                if(scrolledIntoText.dataset.classSwitch == "red")
                {
                    scrollerElement.classList.add('red')
                }
                else
                {
                    scrollerElement.classList.remove('red')
                }
            }
        },
        offset:'-50%'
    });

    
});

//show the home animation
if(document.getElementById("homeAnim")) 
{
    var scrollCount = 0;
    var lastScrollTop = 0;

    let renderWrap = document.getElementById("homeAnim");
    let topPos = renderWrap.getBoundingClientRect().top + window.scrollY;
    var windowH = window.innerHeight;

    window.addEventListener('scroll', function() {
        let scrollTop = $(window).scrollTop()
        let fromTop = topPos - scrollTop;

        if(fromTop <= (windowH * .5) && fromTop > 0)
        {
            let calcVal = parseInt(((fromTop * 9 / (windowH * 0.5)) - 9) * -1)
            if(calcVal > 0)
            {
                if(scrollTop > lastScrollTop)
                {
                    document.getElementById('ha-' + calcVal).classList.add("active")
                }
                else
                {
                    document.getElementById('ha-' + calcVal).classList.remove("active")
                }
            }
        }

        lastScrollTop = scrollTop;
    });
}

//camera animation
if(document.getElementsByClassName('camera-animation').length > 0)
{     
    let renderWrap = document.getElementsByClassName('camera-animation')[0];
    let topPos = renderWrap.getBoundingClientRect().top + window.scrollY;
    var windowH = window.innerHeight;

    window.addEventListener('scroll', function() {
        let scrollTop = $(window).scrollTop()
        let fromTop = topPos - scrollTop;
        let animPhoto = document.getElementById('animPhoto')

        if(fromTop <= (windowH / 2) && fromTop > 0)
        {
            let calcVal = (fromTop * 100 / (windowH / 2)) * -1
            animPhoto.style.transform = "translateY(" + calcVal + "%)";
        }
    });
}