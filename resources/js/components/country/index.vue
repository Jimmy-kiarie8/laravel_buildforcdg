<template>
<v-content>
    <v-container fluid fill-height>
        <v-layout justify-center align-center wrap>
            <v-flex sm12>
                <v-card style="padding: 20px 0;">
                    <el-breadcrumb separator-class="el-icon-arrow-right">
                        <el-breadcrumb-item :to="{ path: '/' }">Dashboard</el-breadcrumb-item>
                        <el-breadcrumb-item>Countries</el-breadcrumb-item>
                    </el-breadcrumb>
                </v-card>
            </v-flex>
            <v-flex sm12>
                <!-- <myFilter :form="form" :user="user" style></myFilter> -->
            </v-flex>
            <v-flex sm12>
                <v-card style="padding: 10px 0;">
                    <v-layout row>
                        <v-flex sm1 style="margin-left: 10px;">
                            <v-tooltip right>
                                <template v-slot:activator="{ on }">
                                    <v-btn icon v-on="on" slot="activator" class="mx-0" @click="getCountries">
                                        <v-icon color="blue darken-2" small>refresh</v-icon>
                                    </v-btn>
                                </template>
                                <span>Refresh</span>
                            </v-tooltip>
                        </v-flex>
                        <v-flex sm3>
                            <h3 style="margin-left: 30px !important;margin-top: 10px;">Countries</h3>
                        </v-flex>
                        <v-flex offset-sm8 sm3>
                            <v-btn color="info" @click="openCreate" text>Create Country</v-btn>
                        </v-flex>
                    </v-layout>
                </v-card>
            </v-flex>
            <!-- <v-flex sm12>
                <v-pagination v-model="countries.current_page" :length="countries.last_page" total-visible="5" @input="next_page(countries.path, countries.current_page)" circle v-if="countries.last_page > 1"></v-pagination>
            </v-flex> -->
            <v-flex sm12>
                <vue-good-table class="table-hover" :columns="columns" :rows="country" :search-options="{ enabled: true }" :pagination-options="{enabled: true,mode: 'pages'}" v-loading="loading" :sort-options="{enabled: true, initialSortBy: {field: 'id', type: 'asc'}}">
                    <template slot="table-row" slot-scope="props">
                        <span v-if="props.column.field == 'created_at'">
                            <span>
                                <el-tag type="success">{{props.formattedRow.created_at}}</el-tag>
                            </span>
                        </span>
                        <span v-else-if="props.column.field == 'actions'">
                            <v-tooltip bottom>
                                <template v-slot:activator="{ on }">
                                    <v-btn v-on="on" icon class="mx-0" @click="openEdit(props.row)" slot="activator">
                                        <v-icon small color="blue darken-2">edit</v-icon>
                                    </v-btn>
                                </template>
                                <span>Edit {{ props.row.name }}</span>
                            </v-tooltip>
                            <v-tooltip bottom>
                                <template v-slot:activator="{ on }">
                                    <v-btn icon v-on="on" class="mx-0" @click="confirm_delete(props.row)" slot="activator">
                                        <v-icon small color="pink darken-2">delete</v-icon>
                                    </v-btn>
                                </template>
                                <span>Delete {{ props.row.name }}</span>
                            </v-tooltip>
                        </span>
                        <span v-else>{{ props.formattedRow[props.column.field] }}</span>
                    </template>
                </vue-good-table>
            </v-flex>
        </v-layout>
    </v-container>
    <Create></Create>
    <Edit></Edit>
</v-content>
</template>

<script>
import Create from "./create";
import Edit from "./edit";

import {
    mapState
} from "vuex";
export default {
    props: ['user'],
    components: {
        Create,
        Edit,
    },
    data() {
        return {
            form: {},
            loader: false,
            search: "",
            columns: [{
                    label: "Id#",
                    field: "id",
                    type: "number"
                },
                {
                    label: "Name",
                    field: "name"
                },
                {
                    label: "Country code",
                    field: "code"
                },
                {
                    label: "Country Flag",
                    field: "flag"
                },
                {
                    label: "Created On",
                    field: "created_at",
                    // type: "date",
                    // dateInputFormat: "YYYY-MM-DD",
                    // dateOutputFormat: "Do MMMM YYYY"
                },
                {
                    label: "Actions",
                    field: "actions",
                    sortable: false
                }
            ]
        };
    },
    methods: {
        openCreate() {
            eventBus.$emit("openCreateCountry");

        },
        openEdit(data) {
            eventBus.$emit("openEditCountry", data);
        },

        confirm_delete(item) {
            this.$confirm('This will permanently delete the file. Continue?', 'Warning', {
                confirmButtonText: 'OK',
                cancelButtonText: 'Cancel',
                type: 'warning'
            }).then(() => {
                this.deleteItem(item)
            }).catch(() => {
                this.$message({
                    type: 'error',
                    message: 'Delete canceled'
                });
            });
        },

        deleteItem(item) {
            this.$store.dispatch("deleteItem", "countries/" + item.id).then(response => {
                this.$message({
                    type: 'success',
                    message: 'Delete completed'
                });
                this.getCountries();
            });
        },
        openShow(data) {
            eventBus.$emit("openShowCountry", data);
        },
        getCountries() {
            var payload = {
                model: 'countries',
                update: 'updateCountry'
            }
            this.$store.dispatch("getItems", payload);
        },

        next_page(path, page) {
            var payload = {
                path: path,
                page: page,
                update: 'updateCountriesList'
            }
            this.$store.dispatch("nextPage", payload);
        },
    },
    computed: {
        ...mapState(['country', 'loading']),
    },
    mounted() {
        // this.$store.dispatch('getCountries');
        eventBus.$emit("LoadingEvent");
        this.getCountries();
    },
    created() {
        eventBus.$on("countryEvent", data => {
            this.getCountries();
        });

        eventBus.$on("responseChooseEvent", data => {
            console.log(data);
            if (data == "Excel") {
                eventBus.$emit("openEditCountry");
            } else {
                eventBus.$emit("openCreateCountry");
            }
        });
    },

};
</script>

<style scoped>
.el-input--prefix .el-input__inner {
    border-radius: 50px !important;
}

.v-toolbar__content,
.v-toolbar__extension {
    height: auto !important;
}

.v-avatar {
    height: 10px !important;
    width: 10px !important;
    margin-left: 40% !important;
}
</style>
