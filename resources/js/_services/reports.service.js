import {Config} from "../../config/config";
import {requestOptions} from "../_helpers/request-options";
import {handleResponse} from "../_helpers/handle-response";

export const reportsService = {
    getContracts,
    getReports
};


function getContracts(contractId)
{
    return fetch(Config.apiUrl + 'api/contracts/' + contractId, requestOptions.get())
        .then(handleResponse);
}

function getReports(macAddress)
{
    return fetch(Config.apiUrl + 'api/reports/' + macAddress, requestOptions.get())
        .then(handleResponse);
}
