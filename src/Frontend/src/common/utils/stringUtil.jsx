export const strToMoney = (number) => {
    number = number + '';
    if (number.length > 0) {
        let padedString = number;
        if (number.length < 4) {
            let prepadString = '000' + number;
            padedString = prepadString.substr(prepadString.length - 3, 3);
        }
        let before = padedString.substr(0, padedString.length - 2);
        let after = padedString.substr(padedString.length - 2, 2);
        return before + '.' + after;
    }
    return number;
}

export const datetime = (datetimeObject) => {
    if (datetimeObject == undefined) {
        return '';
    } else {
        return datetimeObject.date.slice(0,19);
    }
}