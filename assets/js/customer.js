var customerHandle = (function() {
    function customerHandle() {
        _classCallCheck(this, customerHandle);
        this.defaultOrigin = [-7.75601670793721, 110.39742489154364];
        this.defaultZoom = 15;
        this.defaultmarker;
        this.myLeafletMaps;
        this.init();
    }
    _createClass(customerHandle, [{
        key: "init",
        value: function init() {
            this.ValidasiForm();
            this.SelectWil();
         if (document.getElementById("map")) {
            this.showmaps();
            this.defaultmarker();
            this.leafetevent();
            this.customkoordinat();
        }
        }
    }, {
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
    }, {
        key: 'defaultmarker',
        value: function defaultmarker() {
            this.defaultmarker = L.marker([-7.75601670793721, 110.39742489154364], {
                draggable: true
            }).addTo(this.myLeafletMaps);
        }
    }, {
        key: "leafetevent",
        value: function leafetevent() {
            var self = this;
            this.defaultmarker.on('dragend', function(e) {
                document.getElementById('latitude').value = self.defaultmarker.getLatLng().lat;
                document.getElementById('longitude').value = self.defaultmarker.getLatLng().lng;
            });
        }
    }, {
        key: "customkoordinat",
        value: function customkoordinat() {
            var self = this;
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
                this.myLeafletMaps.flyTo([lat, lng], 20);
            }
        }
    }, {
        key: "ValidasiForm",
        value: function ValidasiForm() {
        const addCustomer = document.querySelector("#addCustomer");
        
        
            var t,y;
            addCustomer && FormValidation.formValidation(addCustomer, {
                fields: {
                    firstname: {
                        validators: {
                            notEmpty: {
                                message: "Please enter firstname"
                            },
                        }
                    },
                    lastname: {
                        validators: {
                            notEmpty: {
                                message: "Please enter  lastname"
                            },
                        }
                    },
                    phoneNumber: {
                        validators: {
                            notEmpty: {
                                message: "Please enter  phone Number"
                            },
                        }
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap5: new FormValidation.plugins.Bootstrap5({
                        eleValidClass: "",
                        rowSelector: ".col-md-6"
                    }),
                    submitButton: new FormValidation.plugins.SubmitButton,
                    defaultSubmit: new FormValidation.plugins.DefaultSubmit,
                    autoFocus: new FormValidation.plugins.AutoFocus
                },
                init: e => {
                    e.on("plugins.message.placed", function(e) {
                        e.element.parentElement.classList.contains("input-group") && e.element.parentElement.insertAdjacentElement("afterend", e.messageElement)
                    })
                }
            }), (t = document.querySelectorAll(".numeral-mask")).length && t.forEach(e => {
                new Cleave(e, {
                    numeral: !0
                })
            }),(y = document.querySelectorAll(".phone-mask")).length && y.forEach(e => {
                   var cleave = new Cleave(e, {
                    numericOnly : true,
                    blocks: [4,4,4,3],
                    delimiters: [' ',' ', ' ', ' '],
                    prefix: '+62'
                });
            })

        }
    }, {
        key: "SelectWil",
        value: function SelectWil() {
            function clearOptions(id) {
            $('#' + id).empty().trigger('change');
        }
      function populateSelect(element, data, placeholder) {
        element.empty();
        element.select2({
          placeholder: placeholder,
          data: data
        });
      }

      function loadData(element, url, placeholder) {
        $.getJSON(url, function(data) {
          data = [{
            id: "",
            nama: placeholder,
            text: placeholder
          }].concat(data.map(function(obj) {
            obj.text = obj.nama;
            return obj;
          }));
          populateSelect(element, data, placeholder);
        });
      }

      var $selectProvinsi = $('#Provinsi');
      loadData($selectProvinsi, '/assets/data/provinsi.json', '- Pilih Provinsi -');
      $selectProvinsi.on('change', function() {
        var selectedProvinsiId = $(this).val();
        clearOptions('Kabupaten');

        if (selectedProvinsiId) {
          var text = $selectProvinsi.find(':selected').text();
          loadData($('#Kabupaten'), '/assets/data/kabupaten/' + selectedProvinsiId + '.json', '- Pilih Kabupaten -');
        }
      });
      $('#Kabupaten').on('change', function() {
        var selectedKabupatenId = $(this).val();
        clearOptions('Kecamatan');
        if (selectedKabupatenId) {
          var text = $('#Kabupaten :selected').text();
          loadData($('#Kecamatan'), '/assets/data/kecamatan/' + selectedKabupatenId + '.json', '- Pilih Kecamatan -');
        }
      });
      $('#Kecamatan').on('change', function() {
        var selectedKecamatanId = $(this).val();
        clearOptions('Kelurahan');
        if (selectedKecamatanId) {
          var text = $('#Kecamatan :selected').text();
          loadData($('#Kelurahan'), '/assets/data/kelurahan/' + selectedKecamatanId + '.json', '- Pilih Kelurahan -');
        }
      });
      $('#Kelurahan').on('change', function() {
        var selectedKelurahanId = $(this).val();

        if (selectedKelurahanId) {
          var text = $('#Kelurahan :selected').text();
        }
      });
    $(document).on('select2:open', () => {
          (list => list[list.length - 1])(document.querySelectorAll('.select2-container--open .select2-search__field')).focus()
        });
        }
    }]);

    return customerHandle;
})();


window.addEventListener('DOMContentLoaded', function() {
    var Apps = new customerHandle();
});