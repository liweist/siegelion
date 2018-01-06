import { 
    constantRequest, constantSuccess, constantFailure, 
    GET_PRODUCT 
} from '../constants.jsx';

const defaultState = {
    isFetching: false
}

const productService = (state = defaultState, action) => {
    switch (action.type) {
        case constantRequest(GET_PRODUCT):
            return {
                ...state,
                isFetching: false
            };
        case constantSuccess(GET_PRODUCT):
            return {
                ...state,
                product: action.result.product,
                cartitemCount: action.result.cartitemCount,
                isFetching: true,
                receivedAt: Date.now()
            };
        case constantFailure(GET_PRODUCT):
            return {
                ...state,
                error: action.error,
                isFetching: true,
                receivedAt: Date.now()
            };
        default:
            return state;
    }
}

export default productService;