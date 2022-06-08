VueScrollTo.setDefaults({
    offset: 0,
})

let pageapp = new Vue({
    el: '#page_wrap',
    data: {
        showNavbar: 0,
        navOpen: 0,
    },
    methods: {
        toggleNav: function()
        {
            if(this.navOpen == 0)
            {
                this.navOpen = 1
            }
            else
            {
                this.navOpen = 0
            }
        },
        
    },  
    created () {
        
    },
    destroyed () {
        
    },
    mounted () {
        
    }
});