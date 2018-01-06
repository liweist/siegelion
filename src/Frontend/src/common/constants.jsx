export const constantsCreator = (actionName) => [
    `${actionName}_REQUEST`, `${actionName}_SUCCESS`, `${actionName}_FAILURE`
];

export const constantRequest = (actionName) => `${actionName}_REQUEST`;
export const constantSuccess = (actionName) => `${actionName}_SUCCESS`;
export const constantFailure = (actionName) => `${actionName}_FAILURE`;

export const GET_CUSTOMER = 'GET_CUSTOMER';

export const GET_PRODUCTS = 'GET_PRODUCTS';

export const GET_PRODUCT = 'GET_PRODUCT';

export const GET_CART = 'GET_CART';
export const POST_CART = 'POST_CART';

export const GET_CARTITME = 'GET_CARTITEM';
export const PATCH_CARTITEM = 'PATCH_CARTITEM';
export const DELETE_CARTITEM = 'DELETE_CARTITEM';

export const GET_ORDER_CURRENT = 'GET_ORDER_CURRENT';
export const GET_ORDER = 'GET_ORDER';
export const POST_ORDER = 'POST_ORDER';

export const GET_ORDERS_OPEN = 'GET_ORDERS_OPEN';
export const GET_ORDERS_PAID = 'GET_ORDERS_PAID';
export const GET_ORDERS_CLOSED = 'GET_ORDERS_CLOSED';

export const GET_CURRENT_ADDRESS = 'GET_CURRENT_ADDRESS';
export const GET_ADDRESSES = 'GET_ADDRESSES';
export const GET_ADDRESS = 'GET_ADDRESS';
export const POST_ADDRESS = 'POST_ADDRESS';
export const PUT_ADDRESS = 'PUT_ADDRESS';

export const POST_WXPAY = 'POST_WXPAY';

export const GET_LOGISTIC = 'GET_LOGISTIC';

export const GET_LOGISTICT_TRACES = 'GET_LOGISTICT_TRACES';

export const POST_CUSTOMS = 'POST_CUSTOMS';