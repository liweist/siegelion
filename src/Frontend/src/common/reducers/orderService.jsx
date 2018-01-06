import reducerCreator from '../reducerCreator.jsx';
import { 
    constantRequest, constantSuccess, constantFailure, 
    GET_ORDER_CURRENT, GET_ORDER, POST_ORDER, GET_ORDERS_OPEN, GET_ORDERS_PAID, GET_ORDERS_CLOSED
} from '../constants.jsx';


const orderService = (state, action) => {
    return reducerCreator(state, action, [
        GET_ORDER_CURRENT,
        GET_ORDER,
        {name: POST_ORDER, response: 'newOrder'},
        {name: GET_ORDERS_OPEN, response: 'openOrders'},
        {name: GET_ORDERS_PAID, response: 'paidOrders'},
        {name: GET_ORDERS_CLOSED, response: 'closedOrders'}
    ]);
}

export default orderService;