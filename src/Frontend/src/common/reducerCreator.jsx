import { constantRequest, constantSuccess, constantFailure } from './constants.jsx';

const defaultState = {
    isFetched: false
}

const reducerCreator = (state = defaultState, action, actionNames) => {
    actionNames.map((actionName) => {
        let newState = undefined;
        let response = 'response';
        
        if (actionName instanceof Object) {
            response = actionName.response;
            actionName = actionName.name;
        }

        switch (action.type) {
            case constantRequest(actionName):
                newState = {
                    ...state,
                    isFetched: false
                };
                break;
            case constantSuccess(actionName):
                newState = {
                    ...state,
                    [response]: action.result,
                    isFetched: true,
                    receivedAt: Date.now()
                };
                break;
            case constantFailure(actionName):
                newState = {
                    ...state,
                    error: action.error,
                    isFetched: true,
                    receivedAt: Date.now()
                };
                break;
            default:
                break;
        }

        if (newState !== undefined) {
            state = newState;
        }
    });

    return state;
}

export default reducerCreator;