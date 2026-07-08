const silos = document.querySelector('.silos-prods')
const clean = document.querySelector('.clean-prods')
const feed = document.querySelector('.feed-prods')
const plant = document.querySelector('.plant-prods')
const fish = document.querySelector('.fish-prods')
const ferment = document.querySelector('.ferment-prods')



const setYurPage = () => {
    allProductsArray.forEach(prod => {
        const product = setProd(prod)
        if(prod.cath === 'clean') {
            clean.append(product)
        } if(prod.cath === 'feed') {
            feed.append(product)
        } if(prod.cath === 'plant') {
            plant.append(product)
        } if(prod.cath === 'fish') {
            fish.append(product)
        } if(prod.cath === 'silos') {
            silos.append(product)
        } if(prod.cath === 'ferment') {
            ferment.append(product)
        }        
    })
}

const setProd = (prod) => {
    // const iRefresh = YurHelperProd.createFaRefresh()
    // const iRefreshBox = YurHelperProd.createFaRefreshBox([iRefresh])
    // const iRefreshContainer = YurHelperProd.createFaRefreshContainer([iRefreshBox])
    // const iHeart = YurHelperProd.createFaHeart()
    // const iHeartBox = YurHelperProd.createFaHeartBox([iHeart])
    // const iHeartContainer = YurHelperProd.createFaHeartContainer([iHeartBox])

    // const productIconsBox = YurHelperProd.createProductIconTop([iRefreshContainer, iHeartContainer])

    const imageProd = YurHelperProd.createImage(
        [   
            {prop: 'src', value: prod.src},
            {prop: 'data-src', value: prod.src},
            {prop: 'alt', value: prod.title}
        ]
    )
    const linkToProd = YurHelperProd.createProductImgLink(
        [{prop: 'href', value: '#'}],
        [imageProd]
    )


    const price = YurHelperProd.createNewPriceBox('')
    const priceBox = YurHelperProd.createPriceCover([price])
    
    const titleLink = YurHelperProd.createProductTitleLink(
        [
            {prop: 'href', value: '#'},
            {prop: 'style', value: 'background: rgba(255, 217, 16, 0.6)'}
        ],
        prod.title
    )
    const titleBox = YurHelperProd.createPriceTitleBox([titleLink])

    const spanBuy = YurHelperProd.createSpan()
    const spanBuyBox = YurHelperProd.createBtnBuy([spanBuy])

    const divBuy = YurHelperProd.createBtnToCard()
    const inputBuy = YurHelperProd.createAddToCardInput( 
        [
            {prop: 'type', value: 'number'},
            {prop: 'value', value: '1'}
        ]
    )
    const addToCardBox = YurHelperProd.createAddToCardBox([divBuy, inputBuy])

    const prodItemCover = YurHelperProd.createProductItemCover([priceBox, titleBox, spanBuyBox, addToCardBox])


    const liInfo = YurHelperProd.createProductInfoItem(prod.description)
    const listInfo = YurHelperProd.createProductInfoList([liInfo])
    const infoBox = YurHelperProd.createProductInfoBox([listInfo])

    const prodItem = YurHelperProd.createProdItem(
        [
            {prop: 'id', value: prod.id}
        ],
        [ linkToProd, prodItemCover, infoBox]
    )

    const prodItemBox = YurHelperProd.createProdItemBox([prodItem])
    return prodItemBox
}

setYurPage();