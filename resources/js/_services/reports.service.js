import {Config} from "../../config/config";
import {requestOptions} from "../_helpers/request-options";
import {handleResponse} from "../_helpers/handle-response";

export const reportsService = {
    getContracts,
    getReports,
    getReportsWithDateRange
};


function getContracts(contractId)
{
    return fetch(Config.apiUrl + 'api/contracts/' + contractId, requestOptions.get())
        .then(handleResponse);
}

function getReports(macAddress, queryString)
{
    return fetch(Config.apiUrl + 'api/reports/' + macAddress + '/' + queryString, requestOptions.get())
        .then(handleResponse);
}

function getReportsWithDateRange(macAddress, range)
{
    return fetch(Config.apiUrl + 'api/reports/' + macAddress + '/' + range[0] + '/' + range[1], requestOptions.get())
        .then(handleResponse);
}
