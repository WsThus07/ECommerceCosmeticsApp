// @ts-nocheck
document.addEventListener('DOMContentLoaded', function() {
    const countrySelect = document.getElementById('countrySelect');

    // Fetch list of countries from Rest Countries API
    fetch('https://restcountries.com/v3.1/all')
        .then(response => response.json())
        .then(data => {
            data.forEach(country => {
                const option = document.createElement('option');
                option.value = country.name.common;
                option.textContent = country.name.common;
                countrySelect.appendChild(option);
            });
        })
        .catch(error => {
            console.error('Error fetching countries:', error);
        });
        
});
