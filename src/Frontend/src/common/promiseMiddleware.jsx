const promiseMiddleware = () => {
    return (next) => (action) => {
        const {types, promise, ...rest} = action;
        const [REQUEST, SUCCESS, FAILURE] = types;

        if (!promise) {
            return next(action);
        }
        next({...rest, type: REQUEST});

        return promise.then(
            (result) => {
                next({...rest, result, type: SUCCESS});
            },
            (error) => {
                next({...rest, error, type: FAILURE});
            }
        )
    }
}

export default promiseMiddleware;