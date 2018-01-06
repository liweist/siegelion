import reducerCreator from '../reducerCreator.jsx';
import { 
    constantRequest, constantSuccess, constantFailure, 
    GET_PRODUCTS 
} from '../constants.jsx';

const defaultState = {
    isFetching: false
}

const productsService = (state = defaultState, action) => {
    return reducerCreator(state, action, [
        {name: GET_PRODUCTS, response: 'products'},
    ]);
}

export default productsService;