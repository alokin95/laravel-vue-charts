<template>
    <div>

        <div class="lg:flex w-full lg:justify-between border-b-2">
            <div class="w-full m-auto p-4">
                <div class="w-full lg:text-left text-center">
                    <h1 class="lg:w-1/12 lg:float-left text-lg font-medium lg:relative top-1 text-3xl">Report</h1>
                </div>

                <div class="mx-auto w-full text-center">
                    <button class="lg:w-1/12 lg:float-right text-center appearance-none border-2 border-black rounded-full w-1/3 py-2 px-4 text-loginButtonText leading-tight focus:outline-none" >Logout</button>
                </div>
            </div>
        </div>

        <div class="lg:w-full">
            <form class="lg:flex lg:w-1/2 w-2/3 text-center lg:justify-between">

                <div class="lg:items-center mb-4 ml-4 lg:w-2/6 w-1/2">
                    <div>
                        <input v-model="filters.macAddress" class="text-center shadow-xl bg-transparent appearance-none border-2 border-loginBorders rounded-full w-full py-2 px-4 text-loginInputText leading-tight focus:outline-none" id="macAddress" type="text" placeholder="Mac: address">
                    </div>
                </div>

                <div class="lg:items-center ml-4 mb-4 lg:w-2/6 w-1/2">
                    <div>
                        <input v-model="filters.contractId" class="text-center shadow-xl bg-transparent appearance-none border-2 border-loginBorders rounded-full w-full py-2 px-4 text-loginInputText leading-tight focus:outline-none" id="contractId" type="text" placeholder="Contract ID">
                    </div>
                </div>

                <div class="lg:items-center mb-4 p-4 lg:p-0 lg:w-1/6 w-1/2 relative">
                    <i  v-show="isSpinning"class="fa fa-refresh fa-spin lg:float-rightabsolute" style="font-size:24px"></i>
                    <i v-show="!isSpinning" class="fa fa-refresh lg:float-right absolute" style="font-size:24px"></i>
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
                    <li class="is-active-custom lg:mr-4 -mb-1.5  lg:ml-6 w-1/2 lg:w-1/12 border-r-2 border-l-2 border-t-4 tab-top-border text-tabsText font-medium"><a>Tables</a></li>
                    <li class="w-1/2 lg:w-1/12 -mb-1.5 border-r-2 border-l-2 border-t-4 tab-top-border text-tabsText font-medium"><a>Graphs</a></li>
                </ul>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: "Header",

    data() {
        return {
            isSpinning: false,
            filters: {
                macAddress: "",
                contractId: ""
            }
        }
    },

    methods: {
        applyFilters() {
            this.isSpinning = true;
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
