var jsonObject2 = {
    "1": [
        {val: 1, text: 'حكومي'},
        {val: 2, text: 'دولي وسياسي'},
        {val: 3, text: 'سكني'},
        {val: 4, text: 'صحي'},
        {val: 5, text: 'تعليمي'},
        {val: 6, text: 'ترفيهي ثقافي'},
        {val: 7, text: 'سيلحي'},
        {val: 8, text: 'نفط'},
        {val: 9, text: 'تجاري'},
        {val: 10, text: 'صناعي'},
        {val: 11, text: 'زراعي وحيواني'},
        {val: 12, text: 'مستودعات مستقلة'},
        {val: 13, text: 'وسائل ومرافق نقل'},
        {val: 14, text: 'مرافق واماكن عامة'},
        {val: 15, text: 'اماكن اخرى'},
    ]
}
var jsonObject = {
    "1": [
        {val: 1, text: 'الرميلة1'},
        {val: 2, text: 'الرميلة2'},
        {val: 4, text: 'الرميلة3'},
        {val: 5, text: 'النخيل1'},
        {val: 6, text: 'النخيل2'},
        {val: 7, text: 'ليوارة1'},
        {val: 8, text: 'ليوارة2'},
        {val: 9, text: 'الراشدية2'},
        {val: 10, text: 'الراشدية3'},
        {val: 11, text: 'النعيمية3'}
    ],
    "2": [
        {val: 1, text: 'الراشدية1'},
        {val: 2, text: 'النعيمية1'},
        {val: 3, text: 'النعيمية2'},
        {val: 3, text: 'مشيرف'},
        {val: 3, text: 'الصفيا'},
        {val: 3, text: 'الجرف2'}
    ],
    "3": [
        {val: 1, text: 'عجمان الصناعية1'},
        {val: 2, text: 'عجمان الصناعية2'},
        {val: 3, text: 'المويهات1'},
        {val: 3, text: 'المويهات2'},
        {val: 3, text: 'المويهات3'},
        {val: 3, text: 'الروضة1'},
        {val: 3, text: 'الروضة2'},
        {val: 3, text: 'الروضة3'},
        {val: 3, text: 'محمد بن زايد1'},
        {val: 3, text: 'محمد بن زايد2'},
        {val: 3, text: 'التلة1'},
        {val: 3, text: 'التلة2'},
    ],
    "4": [
        {val: 1, text: 'الجرف1'},
        {val: 2, text: 'الزورا'},
        {val: 3, text: 'الجرف الصناعية1'},
        {val: 3, text: 'الجرف الصناعية2'},
        {val: 3, text: 'الجرف الصناعية3'},
        {val: 3, text: 'الحميدية1'},
        {val: 3, text: 'الحميدية2'},
        {val: 3, text: 'الرقايب1'},
        {val: 3, text: 'الرقايب2'},
        {val: 3, text: 'الباهية'},
        {val: 3, text: 'الزاهية'},
        {val: 3, text: 'العالية'},
        {val: 3, text: 'العامرة'},
        {val: 3, text: 'الحليو1'},
        {val: 3, text: 'الحليو2'},
        {val: 3, text: 'الياسمين'},
    ],
    "5": [
        {val: 1, text: 'المنامة 1'},
        {val: 2, text: 'المنامة 2'},
        {val: 3, text: 'المنامة 3'},
        {val: 3, text: 'المنامة 4'},
        {val: 3, text: 'المنامة 5'},
        {val: 3, text: 'المنامة 6'},
        {val: 3, text: 'المنامة 7'},
        {val: 3, text: 'المنامة 8'},
        {val: 3, text: 'المنامة 9'},
        {val: 3, text: 'المنامة 10'},
        {val: 3, text: 'المنامة 11'},
        {val: 3, text: 'المنامة 12'},
        {val: 3, text: 'المنامة 13'},
        {val: 3, text: 'المنامة 14'},
        {val: 3, text: 'المنامة 15'},
        {val: 3, text: 'المنامة 16'},
        {val: 3, text: 'المنامة 17'},
    ],

};
var MaP_new = {
    getLocation: function () {
        var geo_address = 'NEW AJMAN CIVIL DEFENSE - Ajman - United Arab Emirates';
        var latitude_pop = 0;
        var longitude_pop = 0;
        var radius_pop = 100;
        navigator.geolocation.getCurrentPosition(function (position) {
            var geo_loc = processGeolocationResult(position);
            var currLatLong = geo_loc.split(",");

            console.log(currLatLong[0]);
            console.log(currLatLong[1]);
            if ($("#latitude").val() != "" && $("#longitude").val() != "") {
                MaP_new.init("1", $("#latitude").val(), $("#longitude").val(), radius_pop, geo_address);
            } else {
                MaP_new.init("1", currLatLong[0], currLatLong[1], radius_pop, geo_address);
                $("#latitude").val(currLatLong[0]);
                $("#longitude").val(currLatLong[1]);
            }

        });


    },
    init: function (ele, latitude_pop, longitude_pop, radius_pop, address)
    {
        var lat;
        var lng;
        var geo_address = '';
        var radius;
        $('#location_popup').modal({
            backdrop: 'static',
            keyboard: false
        });
        //TODO: Check why error is coming .. Remove try catch if posssible .. or log error somewhere..
        try
        {
            lat = latitude_pop;
            lng = longitude_pop;
            geo_address = address;
            radius = radius_pop;
            lat = latitude_pop;
            lng = longitude_pop;

            var mapOptions = {
                center: new google.maps.LatLng(lat, lng),
                zoom: 15,
                mapTypeId: 'satellite'
            };
            MaP_new.map = new google.maps.Map(document.getElementById('mymap'),
                    mapOptions);
            var input = /** @type {HTMLInputElement} */(
                    document.getElementById('geo_address'));
            var autocomplete = new google.maps.places.Autocomplete(input);
//             MaP_new.map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
            autocomplete.bindTo('bounds', MaP_new.map);
            var infowindow = new google.maps.InfoWindow();
            var latLng = new google.maps.LatLng(lat, lng);
            var marker = new google.maps.Marker({
                map: MaP_new.map,
                position: latLng,
                draggable: true,
//                anchorPoint: new google.maps.Point(0, -29)
            });
            google.maps.event.addListener(marker, 'dragend', function ()
            {
                var pos = marker.getPosition();
                $("#latitude").val(pos.lat());
                $("#longitude").val(pos.lng());
            });


            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                infowindow.close();
                marker.setVisible(false);
                var place = autocomplete.getPlace();
                if (!place.geometry) {
                    return;
                }
                // If the place has a geometry, then present it on a map.
                if (place.geometry.viewport) {
                    MaP_new.map.fitBounds(place.geometry.viewport);
                } else {
                    MaP_new.map.setCenter(place.geometry.location);
                    MaP_new.map.setZoom(17);  // Why 17? Because it looks good.
                }
                marker.setPosition(place.geometry.location);
                marker.setVisible(true);
                $("#latitude").val(place.geometry.location.lat());
                $("#longitude").val(place.geometry.location.lng());
                MaP_new.setTimeZone();
                var address = '';
                if (place.address_components) {
                    address = [
                        (place.address_components[0] && place.address_components[0].short_name || ''),
                        (place.address_components[1] && place.address_components[1].short_name || ''),
                        (place.address_components[2] && place.address_components[2].short_name || '')
                    ].join(' ');
                }
                infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
                infowindow.open(MaP_new.map, marker);
            });

        } catch (e) {
        }
    }
};
$(document).ready(function () {
    // add multiple fields
    $(document).on('click', '.myimages', function () {
        var flag = confirm("Sure you want to delete?");
        if (flag) {
            var link = $(this);
            var mainid = $(this).attr('mainid');
            $.ajax({
                url: link.attr('data-url'),
                type: 'POST',
                success: function (response)
                {
//                    alert(mainid);
                    $('#image_' + mainid).remove();
                }
            });
        }

    });
    $(document).on('click', '.viewimages', function () {
        $("#detail_popup_body").html("");
        var main_id = $(this).attr('main_id');
        $.LoadingOverlay("show");
        $('#detail_popup').modal({
            backdrop: 'static',
            keyboard: false
        });
        $.ajax({
            type: "POST",
            url: global_urls + 'home/getAllImages',
            data: "qid=" + main_id,
            success: function (response)
            {
                $.LoadingOverlay("hide");
                var obj = JSON.parse(response);
                if (obj.error == "no") {
                    $("#detail_popup_body").html(obj.data);
                } else {
                    alert(obj.msg);
                }

            }
        });
    });
    $(document).on('click', '.showimages', function () {
        $("#detail_popup_body").html("");
        var main_id = $(this).attr('main_id');
        $.LoadingOverlay("show");
        $('#detail_popup').modal({
            backdrop: 'static',
            keyboard: false
        });
        $.ajax({
            type: "POST",
            url: global_urls + 'home/getimages',
            data: "qid=" + main_id,
            success: function (response)
            {
                $.LoadingOverlay("hide");
                var obj = JSON.parse(response);
                if (obj.error == "no") {
                    $("#detail_popup_body").html(obj.data);
                } else {
                    alert(obj.msg);
                }

            }
        });
    });
    $(document).on('click', '.show_detail', function () {
        $("#detail_popup_body").html("");
        var main_id = $(this).attr('id');
        $.LoadingOverlay("show");
        $('#detail_popup').modal({
            backdrop: 'static',
            keyboard: false
        });
        $.ajax({
            type: "POST",
            url: global_urls + 'home/getDetail',
            data: "qid=" + main_id,
            success: function (response)
            {
                $.LoadingOverlay("hide");
                var obj = JSON.parse(response);
                if (obj.error == "no") {
                    $("#detail_popup_body").html(obj.data);
                } else {
                    alert(obj.msg);
                }

            }
        });
    });
    $(document).on('click', '.googlemapview', function () {
        $('#mymap').html("");
        var main_id = $(this).attr('main_id');
        $.LoadingOverlay("show");
        $('#location_popup').modal({
            backdrop: 'static',
            keyboard: false
        });
        $.ajax({
            type: "POST",
            url: global_urls + 'home/googlemapview',
            data: "qid=" + main_id,
            success: function (response)
            {
                $.LoadingOverlay("hide");
                var obj = JSON.parse(response);
                console.log(obj);
                var lati = obj.data['latitude'];
                var lonngi = obj.data['longitude'];
                console.log(lati);
                console.log(lonngi);
                var mapOptionss = {
                    center: new google.maps.LatLng(parseFloat(lonngi), parseFloat(lati)),
                    zoom: 19,
                    mapTypeId: 'satellite'
                };
                var map = new google.maps.Map(document.getElementById('mymap'),
                        mapOptionss);
                var infowindow = new google.maps.InfoWindow();
                var latLng = new google.maps.LatLng(parseFloat(lonngi), parseFloat(lati));
                var marker = new google.maps.Marker({
                    map: map,
                    position: latLng,
                    draggable: false,
//                anchorPoint: new google.maps.Point(0, -29)
                });

            }
        });
    });
    $(document).on('click', '.allgooglemap', function () {
        $('#mymap').html("");

        $.LoadingOverlay("show");
        $('#location_popup').modal({
            backdrop: 'static',
            keyboard: false
        });
        $.ajax({
            type: "POST",
            url: global_urls + 'home/allgooglemap',
            success: function (response)
            {
                $.LoadingOverlay("hide");
                var obj = JSON.parse(response);
//                console.log(obj);
//                console.log(obj.data['latitude']);
                var locations = obj.data;
                console.log(locations);
                var map = new google.maps.Map(document.getElementById('mymap'), {
                    zoom: 12,
                    center: new google.maps.LatLng(25.405217, 55.513643),
                    mapTypeId: google.maps.MapTypeId.ROADMAP,

                });
                var infowindow = new google.maps.InfoWindow();
                var marker, i;
                for (i = 0; i < locations.length; i++) {
                    if (locations[i]['longitude'] != "" && locations[i]['latitude'] != "") {
                        marker = new google.maps.Marker({
                            position: new google.maps.LatLng(locations[i]['longitude'], locations[i]['latitude']),
                            map: map,
                            draggable: false,
                        });
                        var contentString = '<div class="show_detail" main_id="' + locations[i]['main_table_id'] + '"><a >' + locations[i]['area'] + " / " + locations[i]['building_name'] + '</a></div>';
                        google.maps.event.addListener(marker, 'click', (function (marker, i) {
                            return function () {
                                //     infowindow.setContent(locations[i]['area'] + " / " + locations[i]['building_name']);
                                //    infowindow.open(map, marker);
                                show_details(locations[i]['main_table_id']);
                            }
                        })(marker, i));
                    }

                }

            }
        });
    });
    $(document).on('click', '.deleteinfo', function () {
        var flag = confirm("هل تريد بالتأكيد حذف هذا السجل؟");
        if (flag) {
            var main_id = $(this).attr('main_id');
            $.LoadingOverlay("show");

            $.ajax({
                type: "POST",
                url: global_urls + 'home/deleteinfo',
                data: "qid=" + main_id,
                success: function (response)
                {
                    $.LoadingOverlay("hide");
                    var obj = JSON.parse(response);

                    if (obj.error == "no") {
                        $("#rowss_" + main_id).remove();
                        alert(obj.msg);
                    } else {
                        alert(obj.msg);
                    }



                }
            });
        }

    });
    $(document).on('click', '.add', function () {
        var html = '';
        $.ajax({url: global_urls + "home/content_of_building", success: function (result) {
                $('#item_table').append(result);
            }
        });
    });
    $(document).on('click', '.add2', function () {
        var html = '';
        $.ajax({url: global_urls + "home/name_of_participent", success: function (result) {
                $('#item_table2').append(result);
            }
        });
    });
    $(document).on('click', '.add3', function () {
        var html = '';
        $.ajax({url: global_urls + "home/mechanisms_in_inspection", success: function (result) {
                $('#item_table3').append(result);
            }
        });
    });
    $(document).on('click', '.remove2', function () {
        var flag = confirm('هل أنت متأكد أنك تريد حذف؟');
        if (flag) {
            var id = $(this).attr('id');
            $('#row2_' + id).remove();
        }
    });
    $(document).on('click', '.remove3', function () {
        var flag = confirm('هل أنت متأكد أنك تريد حذف؟');
        if (flag) {
            var id = $(this).attr('id');
            $('#row3_' + id).remove();
        }
    });
    $(document).on('click', '.remove', function () {
        var flag = confirm('هل أنت متأكد أنك تريد حذف؟');
        if (flag) {
            var id = $(this).attr('id');
            $('#row_' + id).remove();
        }
    });

    $('.datepicker').datepicker({
        format: 'mm/dd/yyyy',
        startDate: '-3d'
    });
    $('.datepicker').on('changeDate', function (ev) {
        $(this).datepicker('hide');
    });


});
function processGeolocationResult(position) {
    html5Lat = position.coords.latitude; //Get latitude
    html5Lon = position.coords.longitude; //Get longitude
    html5TimeStamp = position.timestamp; //Get timestamp
    html5Accuracy = position.coords.accuracy; //Get accuracy in meters
    return (html5Lat).toFixed(8) + ", " + (html5Lon).toFixed(8);
}
function show_details(main_id) {
    $("#detail_popup_body").html("");

    $.LoadingOverlay("show");
    $('#detail_popup').modal({
        backdrop: 'static',
        keyboard: false
    });
    $.ajax({
        type: "POST",
        url: global_urls + 'home/getDetail',
        data: "qid=" + main_id,
        success: function (response)
        {
            $.LoadingOverlay("hide");
            var obj = JSON.parse(response);
            if (obj.error == "no") {
                $("#detail_popup_body").html(obj.data);
            } else {
                alert(obj.msg);
            }

        }
    });
}