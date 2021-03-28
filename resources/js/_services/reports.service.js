import {Config} from "../../config/config";
import {requestOptions} from "../_helpers/request-options";
import {handleResponse} from "../_helpers/handle-response";

export const reportsService = {
    getContracts,
    getMacAddresses
};


function getContracts(contractId)
{
    return fetch(Config.apiUrl + 'api/contracts/' + contractId, requestOptions.get())
        .then(handleResponse);
}

function getMacAddresses(macAddress)
{
    return fetch(Config.apiUrl + 'api/macAddress/' + macAddress, requestOptions.get(inquiry))
        .then(handleResponse);
}
