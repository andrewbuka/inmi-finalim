class YurHelperProd {

    static createTopSale(lider) {
      return this.createElement({
        tag: 'span',
        classList: ['basket-item-sum'],
        textContent: lider,
      });
    }



    static createFaRefresh() {
      return this.createElement({
        tag: 'i',
        classList: ['fa', 'fa-refresh', 'refresh-prod'],
        attributes: [{prop: 'aria-hidden', value: 'true'}]
      });
    }
    static createFaRefreshBox(children) {
      return this.createElement({
        tag: 'div',     
        children,
        childrenAction: 'append',   
      });
    }
    static createFaRefreshContainer(children) {
      return this.createElement({
        tag: 'li',     
        children,
        childrenAction: 'append',   
      });
    }
    static createFaHeart() {
      return this.createElement({
        tag: 'i',
        classList: ['fa', 'fa-heart'],
        attributes: [{prop: 'aria-hidden', value: 'true'}]
      });
    }
    static createFaHeartBox(children) {
      return this.createElement({
        tag: 'div',     
        children,
        childrenAction: 'append',   
      });
    }
    static createFaHeartContainer(children) {
      return this.createElement({
        tag: 'li',     
        children,
        childrenAction: 'append',   
      });
    }
    static createProductIconTop(children) {
      return this.createElement({
        tag: 'ul',
        classList: ['product-icon-top'],
        children,
        childrenAction: 'append',   
      });
    }



    
    static createImage(attributes) {
      return this.createElement({
        tag: 'img',
        classList: ['lazy'],
        attributes,     
      });
    }
    static createProductImgLink(attributes, children) {
      return this.createElement({
        tag: 'a',     
        children,
        classList: ['product-img'],
        childrenAction: 'append',
        attributes,   
      });
    } 
    
    
    static createNewPriceBox(price) {
      return this.createElement({
        tag: 'div',
        classList: ['new-price'],
        textContent: price,         
      });
    }
    static createPriceCover(children) {
      return this.createElement({
        tag: 'div',
        classList: ['price-cover'],
        children,
        childrenAction: 'append',   
      });
    }

    static createProductTitleLink(attributes, prodName) {
      return this.createElement({
        tag: 'a',   
        classList: [],       
        attributes,
        textContent: prodName,   
      });
    }
    static createPriceTitleBox(children) {
      return this.createElement({
        tag: 'h6',
        classList: ['prod-title', 'prod-title-yur'],
        children,
        childrenAction: 'append',   
      });
    }

    static createSpan() {
      return this.createElement({
        tag: 'span',       
        textContent: 'калькулятор',
      });
    }
    static createBtnBuy(children) {
      return this.createElement({
        tag: 'div',
        classList: ['btn-buy', 'btn', 'btn-yur'],
        children,
        childrenAction: 'append',   
      });
    }

    static createAddToCardInput(attributes) {
      return this.createElement({
        tag: 'input',
        classList: ['add-to-card-input'],
        attributes,      
      });
    }
    static createBtnToCard(children) {
      return this.createElement({
        tag: 'div',
        classList: ['btn-to-card'],
        children,
        childrenAction: 'append',
        textContent: 'Добавить в корзину',   
      });
    }
    static createAddToCardBox(children) {
      return this.createElement({
        tag: 'div',
        classList: ['btn-to-card', 'none'],
        children,
        childrenAction: 'append',
           
      });
    }

    static createProductItemCover(children) {
      return this.createElement({
        tag: 'div',
        classList: ['product-item-cover'],
        children,
        childrenAction: 'append',           
      });
    }



    static createProductInfoItem(info) {
      return this.createElement({
        tag: 'li',
        textContent: info,       
      });
    }
    static createProductInfoList(children) {
      return this.createElement({
        tag: 'ul',
        classList: ['prod-list'],
        children,
        childrenAction: 'append',           
      });
    }
    static createProductInfoBox(children) {
      return this.createElement({
        tag: 'div',
        classList: ['prod-info'],
        children,
        childrenAction: 'append',           
      });
    }




    static createProdItem(attributes, children) {
        return this.createElement({
          tag: 'div',
          classList: ['product-item', 'product-item-yur'],     
          children,
          childrenAction: 'append',
          attributes,        
        });
      }
      
    static createProdItemBox(children) {
      return this.createElement({
        tag: 'div',
        classList: ['col-lg-13'],     
        children,
        childrenAction: 'append',        
      });
    }
  
  
  
  
      static createElement({
          tag,
          classList,
          attributes,
          textContent,
          handlers,
          children,
          childrenAction
      }) {
          const element = document.createElement(tag)
  
          if(classList?.length) {
              element.classList.add(...classList)
          }
  
          if(attributes?.length) {
              attributes.forEach(prop => {
                  element.setAttribute(prop.prop, prop.value)
              });
          }
  
          if(textContent) {
              element.textContent = textContent;
          }
  
          if(handlers?.length) {
              handlers.forEach(({event, handler}) => {
                  element.addEventListener(event, handler)
              })
          }
  
          if(children) {
              element[childrenAction](...children)
          }
  
          return element;
      }
  }