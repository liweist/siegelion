import { 
    constantRequest, constantSuccess, constantFailure, 
    GET_CARTITEM, PATCH_CARTITEM, DELETE_CARTITEM
} from '../constants.jsx';

const defaultState = {
    isFetching: false
}

const cartitemService = (state = defaultState, action) => {
    switch (action.type) {
        //GET_CARTITEM
        case constantRequest(GET_CARTITEM):
            return {
                ...state,
                isFetching: false
            };
        case constantSuccess(GET_CARTITEM):
            return {
                ...state,
                product: action.result.product,
                cartitemid: action.result.cartitemid,
                quantity: action.result.quantity,
                isFetching: true,
                receivedAt: Date.now()
            };
        case constantFailure(GET_CARTITEM):
            return {
                ...state,
                error: action.error,
                isFetching: true,
                receivedAt: Date.now()
            };
        //PATCH_CARTITEM
        case constantRequest(PATCH_CARTITEM):
            return {
                ...state,
                isFetching: false
            };
        case constantSuccess(PATCH_CARTITEM):
            return {
                ...state,
                result: action.result.result,
                cartitems: action.result.items,
                totalprice: action.result.totalprice,
                isFetching: true,
                receivedAt: Date.now()
            };
        case constantFailure(PATCH_CARTITEM):
            return {
                ...state,
                error: action.error,
                isFetching: true,
                receivedAt: Date.now()
            };
        //DELETE_CARTITEM
        case constantRequest(DELETE_CARTITEM):
            return {
                ...state,
                isFetching: false
            };
        case constantSuccess(DELETE_CARTITEM):
            return {
                ...state,
                result: action.result.result,
                cartitems: action.result.items,
                totalprice: action.result.totalprice,
                isFetching: true,
                receivedAt: Date.now()
            };
        case constantFailure(DELETE_CARTITEM):
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

export default cartitemService;