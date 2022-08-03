
        let mapOptions = {
            center: [52.36,21.11 ],
            zoom: 12
        }

        let map = L.map('map', mapOptions);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        let marker = L.marker([52.36,21.11]).addTo(map);

        marker.bindPopup("<b>Library!</b><br>Szczygla, 2, Marki.").openPopup();
