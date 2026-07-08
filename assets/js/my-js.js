const btnBuy = document.querySelectorAll('.btn-buy')
const refreshProd = document.querySelectorAll('.refresh-prod')
const toCart = document.querySelectorAll('.btn-to-card')
const prodCount = document.querySelector('.count-prod')
const singleFizProduct = document.querySelector('.single-fiz-product')

const card = document.querySelectorAll('.prod-container')


let forAsync = []

const getSavedOrder = () => {
    try {
        return JSON.parse(localStorage.getItem('order')) || []
    } catch (error) {
        return []
    }
}

const normalizeCount = (value) => {
    const count = parseInt(value, 10)

    return count > 0 ? count : 1
}

const addProductToOrder = (productId, count) => {
    const productInfo = fizProductArray.find((arrayItem) => productId === arrayItem.id)

    if (!productInfo) {
        return null
    }

    let update = false
    const normalizedCount = normalizeCount(count)
    const productForOrder = {...productInfo, count: normalizedCount}

    if (forAsync.length !== 0) {
        forAsync = forAsync.map(item => {
            if(productForOrder.id === item.id) {
                update = true

                return {...item, count: productForOrder.count + item.count}
            }

            return item
        })

        if (!update) {
            forAsync.push(productForOrder)
        }
    } else {
        forAsync.push(productForOrder)
    }

    localStorage.setItem("order", JSON.stringify(forAsync));
    setCartCount(forAsync);

    return productForOrder
}

const setFeatures = () => {
    const data = getSavedOrder()
    if(data.length ) {
        forAsync = data;
        setCartCount(forAsync);

        setCard(forAsync)
        setSingleProductState(forAsync)

    }   

}

const onBuyClick = () => {
    btnBuy.forEach((buyItem) => {
        buyItem.addEventListener('click', (event) => {
 
            const product = event.target.closest('.product-item')
            
            const addToCardBox = product.querySelector('.add-to-card-box');

            addToCardBox.classList.remove('none')
            buyItem.classList.add('none')
        })
    })
}

const onRefresh = () => {
    refreshProd.forEach((refreshItem) => {
        refreshItem.addEventListener('click', (event) => {
           
            const product = event.target.closest('.product-item')
            
            const addToCardBox = product.querySelector('.add-to-card-box');
            const buyBtn = product.querySelector('.btn-buy');
            const countInput = product.querySelector('.add-to-card-input');
            

            addToCardBox.classList.add('none')
            buyBtn.classList.remove('none')
            countInput.value = 1
        })
    })
}

const onToCart = () => {
    toCart.forEach(btn => {
        btn.addEventListener('click', (event) => {
            const product = event.target.closest('.product-item')
            const productId = product.getAttribute('id');
            const countInput = product.querySelector('.add-to-card-input')
            const count = normalizeCount(countInput.value)

            const productForOrder = addProductToOrder(productId, count)

            if (!productForOrder) {
                return
            }

            const addToCardBox = product.querySelector('.add-to-card-box');
            const buyBtn = product.querySelector('.btn-buy');
            const inBasketP = product.querySelector('.in-basket-p')
            const inBasketSpan = product.querySelector('.in-basket-span')
            

            addToCardBox.classList.add('none')
            buyBtn.classList.add('none')
            inBasketP.classList.remove('none')
            inBasketSpan.textContent = count

            countInput.value = 1
            
        })
    })
}

const setCartCount = (products) => {
    if (!prodCount) {
        return
    }

    let count = 0;
    products.forEach(prod => {
        count = count + prod.count
    })

    prodCount.textContent = count
}

const setCard = (order) => {
    card.forEach(item => {
        const cardId = item.querySelector('.product-item').getAttribute('id')
        order.forEach(itemOrder => {
            if(cardId === itemOrder.id) {
                const addToBasket = item.querySelector('.btn-buy')
                const addToCardBox = item.querySelector('.add-to-card-box')
                const inBasketP = item.querySelector('.in-basket-p')
                 const inBasketSpan = item.querySelector('.in-basket-span')
                addToBasket.classList.add('none');
                addToCardBox.classList.add('none');
                inBasketP.classList.remove('none');

                inBasketSpan.textContent =itemOrder.count           
            }
        })

    })
}

const getSingleProductBasketText = () => {
    let inBasketText = singleFizProduct.querySelector('.in-basket-p')

    if (!inBasketText) {
        inBasketText = document.createElement('span')
        inBasketText.classList.add('in-basket-p', 'none')
        inBasketText.innerHTML = 'В корзине <span class="in-basket-span">1</span> шт.'
        singleFizProduct.querySelector('.btn-wishlist').insertAdjacentElement('afterend', inBasketText)
    }

    return inBasketText
}

const setSingleProductState = (order) => {
    if (!singleFizProduct) {
        return
    }

    const productId = singleFizProduct.dataset.productId
    const orderItem = order.find(item => item.id === productId)

    if (orderItem) {
        const inBasketText = getSingleProductBasketText()
        inBasketText.querySelector('.in-basket-span').textContent = orderItem.count
        inBasketText.classList.remove('none')
    }
}

const onSingleProductToCart = () => {
    if (!singleFizProduct) {
        return
    }

    const button = singleFizProduct.querySelector('.btn-wishlist')
    const countInput = singleFizProduct.querySelector('.input-insingle-prod')

    if (!button || !countInput) {
        return
    }

    button.addEventListener('click', (event) => {
        event.preventDefault()

        const count = normalizeCount(countInput.value)
        const productForOrder = addProductToOrder(singleFizProduct.dataset.productId, count)

        if (!productForOrder) {
            return
        }

        const inBasketText = getSingleProductBasketText()
        const orderItem = forAsync.find(item => item.id === productForOrder.id)

        inBasketText.querySelector('.in-basket-span').textContent = orderItem ? orderItem.count : count
        inBasketText.classList.remove('none')
        countInput.value = 1
    })
}



setFeatures();
onBuyClick();
onRefresh();
onToCart();
onSingleProductToCart();
