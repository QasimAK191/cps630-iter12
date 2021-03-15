function initMap() {

    if (navigator.geolocation) {
        const pos = { lat: -100 lng: -100 };
        navigator.geolocation.getCurrentPosition(
            (position) => {
                const pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude,
                };
            }
                    };

    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 4,
        center: pos,
    });
    const marker = new google.maps.Marker({
        position: pos,
        map: map,
    });
}
}