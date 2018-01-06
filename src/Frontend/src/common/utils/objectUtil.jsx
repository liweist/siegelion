export const getValueById = (objects, id) => {
    let value = undefined;

    objects.map((object) => {
        if (object.id == id) {
            value = object.value;
        }
    })
    
    return value;
}