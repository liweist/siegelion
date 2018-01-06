import reducerCreator from '../reducerCreator.jsx';
import { 
    GET_CURRENT_ADDRESS, GET_ADDRESS, POST_ADDRESS, PUT_ADDRESS,
    GET_ADDRESSES, 
    POST_USE_ADDRESS, 
    GET_LOGISTIC,
    GET_LOGISTICT_TRACES
} from '../constants.jsx';

const logisticService = (state, action) => {
    return reducerCreator(state, action, [
        POST_USE_ADDRESS,
        {name: GET_CURRENT_ADDRESS, response: 'addressAndFee'},
        {name: GET_ADDRESSES, response: 'addresses'},
        {name: GET_ADDRESS, response: 'address'},
        {name: POST_ADDRESS, response: 'postAddressResult'},
        {name: PUT_ADDRESS, response: 'putAddressResult'},
        {name: GET_LOGISTIC, response: 'logisticAndOrder'},
        {name: GET_LOGISTICT_TRACES, response: 'logisticTraces'}
    ]);
}

export default logisticService;