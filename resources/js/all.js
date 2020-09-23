// login-register

$( "#signUp" ).click(function() {
	$("#container").addClass("right-panel-active");
});

$( "#signIn" ).click(function() {
	$("#container").removeClass("right-panel-active");
});

// Navbar

$(function() {
    var header = $(".navbar-sabues");
  
    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
        if (scroll >= 30) {
            header.addClass("scrolled");
        } else {
            header.removeClass("scrolled");
        }
    });
  
});

// Map Modal para obtener coordenadas

$("#map").click(function() {
    $('#ModalMapPreview').locationpicker({
        radius:0,
        zoom:12,
        location: {
            latitude: 10.410478884277197,
            longitude: -66.96658550957031
        },
        enableAutocomplete: true,
        inputBinding: {
            latitudeInput: $('#ModalMapLat'),
            longitudeInput: $('#ModalMapLng'),
            locationNameInput: $('#ModalMapAddress'),
        },
        onchanged: function(currentLocation, radius, isMarkerDropped) {
            // $('#upn_coordinates').html($('#ModalMapLat').val());
            var lat =  $('#ModalMapLat').val();
            var lng = $('#ModalMapLng').val();
            document.getElementById('upn_coordinates').value = lat+','+lng;
        },
    });
});

$('#ModalMap').on('show.bs.modal', function() {
    $('#ModalMapPreview').locationpicker('autosize');
});