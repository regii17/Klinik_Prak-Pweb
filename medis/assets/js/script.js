document.addEventListener('DOMContentLoaded', function() {
    const jobOffers = document.getElementById('jobOffers');
    const poliFilter = document.getElementById('poliFilter');
    const sortOrder = document.getElementById('sortOrder');

    function renderTable(data) {
        jobOffers.innerHTML = '';
        data.forEach((item, index) => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${index + 1}</td>
                <td>${item.nama}</td>
                <td>${item.usia}</td>
                <td>${item.poli}</td>
                <td>${item.tanggal}</td>
                <td>${item.alamat}</td>
                <td><center>${item.antrian}</center></td>
            `;
            jobOffers.appendChild(row);
        });
    }

    function sortAndFilterData() {
        const selectedPoli = poliFilter.value;
        const selectedSortOrder = sortOrder.value;
        let filteredData = data;

        if (selectedPoli) {
            filteredData = data.filter(item => item.poli === selectedPoli);
        }

        if (selectedSortOrder === 'tanggal') {
            filteredData.sort((a, b) => {
                const dateA = new Date(a.tanggal);
                const dateB = new Date(b.tanggal);

                if (dateA < dateB) return -1;
                if (dateA > dateB) return 1;

                return a.antrian - b.antrian;
            });
        } else if (selectedSortOrder === 'nama') {
            filteredData.sort((a, b) => a.nama.localeCompare(b.nama));
        }

        renderTable(filteredData);
    }

    poliFilter.addEventListener('change', sortAndFilterData);
    sortOrder.addEventListener('change', sortAndFilterData);
    sortAndFilterData();
});
