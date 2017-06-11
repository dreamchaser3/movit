function searchMovie(tagId, vueObj) {
    console.log($('#' + tagId).val())
    fetch('/movie/find/' + $('#' + tagId).val(), {
        method: 'get'
    })
        .then(function (result) {
            return result.json()
        })
        .then(function (result) {
            console.log(result)
            vueObj.list = result
        })
    return false;
}
function codeAddress(address, cb) {
    console.log(address)
    var geocoder = new google.maps.Geocoder;
    geocoder.geocode({'address': address}, function (results, status) {
        if (status == 'OK') {
            cb(results.map(item => {
                    return {
                        address: item.formatted_address,
                        coord: item.geometry.location
                    }
                }), results[0].geometry.location
        )
        } else {
            alert('Geocode was not successful for the following reason: ' + status);
        }
    });
}
(function ($) {
    $(function () {

        $('.button-collapse').sideNav();
        $('.parallax').parallax();

    }); // end of document ready
})(jQuery); // end of jQuery name space