
function sendHeartbeat() {
    const isMobileDevice = /Mobi/.test(navigator.userAgent);
    let latitude, longitude;

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            position =>{
                latitude = position.coords.latitude;
                longitude = position.coords.longitude;
            }  );
    } else {

    }
    var currentPage = window.location.href;
    fetch('/heartbeat', {
        method: "post",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": $('input[name="_token"]').val()
        },
        body: JSON.stringify({
            ismobile: isMobileDevice,
            latitude: latitude,
            longitude: longitude,
            page: currentPage
        })


    })

}



setInterval(sendHeartbeat, 10000);