const prodCountBasket = document.querySelector('.count-prod')
const allProdBasket = document.querySelector('.t-body-basket')
const emptyBasket = document.querySelector('.empty-basket')
const basketFull = document.querySelector('.tttt')



const subtotalSum = document.querySelector('.subtotal-sum')
const totalSum = document.querySelector('.total-sum')

const formatBasketSum = value => Number(value) || 0

const updateProductTotal = prod => {
    const prodId = prod.getAttribute('id')
    const product = forAsyncBasket.find(item => item.id === prodId)
    const totalCell = prod.querySelector('.total')

    if (!product || !totalCell) {
        return
    }

    totalCell.textContent = `${formatBasketSum(+product.price * +product.count)} BYN`
}

let forAsyncBasket = [];
let isEdit = false;

const getData = () => {
    const data = JSON.parse(localStorage.getItem('order'));
    if(data && data.length !== 0) {
        emptyBasket.classList.add('none')
        basketFull.classList.remove('none')
        forAsyncBasket = data
        setCartCountBasket(forAsyncBasket)

        setBasket(forAsyncBasket)
    } else {
        emptyBasket.classList.remove('none')
        basketFull.classList.add('none')

    }
}

const setCartCountBasket = (products) => {
    let count = 0;
    let sum = 0;
    products.forEach(prod => {
        count = count + prod.count

        sum = sum + +prod.count*(+prod.price)
    })

    prodCountBasket.textContent = count
    subtotalSum.textContent = formatBasketSum(sum)
    totalSum.textContent = formatBasketSum(sum)

    if(!products.length) {
        emptyBasket.classList.remove('none')
        basketFull.classList.add('none')
    }
}

const setBasket = (products) => {
    allProdBasket.innerHTML = ''

    products.forEach(prod => {
        const prodImg = DomHelper.createImage([{ prop: 'src', value: prod.src }])
        const imgBox = DomHelper.createImageBox([prodImg])

        const prodLabel = DomHelper.createNameProd(prod.title)
        const labelBox = DomHelper.createNameBox([prodLabel])

        // count
        const minus = DomHelper.createImageEdit([{ event: 'click', handler: onMinus}], '-')
        const prodCountBasketInput = DomHelper.createCountProdInput([{prop: 'name', value: 'count' }, {prop: 'value', value: prod.count}])
        const plus = DomHelper.createPlus([{ event: 'click', handler: onPlus}], '+')
        const deleteBtn = DomHelper.createDeleteEdit([{ event: 'click', handler: onDeleteProd}], 'X')       
        const preProdBox = DomHelper.createCountPredProdBox([minus, prodCountBasketInput, plus, deleteBtn])
        const ProdBox = DomHelper.createCountProdBox([preProdBox])

        // price
        const price = DomHelper.createPrice(`${prod.price} BYN`)
        const priceBox = DomHelper.createPriceBox([price])

        // total
        const productTotalSum = formatBasketSum(+prod.price * +prod.count)
        const total = DomHelper.createTotal(`${productTotalSum} BYN`)



        const prodItem = DomHelper.createProdItem([{ prop: 'id', value: prod.id }], [imgBox, labelBox, ProdBox, priceBox, total])

        allProdBasket.append(prodItem)
    })
}

const onMinus = (event) => {
   const prod = event.target.closest('.prod-item-tr')
    const prodId = prod.getAttribute('id')
    const prodinput = prod.querySelector('.input-btn-basket')
    

    prodinput.value = +prodinput.value -1;
    

    if(+prodinput.value===0) {
        forAsyncBasket = forAsyncBasket.filter(item => item.id !== prodId)
        localStorage.setItem('order', JSON.stringify(forAsyncBasket));
        setCartCountBasket(forAsyncBasket)
        prod.remove()
    } else {
        forAsyncBasket = forAsyncBasket.map(item => {
            if(item.id === prodId) {
                return item = {...item, count: +prodinput.value}
            }

            return item
        })

        localStorage.setItem('order', JSON.stringify(forAsyncBasket));
        setCartCountBasket(forAsyncBasket)
        updateProductTotal(prod)
    }

}
const onPlus = (event) => {
   const prod = event.target.closest('.prod-item-tr')
    const prodId = prod.getAttribute('id')
    const prodinput = prod.querySelector('.input-btn-basket')
    

    prodinput.value = +prodinput.value +1;
    

    
        forAsyncBasket = forAsyncBasket.map(item => {
            if(item.id === prodId) {
                return item = {...item, count: +prodinput.value}
            }

            return item
        })

        localStorage.setItem('order', JSON.stringify(forAsyncBasket));
        setCartCountBasket(forAsyncBasket)
        updateProductTotal(prod)

}
const onDeleteProd = (event) => {
    const prod = event.target.closest('.prod-item-tr')
    const prodId = prod.getAttribute('id')


    forAsyncBasket = forAsyncBasket.filter(item => item.id !== prodId)
    localStorage.setItem('order', JSON.stringify(forAsyncBasket));
    setCartCountBasket(forAsyncBasket)
    prod.remove()

}

const onEdit = (event) => {
    const prod = event.target.closest('.prod-item')
    const prodId = prod.getAttribute('id')
    const edit = prod.querySelector('.basket-item-count-par-box')
    const editInput = prod.querySelector('.basket-item-count-input-box')
    if(!isEdit) {
        isEdit = true;
        edit.classList.add('none')
        editInput.classList.remove('none')
    }
}

const onExcept = (event) => {
    const prod = event.target.closest('.prod-item')
    const prodId = prod.getAttribute('id')
    const edit = prod.querySelector('.basket-item-count-par-box')
    const editValue = prod.querySelector('.basket-item-count-par')
    const editInput = prod.querySelector('.basket-item-count-input-box')
    const editInputValue = prod.querySelector('.basket-item-count-input')
    if(isEdit) {
        isEdit = false;
        edit.classList.remove('none')
        editInput.classList.add('none')

        forAsyncBasket = forAsyncBasket.map(item => {
            if(item.id === prodId) {
                return item = {...item, count: +editInputValue.value}
            }

            return item
        })

        localStorage.setItem('order', JSON.stringify(forAsyncBasket));
        setCartCountBasket(forAsyncBasket)

        editValue.textContent = `${editInputValue.value} шт`
    }
}










getData();




const shippingMethodInputs = document.querySelectorAll('input[name="shipping_method"]')
const shippingAddressBlock = document.querySelector('#simplecheckout_shipping_address')
const shippingAddressInput = document.querySelector('#shipping_address_address_1')
const shippingAddressRule = document.querySelector('[data-for="shipping_address_address_1"][data-rule="byLength"]')
const europochtaShippingValue = 'revship2.revship2'
const checkoutConfirmButton = document.querySelector('#simplecheckout_button_confirm')

const toggleShippingAddress = () => {
    if (!shippingAddressBlock || !shippingAddressInput) {
        return
    }

    const selectedShippingMethod = document.querySelector('input[name="shipping_method"]:checked')
    const isEuropochtaDelivery = selectedShippingMethod && selectedShippingMethod.value === europochtaShippingValue

    shippingAddressBlock.classList.toggle('none', !isEuropochtaDelivery)
    shippingAddressInput.required = isEuropochtaDelivery
    shippingAddressInput.disabled = !isEuropochtaDelivery
    shippingAddressInput.setAttribute('aria-required', String(isEuropochtaDelivery))

    if (shippingAddressRule) {
        shippingAddressRule.dataset.required = String(isEuropochtaDelivery)
    }

    if (!isEuropochtaDelivery) {
        shippingAddressInput.value = ''
    }

    if (shippingAddressRule) {
        shippingAddressRule.style.display = 'none'
    }
}

shippingMethodInputs.forEach(input => {
    input.addEventListener('change', toggleShippingAddress)
})

toggleShippingAddress()

const validateShippingAddress = (event) => {
    if (!shippingAddressInput || shippingAddressInput.disabled || shippingAddressInput.value.trim().length >= 3) {
        return
    }

    event.preventDefault()
    event.stopImmediatePropagation()

    if (shippingAddressRule) {
        shippingAddressRule.style.display = 'block'
    }

    shippingAddressInput.focus()
}

if (checkoutConfirmButton) {
    checkoutConfirmButton.addEventListener('click', validateShippingAddress)
}

if (shippingAddressInput) {
    shippingAddressInput.addEventListener('input', () => {
        if (shippingAddressRule && shippingAddressInput.value.trim().length >= 3) {
            shippingAddressRule.style.display = 'none'
        }
    })
}

const checkoutSummaryOverlay = document.querySelector('#checkout_summary_overlay')
const checkoutSummaryClose = document.querySelector('#checkout_summary_close')
const checkoutSummaryContent = document.querySelector('#checkout_summary_content')
const checkoutSummarySubmit = document.querySelector('#checkout_summary_submit')
const requiredCheckoutFields = [
    {
        input: document.querySelector('#customer_firstname'),
        validate: value => value.trim().length >= 1 && value.trim().length <= 32,
        message: 'Имя должно быть от 1 до 32 символов!'
    },
    {
        input: document.querySelector('#customer_email'),
        validate: value => /^[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+$/.test(value.trim()),
        message: 'Некорректный адрес электронной почты!'
    },
    {
        input: document.querySelector('#customer_telephone'),
        validate: value => value.trim().length >= 3 && value.trim().length <= 32,
        message: 'Телефон должен быть от 3 до 32 символов!'
    }
]

const escapeCheckoutHtml = value => String(value || '').replace(/[&<>'"]/g, char => ({
    '&': '&amp;',
    '<': '&lt;',
    '>': '&gt;',
    "'": '&#39;',
    '"': '&quot;'
}[char]))

const setCheckoutFieldError = (input, message, isVisible) => {
    if (!input) {
        return
    }

    input.classList.toggle('is-invalid', isVisible)
    const ruleGroup = document.querySelector(`.simplecheckout-rule-group[data-for="${input.id}"]`)
    const rule = ruleGroup ? ruleGroup.querySelector('.simplecheckout-rule') : null

    if (rule) {
        rule.textContent = message
        rule.style.display = isVisible ? 'block' : 'none'
    }
}

const getCheckedLabel = name => {
    const input = document.querySelector(`input[name="${name}"]:checked`)

    if (!input) {
        return ''
    }

    const label = document.querySelector(`label[for="${input.id}"]`)
    return label ? label.textContent.trim() : input.value
}

const getCheckoutData = () => {
    const selectedShippingMethod = document.querySelector('input[name="shipping_method"]:checked')
    const isDelivery = selectedShippingMethod && selectedShippingMethod.value === europochtaShippingValue

    return {
        firstname: document.querySelector('#customer_firstname')?.value.trim() || '',
        email: document.querySelector('#customer_email')?.value.trim() || '',
        telephone: document.querySelector('#customer_telephone')?.value.trim() || '',
        shipping: getCheckedLabel('shipping_method'),
        payment: getCheckedLabel('payment_method'),
        address: isDelivery ? (shippingAddressInput?.value.trim() || '') : '',
        comment: document.querySelector('#comment')?.value.trim() || '',
        total: totalSum?.textContent.trim() || '0',
        products: forAsyncBasket
    }
}

const validateCheckoutForm = () => {
    let firstInvalidInput = null
    let isValid = true

    requiredCheckoutFields.forEach(field => {
        if (!field.input) {
            return
        }

        const fieldIsValid = field.validate(field.input.value)
        setCheckoutFieldError(field.input, field.message, !fieldIsValid)

        if (!fieldIsValid) {
            isValid = false
            firstInvalidInput = firstInvalidInput || field.input
        }
    })

    const selectedShippingMethod = document.querySelector('input[name="shipping_method"]:checked')
    const shippingWarning = document.querySelector('#simplecheckout_shipping .simplecheckout-warning-block')
    const hasShippingMethod = Boolean(selectedShippingMethod)

    if (shippingWarning) {
        shippingWarning.style.display = hasShippingMethod ? 'none' : 'block'
    }

    if (!hasShippingMethod) {
        isValid = false
    }

    const selectedPaymentMethod = document.querySelector('input[name="payment_method"]:checked')
    const paymentWarning = document.querySelector('#simplecheckout_payment .simplecheckout-warning-block')
    const hasPaymentMethod = Boolean(selectedPaymentMethod)

    if (paymentWarning) {
        paymentWarning.style.display = hasPaymentMethod ? 'none' : 'block'
    }

    if (!hasPaymentMethod) {
        isValid = false
    }

    if (shippingAddressInput && !shippingAddressInput.disabled) {
        const addressIsValid = shippingAddressInput.value.trim().length >= 3
        setCheckoutFieldError(shippingAddressInput, 'Адрес должен быть от 3 до 128 символов!', !addressIsValid)

        if (!addressIsValid) {
            isValid = false
            firstInvalidInput = firstInvalidInput || shippingAddressInput
        }
    }

    if (!forAsyncBasket.length) {
        isValid = false
    }

    if (!isValid && firstInvalidInput) {
        firstInvalidInput.focus()
    }

    return isValid
}

const renderCheckoutSummary = data => {
    const products = data.products.map(product => `
        <li>
            <span>${escapeCheckoutHtml(product.title)} × ${escapeCheckoutHtml(product.count)}</span>
            <strong>${escapeCheckoutHtml(+product.price * +product.count)} BYN</strong>
        </li>
    `).join('')

    checkoutSummaryContent.innerHTML = `
        <div class="checkout-summary-section">
            <h4>Покупатель</h4>
            <ul class="checkout-summary-list">
                <li><span>ФИО</span><strong>${escapeCheckoutHtml(data.firstname)}</strong></li>
                <li><span>Email</span><strong>${escapeCheckoutHtml(data.email)}</strong></li>
                <li><span>Телефон</span><strong>${escapeCheckoutHtml(data.telephone)}</strong></li>
            </ul>
        </div>
        <div class="checkout-summary-section">
            <h4>Доставка и оплата</h4>
            <ul class="checkout-summary-list">
                <li><span>Доставка</span><strong>${escapeCheckoutHtml(data.shipping)}</strong></li>
                ${data.address ? `<li><span>Адрес</span><strong>${escapeCheckoutHtml(data.address)}</strong></li>` : ''}
                <li><span>Оплата</span><strong>${escapeCheckoutHtml(data.payment)}</strong></li>
                ${data.comment ? `<li><span>Комментарий</span><strong>${escapeCheckoutHtml(data.comment)}</strong></li>` : ''}
            </ul>
        </div>
        <div class="checkout-summary-section">
            <h4>Товары</h4>
            <ul class="checkout-summary-products">${products}</ul>
            <div class="checkout-summary-total"><span>Всего</span><strong>${escapeCheckoutHtml(data.total)} BYN</strong></div>
        </div>
    `
}

const openCheckoutSummary = () => {
    if (!checkoutSummaryOverlay) {
        return
    }

    renderCheckoutSummary(getCheckoutData())
    checkoutSummaryOverlay.classList.add('is-active')
    checkoutSummaryOverlay.setAttribute('aria-hidden', 'false')
    document.body.style.overflow = 'hidden'
}

const closeCheckoutSummary = () => {
    if (!checkoutSummaryOverlay) {
        return
    }

    checkoutSummaryOverlay.classList.remove('is-active')
    checkoutSummaryOverlay.setAttribute('aria-hidden', 'true')
    document.body.style.overflow = ''
}

if (checkoutConfirmButton) {
    checkoutConfirmButton.addEventListener('click', event => {
        event.preventDefault()
        event.stopImmediatePropagation()

        if (validateCheckoutForm()) {
            openCheckoutSummary()
        }
    })
}

requiredCheckoutFields.forEach(field => {
    if (field.input) {
        field.input.addEventListener('input', () => setCheckoutFieldError(field.input, field.message, false))
    }
})

if (checkoutSummaryClose) {
    checkoutSummaryClose.addEventListener('click', closeCheckoutSummary)
}

if (checkoutSummaryOverlay) {
    checkoutSummaryOverlay.addEventListener('click', event => {
        if (event.target === checkoutSummaryOverlay) {
            closeCheckoutSummary()
        }
    })
}

const resetCheckoutOrder = () => {
    forAsyncBasket = []
    localStorage.removeItem('order')
    allProdBasket.innerHTML = ''
    setCartCountBasket(forAsyncBasket)
    document.querySelector('#customer_firstname').value = ''
    document.querySelector('#customer_email').value = ''
    document.querySelector('#customer_telephone').value = ''
    document.querySelector('#comment').value = ''

    if (shippingAddressInput) {
        shippingAddressInput.value = ''
    }
}

const sendCheckoutOrder = async event => {
    event.preventDefault()

    if (!validateCheckoutForm() || !window.inmiBasketOrder) {
        return
    }

    const data = getCheckoutData()
    const formData = new FormData()

    formData.append('action', 'inmi_send_order')
    formData.append('nonce', window.inmiBasketOrder.nonce)
    formData.append('firstname', data.firstname)
    formData.append('email', data.email)
    formData.append('telephone', data.telephone)
    formData.append('shipping', data.shipping)
    formData.append('payment', data.payment)
    formData.append('address', data.address)
    formData.append('comment', data.comment)
    formData.append('total', data.total)
    formData.append('products', JSON.stringify(data.products))

    checkoutSummarySubmit.disabled = true
    checkoutSummarySubmit.textContent = 'Отправляем...'

    try {
        const response = await fetch(window.inmiBasketOrder.ajaxUrl, {
            method: 'POST',
            body: formData,
            credentials: 'same-origin'
        })
        const result = await response.json()

        if (!response.ok || !result.success) {
            throw new Error(result.data?.message || 'Не удалось отправить заказ. Попробуйте позже.')
        }

        closeCheckoutSummary()
        resetCheckoutOrder()
        alert(result.data?.message || 'Спасибо! Ваш заказ успешно отправлен.')
    } catch (error) {
        alert(error.message)
    } finally {
        checkoutSummarySubmit.disabled = false
        checkoutSummarySubmit.textContent = 'Заказать'
    }
}

if (checkoutSummaryOverlay) {
    checkoutSummaryOverlay.addEventListener('submit', sendCheckoutOrder)
}

document.addEventListener('keydown', event => {
    if (event.key === 'Escape') {
        closeCheckoutSummary()
    }
})
