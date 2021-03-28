<template>
    <div>

        <div class="lg:flex w-full lg:justify-between border-b border-loginInputText mb-5">
            <div class="w-full m-auto p-4">
                <div class="w-full lg:text-left text-center">
                    <h1 class="lg:w-1/12 lg:float-left text-lg font-medium lg:relative top-1 text-3xl">Report</h1>
                </div>

                <div class="mx-auto w-full text-center">
                    <button @click="logout" class="lg:w-1/12 lg:float-right text-center appearance-none border-2 border-black rounded-full w-1/3 py-2 px-4 text-loginButtonText leading-tight focus:outline-none" >Logout</button>
                </div>
            </div>
        </div>

        <div class="lg:w-full mb-5">
            <form class="lg:flex lg:w-1/2 w-2/3 text-center lg:justify-between">

                <div class="lg:items-center mb-4 ml-4 lg:w-2/6 w-1/2">
                    <div class="relative">
                        <input v-validate="{ required: true, regex: regex.macAddress }" name="Mac Address" v-model="filters.macAddress" class="text-center shadow-xl bg-transparent appearance-none border-2 border-loginBorders rounded-full w-full py-2 px-4 text-loginInputText leading-tight focus:outline-none" id="macAddress" type="text" placeholder="Mac: address">
                        <div class="text-sm text-red-500">
                            {{ errors.first('Mac Address') }}
                        </div>
                    </div>
                </div>

                <div class="lg:items-center ml-4 mb-4 lg:w-2/6 w-1/2">
                    <div class="relative">
                        <input @keyup="contractSearch" @focus="contractSearch" v-model="filters.contractId" class="text-center shadow-xl bg-transparent appearance-none border-2 border-loginBorders rounded-full w-full py-2 px-4 text-loginInputText leading-tight focus:outline-none" id="contractId" type="text" placeholder="Contract ID">
                        <div class="absolute h-28">
                            <div :class="{'is-active': showSuggestedContracts}" class="dropdown">
                                <div class="dropdown-menu" id="dropdown-menu" role="menu">
                                    <div class="dropdown-content" v-if="suggestedContracts.length">
                                        <a @click="setMacAddress(contract)" v-for="contract in suggestedContracts" href="#" class="dropdown-item">
                                            <div>
                                                <p class="text-loginInputText">
                                                    Contract No.
                                                    <span class="text-black font-weight-bold">{{ contract.contract_number }}</span>
                                                </p>
                                            </div>
                                            <div class="text-loginInputText font-weight-light">
                                                <p class="text-loginInputText">
                                                    Contract owner
                                                    <span class="text-black font-weight-bold">{{ contract.name }}</span>
                                                </p>
                                            </div>
                                        </a>

                                    </div>
                                    <div class="dropdown-content" v-else>
                                        <a href="#" class="dropdown-item">
                                            No contracts found
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:items-center mb-4 p-4 lg:p-0 lg:w-1/6 w-1/2 relative">
                    <i v-show="isSpinning"class="fa fa-refresh fa-spin lg:float-right absolute" style="font-size:24px"></i>
                    <i @click="emptyFilters" v-show="!isSpinning" class="fa fa-refresh lg:float-right absolute" style="font-size:24px"></i>
                </div>

                <div class="lg:items-center mb-4 lg:w-2/6 w-1/2">
                    <button @click="applyFilters" class="text-center shadow-xl bg-loginButton appearance-none border-2 border-loginButton rounded-full w-full py-2 px-4 text-black leading-tight focus:outline-none" type="button">
                        Apply filters
                    </button>
                </div>
            </form>
        </div>


        <div class="tabs">
            <div class="w-1/2 lg:w-full m-auto">
                <ul>
                    <li class="lg:mr-4 lg:ml-4 -mb-1.5 w-1/2 lg:w-1/12 border-r-2 border-l-2 border-t-4 tab-top-border text-tabsText font-medium"><a>Tables</a></li>
                    <li class="w-1/2 lg:w-1/12 -mb-1.5 border-r-2 border-l-2 border-t-4 tab-top-border text-tabsText font-medium"><a>Graphs</a></li>
                </ul>
            </div>
        </div>

    </div>
</template>

<script>
import {authenticationService} from "../../_services/authentication.service";
import {reportsService} from "../../_services/reports.service";

export default {
    name: "Header",

    data() {
        return {
            isSpinning: false,
            filters: {
                macAddress: "",
                contractId: ""
            },
            suggestedContracts: [],
            showSuggestedContracts: false,
            regex: {
                macAddress: /^([0-9A-Fa-f]{2}[\.:-]){5}([0-9A-Fa-f]{2})$/
            }
        }
    },

    methods: {
        applyFilters() {
            if (this.filters.macAddress === '') {
                return false;
            }

            if (!this.validateMacAddress()) {
                return false;
            }
            this.isSpinning = true;

            reportsService.getReports(this.filters.macAddress)
                .then(response => {
                    Event.$emit('report-created', response);
                })
                .catch(err => {
                    alert("No reports found.")
                })
        },

        logout() {
            authenticationService.logout();
            this.$router.push('/');
        },

        validateMacAddress()
        {
            return this.regex.macAddress.test(this.filters.macAddress);
        },

        emptyFilters() {
            this.filters.macAddress = "";
            this.filters.contractId = "";
        },

        contractSearch() {
            if (this.filters.contractId.length < 1 || this.filters.contractId === '') {
                this.suggestedContracts = [];
                return false;
            }

            this.showSuggestedContracts = true;

            reportsService.getContracts(this.filters.contractId)
                .then(contracts => {
                    this.suggestedContracts = contracts;
                })
                .catch(err => {
                    alert("Error");
                })
        },

        setMacAddress(contract) {
            if (contract.mac_address) {
                this.filters.macAddress = contract.mac_address.mac;
                this.filters.contractId = contract.contract_number;
            }
            this.showSuggestedContracts = false;
        }
    }
}
</script>

<style scoped>
.tab-top-border {
    border-color: aqua #dbdbdb #dbdbdb #dbdbdb;
}

.is-active-custom {
    background-color: #f2f2f2 !important;
}
</style>
