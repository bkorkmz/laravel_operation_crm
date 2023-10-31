    setInterval(sendHeartbeat, 10000);
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
        // Kullanıcının bulunduğu sayfa URL'sini alın
        var currentPage = window.location.href;

        // Sunucuya göndermek istediğiniz bilgileri hazırlayın
        var data = {
            page: currentPage,
            ismobile:isMobileDevice,
            latitude:latitude,
            longitude:longitude,
            
            
        };
        
        fetch("api/heartbeat", {
            method: "post",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(data)
        })
           
    }
