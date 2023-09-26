var customerHandle = (function () {
    function customerHandle() {
        _classCallCheck(this, customerHandle);
         this.defaultOrigin = [-7.75601670793721, 110.39742489154364];
         this.defaultZoom=15;
         this.defaultmarker;
         this.myLeafletMaps;
         this.init();
    }
    _createClass(customerHandle, [{
        key: "init",
        value: function init() {
            this.addcustomer();
            this.showmaps();
            this.defaultmarker();
            this.leafetevent();
            this.customkoordinat();
        }
    },{
        key: "addcustomer",
        value: function addcustomer() {
            $('#addcustomer').on('submit', '#addcustomer', function(event) {
                event.preventDefault();
            });
        }
    },{
        key: "showmaps",
        value: function showmaps() {
          this.myLeafletMaps = L.map("map", {
                attributionControl: false,
                transform3DLimit: false,
                zoomControl: false,
            }).setView(this.defaultOrigin, this.defaultZoom);
             L.tileLayer(`https://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}`, {
                maxZoom: 22,
                minZoom: 2,
                attribution: false,
                subdomains: ["mt0", "mt1", "mt2", "mt3"],
            }).addTo(this.myLeafletMaps);
        }
    },{
        key : 'defaultmarker',
        value : function defaultmarker(){
              this.defaultmarker =  L.marker([-7.75601670793721, 110.39742489154364],{
              draggable: true
            }).addTo(this.myLeafletMaps);
        }
        
    },{
        key: "leafetevent",
        value: function leafetevent() {
           var self =this;
            this.defaultmarker.on('dragend', function (e) {
              document.getElementById('latitude').value =  self.defaultmarker.getLatLng().lat;
              document.getElementById('longitude').value =  self.defaultmarker.getLatLng().lng;
            });
        }
    },{
        key: "customkoordinat",
        value: function customkoordinat() {
            var self =this;
        var latitudeInput = document.getElementById('latitude');
        var longitudeInput = document.getElementById('longitude');
        latitudeInput.addEventListener('paste', function(event) {
          event.preventDefault();
          var clipboardData = event.clipboardData || window.clipboardData;
          var pastedData = clipboardData.getData('text');
          var regex = /^(-?\d+\.\d+),\s*(-?\d+\.\d+)$/;
          var match = pastedData.match(regex);
          if (match) {
            latitudeInput.value = match[1];
            longitudeInput.value = match[2];
             self.defaultmarker.setLatLng([match[1], match[2]]);
             self.JumpMapsView(match[1], match[2]);
            
          } else {
            alert('Format koordinat tidak valid. Gunakan format -7.745552872294522, 110.40203744233082');
          }
        });
            }
        }, {
        key: "JumpMapsView",
        value: function JumpMapsView(lat = null, lng = null) {
            const self = this;
            if (lat !== null && lng !== null) {
                this.myLeafletMaps.flyTo([lat, lng],20);
            }}
           }]);

    return customerHandle;
})();




window.addEventListener('DOMContentLoaded', function() {
    var Apps = new customerHandle();
});
