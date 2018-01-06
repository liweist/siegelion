import { 
    constantRequest, constantSuccess, constantFailure,
    GET_CART, POST_CART
} from '../constants.jsx';

const defaultState = {
    isFetching: false
}

const cartService = (state = defaultState, action) => {
    switch (action.type) {
        //GET_CART
        case constantRequest(GET_CART):
            return {
                ...state,
                isFetching: false
            };
        case constantSuccess(GET_CART):
            return {
                ...state,
                cartitems: action.result.items,
                totalprice: action.result.totalprice,
                hascustomsitem: action.result.hascustomsitem,
                isFetching: true,
                receivedAt: Date.now()
            };
        case constantFailure(GET_CART):
            return {
                ...state,
                error: action.error,
                isFetching: true,
                receivedAt: Date.now()
            };
        //POST_CART
        case constantRequest(POST_CART):
            return {
                ...state,
                isFetching: false
            };
        case constantSuccess(POST_CART):
            return {
                ...state,
                result: action.result.result,
                cartitemCount: action.result.cartitemCount,
                isFetching: true,
                receivedAt: Date.now()
            };
        case constantFailure(POST_CART):
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

export default cartService;