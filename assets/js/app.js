function _classCallCheck(instance, Constructor) {
    if (!(instance instanceof Constructor)) {
        throw new TypeError("Cannot call a class as a function");
    }
}

function _defineProperties(target, props) {
    for (var i = 0; i < props.length; i++) {
        var descriptor = props[i];
        descriptor.enumerable = descriptor.enumerable || false;
        descriptor.configurable = true;
        if ("value" in descriptor) descriptor.writable = true;
        Object.defineProperty(target, descriptor.key, descriptor);
    }
}

function _createClass(Constructor, protoProps, staticProps) {
    if (protoProps) _defineProperties(Constructor.prototype, protoProps);
    if (staticProps) _defineProperties(Constructor, staticProps);
    return Constructor;
}

var App = (function () {
    function App() {
        _classCallCheck(this, App);
        this.init();
        this.GotoMaps();
    }
    _createClass(App, [{
        key: "init",
        value: function init() {
            this.autoopensindebar();
        }
    },{
        key: "autoopensindebar",
        value: function autoopensindebar() {
                   // Ambil URL saat ini
        var currentURL = window.location.pathname;
        
        // Pilih elemen <ul> dengan kelas "menu-inner py-1"
        var menuInner = document.querySelector('.menu-inner.py-1');
        
        // Loop melalui semua elemen <li> yang berada di bawah elemen <ul> tersebut
        var menuItems = menuInner.querySelectorAll('.menu-item[data-menu]');
        menuItems.forEach(function (menuItem) {
            // Ambil nilai data-menu dari elemen <li>
            var dataMenu = menuItem.getAttribute('data-menu');
        
            // Periksa apakah URL saat ini cocok dengan data-menu
            if (currentURL.includes(dataMenu)) {
                // Jika cocok, tambahkan kelas "open" pada elemen <li>
                menuItem.classList.add('open');
            } else {
                // Jika tidak cocok, hapus kelas "open" dari elemen <li>
                menuItem.classList.remove('open');
            }
        });
        
         
        }
    },{
        key: 'GotoMaps',
        value: function GotoMaps() {
            
            $(".koordinat").click(function() {
                // Mendapatkan nilai lat dan lng dari atribut elemen yang diklik
                var lat = parseFloat($(this).attr("lat"));
                var lng = parseFloat($(this).attr("lng"));
            
                // Memeriksa apakah nilai lat dan lng adalah angka yang valid
                if (!isNaN(lat) && !isNaN(lng)) {
                    // Membangun URL Google Maps dengan koordinat yang didapatkan
                    var mapsUrl = "https://www.google.com/maps?q=" + lat + "," + lng;
            
                    // Mengarahkan ke Google Maps
                    window.open(mapsUrl, '_blank');
                } else {
                    // Tampilkan pesan kesalahan jika koordinat tidak valid
                    alert("Koordinat tidak valid.");
                }
            });



        }
    },]);

    return App;
})();



window.addEventListener('DOMContentLoaded', function() {
    var Apps = new App();
});
