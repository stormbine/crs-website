VueScrollTo.setDefaults({
    offset: 0,
})

let pageapp = new Vue({
    el: '#page_wrap',
    data: {
        showNavbar: 0,
        navOpen: 0,
        projectPopup: 0,
        mapProductType: 0,
        mapMarkers: '',
        mapMarkerGroup: '',
        mapObject: '',
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
        showProjectsMap: function()
        {
            let mapElement = document.getElementById('projectmap')

            var map = L.map('projectmap', {
                scrollWheelZoom: false
            }).setView([41.370189,-101.9494517], 3); 
            
            L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
                subdomains: 'abcd',
                minZoom: 0,
                maxZoom: 20,
                ext: 'png'
            }).addTo(map);
            
            this.mapMarkers = Array.from(document.querySelectorAll('.smarker'))
            this.mapMarkerGroup = L.layerGroup().addTo(map);

            this.mapObject = map

            this.showTypeMarkers(0)
        },
        showMapPopup: function(projectNumber)
        {
            this.projectPopup = Number(projectNumber)
        },
        showProductType: function(projectNumber)
        {
            this.mapProductType = Number(projectNumber)
            this.mapMarkerGroup.clearLayers()
            this.showTypeMarkers(projectNumber)
        },
        showTypeMarkers: function(typeNumber)
        {
            //close a popup if its open.
            this.projectPopup = 0
            
            var markerIcon = L.icon({
                iconUrl: '../wp-content/themes/crs/img/map-marker.png',
                iconSize:     [25, 37],
                iconAnchor:   [13, 18]
            });

            this.mapMarkers.forEach(node => {
                let mLat = node.getAttribute('data-latitude')
                let mLong = node.getAttribute('data-longitude')
                let mProdType = node.getAttribute('data-product-type')
                let mProject = node.getAttribute('data-project-number')

                if(mProdType == typeNumber || typeNumber == 0)
                {
                    marker = L.marker([mLat, mLong], {icon: markerIcon}).on('click', function(e) { 
                        pageapp.showMapPopup(mProject) 
                    })
                    this.mapMarkerGroup.addLayer(marker)
                }
            });
        },
        closeProjectPop: function() {
            this.projectPopup = 0
        },
        getWithExpiry: function(key) {
            const itemStr = localStorage.getItem(key)
            // if the item doesn't exist, return null
            if (!itemStr) {
                return null
            }
            const item = JSON.parse(itemStr)
            const now = new Date()
            // compare the expiry time of the item with the current time
            if (now.getTime() > item.expiry) {
                // If the item is expired, delete the item from storage
                // and return null
                localStorage.removeItem(key)
                return null
            }
            return item.value
        },
        skipIntro: function() {
            document.getElementById("homeSplash").classList.add("hide");
        }
    },  
    created () {
        
    },
    destroyed () {
        
    },
    mounted () {
        if(document.getElementById("projectmap")) {
            this.showProjectsMap();
        }

        localStorage.removeItem('homeIntro')

        if(document.getElementById("homeSplash")) {
            if(!this.getWithExpiry('homeIntro') && window.innerWidth > 1024)
            {
                window.setTimeout(function() {
                    document.getElementById("homeSplash").querySelector('.video-wrap').classList.add("bg-switch");
                }, 4200);

                window.setTimeout(function() {
                    document.getElementById("homeSplash").classList.add("hide");
                }, 7000);

                const now = new Date()
                const item = {
                    value: 1,
                    expiry: now.getTime() + (30 * 60000)
                }
                
                localStorage.setItem('homeIntro', JSON.stringify(item))
            }
            else
            {
                document.getElementById("homeSplash").classList.add("hide");
            }
        }
    }
});