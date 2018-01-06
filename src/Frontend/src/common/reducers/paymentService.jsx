import reducerCreator from '../reducerCreator.jsx';
import { 
    constantRequest, constantSuccess, constantFailure, 
    POST_WXPAY 
} from '../constants.jsx';


const paymentService = (state, action) => {
    return reducerCreator(state, action, [
        POST_WXPAY
    ]);
}

export default paymentService;