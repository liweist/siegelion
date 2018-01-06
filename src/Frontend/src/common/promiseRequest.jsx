import fetch from 'isomorphic-fetch';

const promiseRequest = (url, options = {}) => {
    return new Promise((resolve, reject) => {
        let defaultOptions = {
            credentials: 'include'
        };
        fetch(url, Object.assign({}, options, defaultOptions))
            .then(response => response.json())
            .then(response => response.error ? reject(response.error) : resolve(response))
            .catch(reject);
    });
}

export default promiseRequest;