import { 
    constantRequest, constantSuccess, constantFailure, 
    GET_CUSTOMER, POST_CUSTOMS
} from '../constants.jsx';

const defaultState = {
    isFetching: false
}

const customerService = (state = defaultState, action) => {
    switch (action.type) {
        //GET_CUSTOMER
        case constantRequest(GET_CUSTOMER):
            return {
                ...state,
                isFetching: false
            };
        case constantSuccess(GET_CUSTOMER):
            return {
                ...state,
                customer: action.result,
                wxname: action.result.wxname,
                avatarurl: action.result.avatarurl,
                isFetching: true,
                receivedAt: Date.now()
            };
        case constantFailure(GET_CUSTOMER):
            return {
                ...state,
                error: action.error,
                isFetching: true,
                receivedAt: Date.now()
            };
        //POST_CUSTOMS
        case constantRequest(POST_CUSTOMS):
            return {
                ...state,
                isFetching: false
            };
        case constantSuccess(POST_CUSTOMS):
            return {
                ...state,
                response: action.result,
                isFetching: true,
                receivedAt: Date.now()
            };
        case constantFailure(POST_CUSTOMS):
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

export default customerService;