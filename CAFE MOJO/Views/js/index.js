function fetchData() {
    let url = `php/fetch_best_sellers.php`;
    fetch(url)
        .then(response => response.json())
        .then(data => {
            const datas = data;
            console.log(datas)

            updateDisplay(datas)

        })
        .catch(error => console.error('Error fetching data:', error));
}

function updateDisplay(datas){
    const bestSellerContainer = document.querySelector(".menu__wrapper")
    bestSellerContainer.innerHTML = ''

    if(datas !== null){
        datas.forEach(data => {
       
            const menuCard = document.createElement("div")
            menuCard.className = "menu__card"
    
            menuCard.innerHTML = `
                <img src="../Resources/Images/Menus/${data.menu_category === 'food' ? 'Foods' : 'Drinks'}/${data.menu_image}" loading="lazy">
                <div class='menu__details'>
                    <h3>${data.menu_name}</h3>
                    <p>${data.menu_description}</p>
                    <span>${data.menu_price}k</span>
                </div>
            `
            
            bestSellerContainer.appendChild(menuCard)
    
        });
    } else{
        bestSellerContainer.innerHTML = `<p>There are no best seller currently!</p>`
    }

}

fetchData()