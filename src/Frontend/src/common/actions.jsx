import promiseRequest from './promiseRequest.jsx';
import { constantsCreator, 
    GET_CUSTOMER,
    GET_PRODUCTS, 
    GET_PRODUCT, 
    GET_CART, POST_CART,
    GET_CARTITEM, PATCH_CARTITEM, DELETE_CARTITEM,
    GET_ORDER_CURRENT, GET_ORDER, POST_ORDER,
    GET_CURRENT_ADDRESS,
    GET_ADDRESSES,
    GET_ADDRESS, POST_ADDRESS, PUT_ADDRESS,
    GET_LOGISTIC_FEE,
    POST_USE_ADDRESS,
    POST_WXPAY,
    GET_ORDERS_OPEN, GET_ORDERS_PAID, GET_ORDERS_CLOSED,
    GET_LOGISTIC,
    GET_LOGISTICT_TRACES,
    POST_CUSTOMS
} from './constants.jsx';

export const customer = () => ({
    types: constantsCreator(GET_CUSTOMER),
    promise: promiseRequest('//api.couqiao.me/user')
});

export const products = () => ({
    types: constantsCreator(GET_PRODUCTS),
    promise: promiseRequest('//api.couqiao.me/products')
});

export const product = (id) => ({
    types: constantsCreator(GET_PRODUCT),
    promise: promiseRequest(`//api.couqiao.me/product/${id}`)
});

export const cartitems = () => ({
    types: constantsCreator(GET_CART),
    promise: promiseRequest('//api.couqiao.me/cart')
});

export const addCartitem = (productid, quantity, sku) => ({
    types: constantsCreator(POST_CART),
    promise: promiseRequest('//api.couqiao.me/cart', {
        method: 'POST',
        body: JSON.stringify({
            productid: productid, 
            quantity: quantity,
            sku: sku
        })
    })
});

export const cartitem = (cartitemid) => ({
    types: constantsCreator(GET_CARTITEM),
    promise: promiseRequest(`//api.couqiao.me/cart/${cartitemid}`)
});

export const updateCartitem = (cartitemid, quantity) => ({
    types: constantsCreator(PATCH_CARTITEM),
    promise: promiseRequest(`//api.couqiao.me/cart/${cartitemid}`, {
        method: 'PATCH',
        body: JSON.stringify({
            quantity: quantity
        })
    })
});

export const removeCartitem = (cartitemid) => ({
    types: constantsCreator(DELETE_CARTITEM),
    promise: promiseRequest(`//api.couqiao.me/cart/${cartitemid}`, {
        method: 'DELETE'
    })
});

export const currentOrder = () => ({
    types: constantsCreator(GET_ORDER_CURRENT),
    promise: promiseRequest('//api.couqiao.me/order')
});

export const order = (orderid) => ({
    types: constantsCreator(GET_ORDER),
    promise: promiseRequest(`//api.couqiao.me/order/${orderid}`)
});

export const createOrder = () => ({
    types: constantsCreator(POST_ORDER),
    promise: promiseRequest('//api.couqiao.me/order', {
        method: 'POST'
    })
});

export const currentAddress = () => ({
    types: constantsCreator(GET_CURRENT_ADDRESS),
    promise: promiseRequest(`//api.couqiao.me/user/address`)
});

export const addresses = () => ({
    types: constantsCreator(GET_ADDRESSES),
    promise: promiseRequest(`//api.couqiao.me/user/addresses`)
});

export const address = (addressid) => ({
    types: constantsCreator(GET_ADDRESS),
    promise: promiseRequest(`//api.couqiao.me/user/address/${addressid}`)
});

export const updateAddress = (addressid, address) => ({
    types: constantsCreator(PUT_ADDRESS),
    promise: promiseRequest(`//api.couqiao.me/user/address/${addressid}`, {
        method: 'PUT',
        body: JSON.stringify({
            address: address
        })
    })
});

export const useAddress = (addressid) => ({
    types: constantsCreator(POST_USE_ADDRESS),
    promise: promiseRequest(`//api.couqiao.me/user/use/address/${addressid}`, {
        method: 'POST'
    })
});

export const addAddress = (address) => ({
    types: constantsCreator(POST_ADDRESS),
    promise: promiseRequest(`//api.couqiao.me/user/address`, {
        method: 'POST',
        body: JSON.stringify({
            address: address
        })
    })
});

export const pay = (gateway) => ({
    types: constantsCreator(POST_WXPAY),
    promise: promiseRequest(`//api.couqiao.me/pay/${gateway}`, {
        method: 'POST'
    })
});

export const openOrders = () => ({
    types: constantsCreator(GET_ORDERS_OPEN),
    promise: promiseRequest('//api.couqiao.me/orders/open')
});

export const paidOrders = () => ({
    types: constantsCreator(GET_ORDERS_PAID),
    promise: promiseRequest('//api.couqiao.me/orders/paid')
});

export const closedOrders = () => ({
    types: constantsCreator(GET_ORDERS_CLOSED),
    promise: promiseRequest('//api.couqiao.me/orders/closed')
});

export const logistic = (logisticid) => ({
    types: constantsCreator(GET_LOGISTIC),
    promise: promiseRequest(`//api.couqiao.me/logistic/${logisticid}`)
});

export const logisticTraces = (logisticid) => ({
    types: constantsCreator(GET_LOGISTICT_TRACES),
    promise: promiseRequest(`//api.couqiao.me/logistic/${logisticid}/trace`)
});

export const customs = (name, personalid) => ({
    types: constantsCreator(POST_CUSTOMS),
    promise: promiseRequest('//api.couqiao.me/user/customs', {
        method: 'POST',
        body: JSON.stringify({
            name: name,
            personalid: personalid
        })
    })
});