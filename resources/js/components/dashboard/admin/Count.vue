<template>
<div>
    <div class="col-md-12">
        <div class="card card-stats card-raised">
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-md-3">
                        <div class="statistics">
                            <div class>
                                <div class="icon icon-primary">
                                    <v-icon color="orange">school</v-icon>
                                </div>
                                <h3 class="info-title">
                                    <span>
                                        <b>35</b>
                                        <!-- <b>{{ total_schools }}</b> -->
                                    </span>
                                </h3>
                                <h6 class="stats-title">
                                    <strong>Total Schools</strong>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <v-divider vertical></v-divider>
                    <div class="col-md-2">
                        <div class="statistics">
                            <div class>
                                <div class="icon icon-danger">
                                    <v-icon color="red">today</v-icon>
                                </div>
                                <h3 class="info-title">
                                    <span>
                                        <b>48</b>
                                        <!-- <b>{{ county_count }}</b> -->
                                    </span>
                                </h3>
                                <h6 class="stats-title">
                                    <strong>Counties</strong>
                                </h6>
                            </div>
                        </div>
                    </div>

                    <v-divider vertical></v-divider>
                    <div class="col-md-2">
                        <div class="statistics">
                            <div class>
                                <div class="icon icon-danger">
                                    <v-icon color="grey">book</v-icon>
                                </div>
                                <h3 class="info-title">
                                    <span>
                                        <b>210</b>
                                        <!-- <b>{{ constituency_count }}</b> -->
                                    </span>
                                </h3>
                                <h6 class="stats-title">
                                    <strong>Constituency</strong>
                                </h6>
                            </div>
                        </div>
                    </div>

                    <v-divider vertical></v-divider>
                    <div class="col-md-2">
                        <div class="statistics">
                            <div class>
                                <div class="icon icon-danger">
                                    <v-icon color="indigo">map</v-icon>
                                </div>
                                <h3 class="info-title">
                                    <span>
                                        <b>3</b>
                                        <!-- <b>{{ country_count }}</b> -->
                                    </span>
                                </h3>
                                <h6 class="stats-title">
                                    <strong>Country</strong>
                                </h6>
                            </div>
                        </div>
                    </div>

                    <v-divider vertical></v-divider>
                    <div class="col-md-2">
                        <div class="statistics">
                            <div class>
                                <div class="icon icon-danger">
                                    <v-icon color="green">account_circle</v-icon>
                                </div>
                                <h3 class="info-title">
                                    <span>
                                        <b>5</b>
                                        <!-- <b>{{ users_count }}</b> -->
                                    </span>
                                </h3>
                                <h6 class="stats-title">
                                    <strong>Country</strong>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import {
    mapState
} from "vuex";
export default {
    methods: {
        getTotalSchool() {
            var payload = {
                model: "/total_schools",
                update: "updateSchoolCount"
            };
            this.$store.dispatch("getItems", payload);
        },
        getCounty() {
            var payload = {
                model: "/county_count",
                update: "updateCountyCount"
            };
            this.$store.dispatch("getItems", payload);
        },

        getConstituency() {
            var payload = {
                model: "/constituency_count",
                update: "updateConstituencyCount"
            };
            this.$store.dispatch("getItems", payload);
        },

        getCountry() {
            var payload = {
                model: "/country_count",
                update: "updateCountryCount"
            };
            this.$store.dispatch("getItems", payload);
        },
        getUserCount() {
            var payload = {
                model: "/country_count",
                update: "updateCountryCount"
            };
            this.$store.dispatch("getItems", payload);
        },
    },
    computed: {
        ...mapState(['total_schools', 'county_count', 'constituency_count', 'country_count', 'users_count'])
        // total_schools() {
        //     return this.$store.getters.total_schools;
        // },
        // sellers_count() {
        //     return this.$store.getters.sellers_count;
        // },
        // clients_count() {
        //     return this.$store.getters.clients_count;
        // },
        // county_count() {
        //     return this.$store.getters.county_count;
        // }
    },
    mounted() {
        this.getTotalSchool();
        this.getCounty();
        this.getConstituency();
        this.getCountry();
        this.getUserCount();
    }
};
</script>


<style scoped>
.justify-center {
    margin-top: -100px !important;
}

.card-stats {
    margin-top: -10px;
    padding: 20px 0;
}

/* .statistics {
    background: #f0f0f0 !important;
} */

.progress-Ship {
    margin-top: 100px !important;
}

.v-icon {
    font-size: 64px !important;
}

.v-icon {
    box-shadow: 0 9px 30px -6px rgba(255, 54, 54, 0.5);
    padding: 5px;
    border-radius: 50%;
}

.info-title {
    margin-top: 20px;
    color: #000 !important;
}
.stats-title {
    color: #9a9a9a !important;
}
</style>
