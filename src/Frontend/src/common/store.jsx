import { createStore, applyMiddleware, combineReducers } from 'redux';
import promiseMiddleware from './promiseMiddleware.jsx';

import customerService from './reducers/customerService.jsx';
import productsService from './reducers/productsService.jsx';
import productService from './reducers/productService.jsx';
import cartService from './reducers/cartService.jsx';
import cartitemService from './reducers/cartitemService.jsx';
import orderService from './reducers/orderService.jsx';
import logisticService from './reducers/logisticService.jsx';
import paymentService from './reducers/paymentService.jsx';

import { composeWithDevTools } from 'redux-devtools-extension';

const rootReducer = combineReducers({
    customerService,
    productsService,
    productService,
    cartService,
    cartitemService,
    orderService,
    logisticService,
    paymentService
});

export default createStore(
    rootReducer, 
    composeWithDevTools(
        applyMiddleware(promiseMiddleware)
    )
);