class DomHelper {
  // img of prod
  static createImage(attributes) {
    return this.createElement({
      tag: 'img',
      classList: ['basket-item-img'],
      attributes,     
    });
  }
  static createImageBox(children) {
    return this.createElement({
      tag: 'td',
      classList: ['td-box'],
      children,
      childrenAction: 'append',   
    });
  }



// name of prod
  static createNameProd(title) {
    return this.createElement({
      tag: 'span',
      classList: ['span-name'],
      textContent: title,
    });
  }
   static createNameBox(children) {
    return this.createElement({
      tag: 'td',
      classList: ['td-box-name'],
      children,
      childrenAction: 'append',   
    });
  }


// count
  static createImageEdit(handlers, textContent) {
    return this.createElement({
      tag: 'button',
      classList: ['minus-btn-basket'],  
      handlers,
      textContent, 
    });
  }
   static createCountProdInput(attributes) {
    return this.createElement({
      tag: 'input',
      classList: ['input-btn-basket'],
      attributes,      
    });
  }
  static createPlus(handlers, textContent) {
    return this.createElement({
      tag: 'button',
      classList: ['plus-btn-basket'],  
      handlers,
      textContent,  
    });
  }
  static createDeleteEdit(handlers, textContent) {
    return this.createElement({
      tag: 'button',
      classList: ['delete-btn-basket'],  
      handlers,
      textContent,  
    });
  }
  static createCountPredProdBox(children) {
    return this.createElement({
      tag: 'div',
      classList: ['input-group', 'btn-block'],
      children,
      childrenAction: 'append',   
    });
  }
  static createCountProdBox(children) {
    return this.createElement({
      tag: 'td',
      classList: ['quantity'],
      children,
      childrenAction: 'append',   
    });
  }

  // price
static createPrice(price) {
    return this.createElement({
      tag: 'div',
      classList: ['yyy'],
      textContent: price,
    });
  }
  static createPriceBox(children) {
    return this.createElement({
      tag: 'td',
      classList: ['price'],
      children,
      childrenAction: 'append',   
    });
  } 

  // total
  static createTotal(total) {
    return this.createElement({
      tag: 'td',
      classList: ['total'],
      textContent: total,
    });
  }


  // PROD_ITEM
  static createProdItem(attributes, children) {
    return this.createElement({
      tag: 'tr',
      classList: ['prod-item-tr'],     
      children,
      childrenAction: 'append',
      attributes,
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