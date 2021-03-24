export const error404 = function(err) {
    return errorResponse(err) && 404 == error.response.status;
};

export const error422 = function(err) {
    return errorResponse(err) && 422 == error.response.status;
};

const errorResponse = function(err) {
    return err.response && err.response.status;
};
