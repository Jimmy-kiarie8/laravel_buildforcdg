<template>
<v-content>
    <v-container fluid fill-height>
        <v-layout justify-center align-center wrap>
            <v-flex sm12>
                <v-card style="padding: 20px 0;">
                    <el-breadcrumb separator-class="el-icon-arrow-right">
                        <el-breadcrumb-item :to="{ path: '/' }">Dashboard</el-breadcrumb-item>
                        <el-breadcrumb-item>Scoresheets</el-breadcrumb-item>
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
                                    <v-btn icon v-on="on" slot="activator" class="mx-0" @click="getScoresheets">
                                        <v-icon color="blue darken-2" small>refresh</v-icon>
                                    </v-btn>
                                </template>
                                <span>Refresh</span>
                            </v-tooltip>
                        </v-flex>
                        <v-flex sm3>
                            <h3 style="margin-left: 30px !important;margin-top: 10px;">Scoresheets</h3>
                        </v-flex>
                        <v-flex offset-sm8 sm3>
                            <v-btn color="info" @click="openCreate" text>Create Scoresheet</v-btn>
                        </v-flex>
                    </v-layout>
                </v-card>
            </v-flex>
            <!-- <v-flex sm12>
                <v-pagination v-model="scoresheets.current_page" :length="scoresheets.last_page" total-visible="5" @input="next_page(scoresheets.path, scoresheets.current_page)" circle v-if="scoresheets.last_page > 1"></v-pagination>
            </v-flex> -->
            <v-flex sm12>
                <vue-good-table class="table-hover" :columns="columns" :rows="scoresheets" :search-options="{ enabled: true }" :pagination-options="{enabled: true,mode: 'pages'}" v-loading="loading" :sort-options="{enabled: true, initialSortBy: {field: 'id', type: 'asc'}}">
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
                    label: "No of female",
                    field: "no_of_female"
                },
                {
                    label: "No of male",
                    field: "no_of_male"
                },
                {
                    label: "Student population",
                    field: "student_population"
                },

                {
                    label: "Min age",
                    field: "min_age"
                },

                {
                    label: "Max age",
                    field: "max_age"
                },

                {
                    label: "No of disabled",
                    field: "no_of_disabled"
                },

                {
                    label: "School fees",
                    field: "school_fees"
                },

                {
                    label: "Books per student",
                    field: "books_per_student"
                },

                {
                    label: "No of teachers",
                    field: "no_of_teachers"
                },
                {
                    label: "Non urriculum activities",
                    field: "non_curriculum_activities"
                },
                {
                    label: "Subjects",
                    field: "subjects"
                },
                {
                    label: "Average school performance",
                    field: "average_school_performance"
                },
                {
                    label: "No of dropouts",
                    field: "no_of_dropouts"
                },
                {
                    label: "set Id",
                    field: "setId"
                },
                {
                    label: "score Id",
                    field: "scoreId"
                }
            ]
        };
    },
    methods: {
        openCreate() {
            eventBus.$emit("openCreateScoresheet");
            var payload = {
                model: 'groups',
                update: 'updateGroupList',
            }
            this.$store.dispatch("getItems", payload);
        },
        openEdit(data) {
            eventBus.$emit("openEditScoresheet", data);
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
            this.$store.dispatch("deleteItem", "scoresheets/" + item.id).then(response => {
                this.$message({
                    type: 'success',
                    message: 'Delete completed'
                });
                this.getScoresheets();
            });
        },
        openShow(data) {
            eventBus.$emit("openShowScoresheet", data);
        },
        getScoresheets() {
            var payload = {
                model: 'scoresheets',
                update: 'updateScoresheetList'
            }
            this.$store.dispatch("getItems", payload);
        },

        next_page(path, page) {
            var payload = {
                path: path,
                page: page,
                update: 'updateScoresheetsList'
            }
            this.$store.dispatch("nextPage", payload);
        },
    },
    computed: {
        ...mapState(['scoresheets', 'loading']),
    },
    mounted() {
        // this.$store.dispatch('getScoresheets');
        eventBus.$emit("LoadingEvent");
        this.getScoresheets();
    },
    created() {
        eventBus.$on("scoresheetEvent", data => {
            this.getScoresheets();
        });

        eventBus.$on("responseChooseEvent", data => {
            console.log(data);
            if (data == "Excel") {
                eventBus.$emit("openEditScoresheet");
            } else {
                eventBus.$emit("openCreateScoresheet");
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
