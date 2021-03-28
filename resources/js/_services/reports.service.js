import {Config} from "../../config/config";
import {requestOptions} from "../_helpers/request-options";
import {handleResponse} from "../_helpers/handle-response";

export const reportsService = {
    getContracts
};


function getContracts(contractId)
{
    return fetch(Config.apiUrl + 'api/contracts/' + contractId, requestOptions.get())
        .then(handleResponse);
}

function sendSelfInquiry(inquiry)
{
    return fetch(Config.apiUrl + 'api/inquiry_self', requestOptions.post(inquiry))
        .then(handleResponse);
}
