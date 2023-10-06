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
            
            this.tableresponsive();

            if (document.getElementById("map")) {
                this.ValidasiForm();
                this.SelectWil();
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
            var self = this;
            if (lat !== null && lng !== null) {
                this.myLeafletMaps.flyTo([lat, lng], 20);
            }
        }
    }, {
        key: "ValidasiForm",
        value: function ValidasiForm() {
            var self = this;
            const addCustomer = document.querySelector("#addCustomer");


            var t, y;
            addCustomer && FormValidation.formValidation(addCustomer, {
                fields: {
                    firstname: {
                        validators: {
                            notEmpty: {
                                message: "Please enter  firstname"
                            },
                            stringLength: {
                                min: 3,
                                max: 30,
                                message: "The name must be more than 3 and less than 30 characters long"
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9 ]+$/,
                                message: "The name can only consist of alphabetical, number and space"
                            }
                        }
                    },
                    lastname: {
                        validators: {
                            notEmpty: {
                                message: "Please enter  lastname"
                            },
                            stringLength: {
                                min: 3,
                                max: 30,
                                message: "The name must be more than 3 and less than 30 characters long"
                            },
                            regexp: {
                                regexp: /^[a-zA-Z0-9 ]+$/,
                                message: "The name can only consist of alphabetical, number and space"
                            }
                        }
                    },
                    phoneNumber: {
                        validators: {
                            notEmpty: {
                                message: "Please enter a phone number"
                            },
                            stringLength: {
                                min: 9,
                                max: 19,
                                message: "Phone number must be between 9 and 13 characters"
                            },
                            regexp: {
                                regexp: /^\+62\d\s\d{4}\s\d{4}\s\d{1,3}$/,
                                message: "Phone number can only consist of numbers"
                            }
                        }
                    },

                    lat: {
                        validators: {
                            notEmpty: {
                                message: "Please enter latitude"
                            },
                            regexp: {
                                regexp: /^-?([1-8]?[0-9](\.\d+)?|90(\.0+)?)$/,
                                message: "Latitude must be a valid coordinate between -90 and 90"
                            }
                        }
                    },
                    lng: {
                        validators: {
                            notEmpty: {
                                message: "Please enter longitude"
                            },
                            regexp: {
                                regexp: /^-?((1[0-7]|[0-9]?)[0-9](\.\d+)?|180(\.0+)?)$/,
                                message: "Longitude must be a valid coordinate between -180 and 180"
                            }
                        }
                    },

                    alamat: {
                        validators: {
                            notEmpty: {
                                message: "Please enter alamat"
                            },
                        }
                    },
                    email: {
                        validators: {
                            notEmpty: {
                                message: "Please enter email"
                            },
                            emailAddress: {
                                message: "The value is not a valid email address"
                            }
                        }
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap5: new FormValidation.plugins.Bootstrap5({
                        eleValidClass: "",
                        rowSelector: ".cek"
                    }),
                    submitButton: new FormValidation.plugins.SubmitButton,
                    autoFocus: new FormValidation.plugins.AutoFocus
                },
                init: e => {
                    e.on("plugins.message.placed", function(e) {
                        e.element.parentElement.classList.contains("input-group") && e.element.parentElement.insertAdjacentElement("afterend", e.messageElement)
                    });
                }
            }).on("core.form.valid", function() {
                self.SubmitAddCustomer()
            }), (y = document.querySelectorAll(".phone-mask")).length && y.forEach(e => {
                var cleave = new Cleave(e, {
                    numericOnly: true,
                    blocks: [4, 4, 4, 3],
                    delimiters: [' ', ' ', ' ', ' '],
                    prefix: '+62',
                    onValueChanged: function(e) {
                        $(this).trigger('input');
                    }
                });
            });


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
    }, {
        key: 'SubmitAddCustomer',
        value: function SubmitAddCustomer() {
            var formData = $('#addCustomer').serializeArray();
            var dataObject = {};
            formData.forEach(function(input) {
                dataObject[input.name] = input.value;
            });

            $.ajax({
                url: 'customer/add',
                method: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(dataObject),
                success: function(response) {
                    console.log('Data berhasil dikirim:', JSON.stringify(response));
                },
                error: function(error) {
                    console.error('Terjadi kesalahan:', error);
                },
                complete: function() {}
            });

        }
    }, {
        key: 'tableresponsive',
        value: function tableresponsive() {
        // Mengumpulkan semua elemen dengan id "tables"
        var tables = document.querySelectorAll('#tables');
        // Periksa lebar jendela dan tambahkan atau hapus kelas sesuai kondisi
        if (window.innerWidth < 600) {
            tables.forEach(function(table) {
                table.classList.add('table-responsive');
            });
        } else {
            tables.forEach(function(table) {
                table.classList.remove('table-responsive');
            });
        }
        }
    },  ]);

    return customerHandle;
})();


window.addEventListener('DOMContentLoaded', function() {
    var Apps = new customerHandle();

});