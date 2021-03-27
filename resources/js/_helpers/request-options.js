import { authenticationService } from '../_services/authentication.service';

export const requestOptions = {
    get() {
        return {
            method: 'GET',
            ...headers()
        };
    },
    post(body) {
        return {
            method: 'POST',
            ...headers(),
            body: JSON.stringify(body)
        };
    }
}

function headers() {
    const currentUser = authenticationService.currentUserValue || {};
    const authHeader = currentUser.token ? { 'Authorization': 'Bearer ' + currentUser.token } : {}
    return {
        headers: {
            ...authHeader,
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        }
    }
}
