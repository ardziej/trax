const traxAPI = {
    getCarsEndpoint() {
        return '/api/cars'
    },
    getCarEndpoint(id) {
        return `/api/cars/${id}`
    },
    addCarEndpoint() {
        return '/api/cars';
    },
    deleteCarEndpoint(id) {
        return `/api/cars/${id}`
    },
    getTripsEndpoint() {
        return '/api/trips';
    },
    addTripEndpoint() {
        return 'api/trips'
    }
}

export {traxAPI};
