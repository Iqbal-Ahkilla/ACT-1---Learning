<?php

if(isset($_GET["table"])){
    $table = htmlspecialchars($_GET["table"]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="shortcut icon" href="../Resources/Icons/Java icon bg white.png" type="image/x-icon">
    <link rel="stylesheet" href="css/design.css">
    <title>CAFE MOJO | Order</title>
</head>
<body>

    <header>
        <div class="header">
            <h1>ORDER MENU</h1>
            <ul>
                <li id="cartBtn" class="cart__link">
                    Cart
                    <i class="fa-solid fa-cart-shopping"></i>
                </li>
            </ul>

            <div class="cart">
                <div class="cart__heading">
                    <h1>CART</h1>
                    <div class="closeCart"><i class="fa-solid fa-xmark"></i></div>
                </div>
                <div class="cart__items">
                    <p class="cart__message">Your cart is empty!</p>
                    <!-- <div class="item">
                        <div class="item__left">
                            <div class="item__image">
                                <img src="Pictures/Pin/c5f098d8a634c99b6bb6900c60bdeaef.jpg" alt="" loading="lazy" loading="lazy">
                            </div>
                            <div class="item__details">
                                <h4>Item Title</h4>
                                <p><span>10</span>k</p>
                            </div>
                        </div>
                        <div class="item__center">
                            <div class="quantity__action">
                                <button>-</button>
                                <button>+</button>
                            </div>
                        </div>
                        <div class="item__right">
                            <div class="quantity">
                                <p><span>2</span>x</p>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="total">
                    <h3 class="total__heading">TOTAL</h3>
                    <p class="total__price"><span>0.00</span>k</p>
                </div>
                <div class="payment">
                    <input type="number" name="pay" min="0" placeholder="Enter your money">
                    <button type="submit" onclick="checkout()">Pay Order</button>
                </div>
                <p id="errorMessage"></p>
            </div>

        </div>
    </header>

    <main>
        <section class="menuSection">
            
            <div class="menu__categories">
                <span id="tableName" style="color: #fff;"><?= $table ?></span>
                <h3>Choose Menu Categories</h3>
                <ul>
                    <li class="active">Foods</li>
                    <li>Drinks</li>
                </ul>
            </div>

            <div class="food active">
                <div class="foods__section active">
                </div>
                <div class="pagination food__pagination active">
                    <button id="prevBtnFood">Prev</button>
                    <button id="nextBtnFood">Next</button>
                </div>
            </div>

            <div class="drink">
                <div class="drinks__section">
                    <!-- <div class="card">
                        <div class="menu__image">
                            <img src="Drink template image.jpg" alt="" loading="lazy">
                            <div class="description__overlay">
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere modi mollitia dignissimos? Amet dignissimos laudantium autem dolorum quod?
                                </p>
                            </div>
                        </div>
                        <div class="menu__header">
                            <h3>Menu Title</h3>
                            <p><span>18</span>k</p>
                            <button title="Add to Cart">+</button>
                        </div>
                    </div> -->
                </div>
                <div class="pagination drink__pagination">
                    <button id="prevBtnDrink">Prev</button>
                    <button id="nextBtnDrink">Next</button>
                </div>
            </div>
        
        </section>
    </main>

    <div class="scrollUp" onclick="scrollUp()">
        <i class="fa-solid fa-arrow-up"></i>
    </div>

    <script>
        const navbar = document.querySelector(".header")
        const lists = document.querySelectorAll(".menu__categories li")
        const cartBtn = document.getElementById("cartBtn")
        const cart = document.querySelector(".cart")
        const closeCartBtn = document.querySelector(".closeCart") 
        const foodContainer = document.querySelector(".food")
        const drinkContainer = document.querySelector(".drink")
        const foodSection = document.querySelector(".foods__section")
        const drinkSection = document.querySelector(".drinks__section")
        const foodPagination = document.querySelector(".food__pagination")
        const drinkPagination = document.querySelector(".drink__pagination")
        const scrollUpBtn = document.querySelector(".scrollUp")
        const headerLink = document.querySelector(".header li")

        function scrollUp(){
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            })
        }

        window.addEventListener("scroll", () => {
            scrollUpBtn.classList.toggle("active", window.scrollY > 50)
        })

        window.addEventListener("scroll", () => {
            navbar.classList.toggle("scrolled", window.scrollY > 60)
        })

        lists.forEach(list => {
            list.addEventListener("click", e => {
            lists.forEach(l => { l.classList.remove("active") })

                list.classList.add("active")
                if(e.target.textContent == "Foods"){
                    foodContainer.classList.add("active")
                    drinkContainer.classList.remove("active")

                    foodSection.classList.add("active")
                    drinkSection.classList.remove("active")

                    foodPagination.classList.add("active")
                    drinkPagination.classList.remove("active")
                } else if(e.target.textContent == "Drinks"){
                    drinkContainer.classList.add("active")
                    foodContainer.classList.remove("active")

                    drinkSection.classList.add("active")
                    foodSection.classList.remove("active")

                    drinkPagination.classList.add("active")
                    foodPagination.classList.remove("active")
                }
                
            })
        })

        cartBtn.addEventListener("click", () => {
            cart.classList.toggle("active")
        })

        closeCartBtn.addEventListener("click", () => {
            cart.classList.toggle("active")
        })
        
    </script>
    <script src="js/data.js"></script>
</body>
</html>