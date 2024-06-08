// JavaScript code to handle pagination
let currentPageFood = 1;
let currentPageDrink = 1;
const recordsPerPage = 8;
let totalPagesFood = 0;
let totalPagesDrink = 0;
let myCart = {};

// Function to fetch data for a specific page and category
function fetchData(pageNumber, category) {
    let url = `php/fetch.php?page=${pageNumber}&category=${category}`;
    fetch(url)
        .then(response => response.json())
        .then(data => {
            const records = data.records;
            if (category === 'food') {
                totalPagesFood = data.totalPages;
                displayData(records, 'food');
            } else {
                totalPagesDrink = data.totalPages;
                displayData(records, 'drink');
            }
        })
        .catch(error => console.error('Error fetching data:', error));
}

// Function to display data on the page
function displayData(records, category) {
    const section = document.querySelector(category === 'food' ? '.foods__section' : '.drinks__section');
    const foodContainer = document.querySelector(category === 'food' ? '.food' : '.drink')
    const drinkContainer = document.querySelector(category === 'drink' ? '.drink' : '.food')
    section.innerHTML = '';

    records.forEach(record => {
        let card = document.createElement("div");
        card.classList.add("card");

        let cardImageContainer = document.createElement("div");
        cardImageContainer.classList.add("menu__image");

        let cardImage = document.createElement("img");
        cardImage.src = `../Resources/Images/Menus/${record.menu_category === 'food' ? 'Foods' : 'Drinks'}/${record.menu_image}`;

        let descriptionOverlay = document.createElement("div");
        descriptionOverlay.classList.add("description__overlay");

        let description = document.createElement("p");
        description.textContent = record.menu_description;

        let menuHeader = document.createElement("div");
        menuHeader.classList.add("menu__header");

        let menuTitle = document.createElement("h3");
        menuTitle.textContent = record.menu_name;

        let menuPrice = document.createElement("p");
        let price = document.createElement("span");
        price.textContent = record.menu_price;

        let cardBtn = document.createElement("button");
        cardBtn.setAttribute("onclick", `addToCart(${record.id}, '${record.menu_name}', ${record.menu_price}, '${record.menu_category}', '${record.menu_image}')`)
        cardBtn.setAttribute("title", "Add to Cart");
        cardBtn.textContent = "+";

        cardImageContainer.appendChild(cardImage);
        cardImageContainer.appendChild(descriptionOverlay);
        descriptionOverlay.appendChild(description);

        menuHeader.appendChild(menuTitle);
        menuHeader.appendChild(menuPrice);
        menuPrice.appendChild(price);
        menuHeader.appendChild(cardBtn);

        card.appendChild(cardImageContainer);
        card.appendChild(menuHeader);

        section.appendChild(card);
    });

    updatePaginationControls(category);
}

// Function to update pagination controls
function updatePaginationControls(category) {
    let prevBtn, nextBtn, currentPage, totalPages;

    if (category === 'food') {
        prevBtn = document.getElementById('prevBtnFood');
        nextBtn = document.getElementById('nextBtnFood');
        currentPage = currentPageFood;
        totalPages = totalPagesFood;
    } else {
        prevBtn = document.getElementById('prevBtnDrink');
        nextBtn = document.getElementById('nextBtnDrink');
        currentPage = currentPageDrink;
        totalPages = totalPagesDrink;
    }

    if (currentPage <= 1) {
        prevBtn.disabled = true;
        prevBtn.classList.add('disabled');
    } else {
        prevBtn.disabled = false;
        prevBtn.classList.remove('disabled');
    }

    if (currentPage >= totalPages) {
        nextBtn.disabled = true;
        nextBtn.classList.add('disabled');
    } else {
        nextBtn.disabled = false;
        nextBtn.classList.remove('disabled');
    }
}


// Function to handle pagination navigation
function navigatePage(direction, category) {
    if (category === 'food') {
        if (direction === 'prev' && currentPageFood > 1) {
            currentPageFood--;
        } else if (direction === 'next' && currentPageFood < totalPagesFood) {
            currentPageFood++;
        }
        fetchData(currentPageFood, 'food');
    } else {
        if (direction === 'prev' && currentPageDrink > 1) {
            currentPageDrink--;
        } else if (direction === 'next' && currentPageDrink < totalPagesDrink) {
            currentPageDrink++;
        }
        fetchData(currentPageDrink, 'drink');
    }
}

function addToCart(id, name, price, category, image){
    if(myCart[`${name}`]){
        myCart[`${name}`].quantity++
    } else{
        myCart[`${name}`] = {"id": id, "name": name, "price": price, "category": category,"quantity": 1, "image": image}
    }
    console.log(myCart)
    updateCart()
}

function updateCart(){
    const cartContainer = document.querySelector(".cart__items")
    const totalPrice = document.querySelector(".total__price span")
    const paymentContainer = document.querySelector(".payment")
    const cartLink = document.getElementById("cartBtn")
    let isEmpty = true
    let total = 0
    cartContainer.innerHTML = ''

    for(let item in myCart){
        if(myCart.hasOwnProperty(item)){
            isEmpty = false
            paymentContainer.classList.add("active")
            cartLink.classList.add("active")
            const cartItem = myCart[item]
            total += cartItem.price * cartItem.quantity
            const cartDiv = document.createElement("div")
            cartDiv.className = "item"
            cartDiv.innerHTML = `
                <div class='item__left'>
                    <div class='item__image'>
                        <img src='../Resources/Images/Menus/${cartItem.category === 'food' ? 'Foods' : 'Drinks'}/${cartItem.image}' alt='${cartItem.name}' loading='lazy'>
                    </div>
                    <div class='item__details'>
                        <h4>${cartItem.name}</h4>
                        <p><span>${cartItem.price.toFixed(2)}</span>k</p>
                    </div>
                </div>
                <div class='item__center'>
                    <div class='quantity__action'>
                        <button onclick='changeQuantity("${cartItem.name}", -1)'>-</button>
                        <button onclick='changeQuantity("${cartItem.name}", 1)'>+</button>
                    </div>
                </div>
                <div class='item__right'>
                    <div class='quantity'>
                        <p><span>${cartItem.quantity}</span>x</p>
                    </div>
                </div>
            `
            cartContainer.appendChild(cartDiv)
        }
    }

    if(isEmpty){
        cartContainer.innerHTML = '<p class="cart__message">Your cart is empty</p>'
        paymentContainer.classList.remove("active")
        cartLink.classList.remove("active")
    }

    totalPrice.textContent = `${total.toFixed(2)}`
}

function changeQuantity(name, change){
    if(myCart[name]){
        myCart[name].quantity += change
        if(myCart[name].quantity <= 0){
            delete myCart[name]
        }
        updateCart()
    }
}

function checkout() {
    const tableName = document.getElementById("tableName").textContent
    const cartTotal = parseFloat(document.querySelector('.total span').innerText);
    const paymentAmount = parseFloat(document.querySelector('.payment input').value);
    const errorMessage = document.getElementById('errorMessage');

    if (paymentAmount >= cartTotal) {

        const data = {
            cartData: myCart,
            table: tableName
        }

        jsonData = JSON.stringify(data);

        // const cartData = JSON.stringify(myCart);
        
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "php/checkout.php", true);
        xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
                alert("Order successfully placed!");
                
                // Clear the cart after successful checkout
                for (const item in myCart) {
                    delete myCart[item];
                }
                updateCart();
            }
        };
        xhr.send(jsonData);
    } else {
        errorMessage.innerText = "Insufficient payment amount.";
    }
}

// Fetch initial data
fetchData(currentPageFood, 'food');
fetchData(currentPageDrink, 'drink');

// Add event listeners for pagination buttons
document.getElementById('prevBtnFood').addEventListener('click', () => navigatePage('prev', 'food'));
document.getElementById('nextBtnFood').addEventListener('click', () => navigatePage('next', 'food'));
document.getElementById('prevBtnDrink').addEventListener('click', () => navigatePage('prev', 'drink'));
document.getElementById('nextBtnDrink').addEventListener('click', () => navigatePage('next', 'drink'));

document.querySelectorAll('.card').forEach(card => {
    card.addEventListener('mouseover', () => {
        document.querySelectorAll('.card').forEach(otherCard => {
            if (otherCard !== card) {
                otherCard.style.opacity = '.6';
            }
        });
    });

    card.addEventListener('mouseout', () => {
        document.querySelectorAll('.card').forEach(otherCard => {
            otherCard.style.opacity = '1';
        });
    });
});