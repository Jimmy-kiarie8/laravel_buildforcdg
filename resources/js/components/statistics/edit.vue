<template>
<v-layout row justify-center>
    <v-dialog v-model="dialog" persistent max-width="500px">
        <v-card>
            <v-card-title>
                <span class="headline text-center" style="margin: auto;">Statistics</span>
            </v-card-title>
            <v-divider></v-divider>
            <v-card-text>
                <v-container grid-list-md>
                   <v-layout row wrap>
                        <v-flex sm12>
                            <v-layout row wrap>
                                <v-flex sm6>
                                    <label for="">No of female</label>
                                    <el-input placeholder="No of female" v-model="form.no_of_female"></el-input>
                                </v-flex>
                                <v-flex sm6>
                                    <label for="">No of Male</label>
                                    <el-input placeholder="No of Male" v-model="form.no_of_female"></el-input>
                                </v-flex>
                                <v-flex sm6>
                                    <label for="">Student Population</label>
                                    <el-input placeholder="Student Population" v-model="form.no_of_female"></el-input>
                                </v-flex>
                                <v-flex sm6>
                                    <label for="">Min Age</label>
                                    <el-input placeholder="Min Age" v-model="form.no_of_female"></el-input>
                                </v-flex>
                                <v-flex sm6>
                                    <label for="">Max Age</label>
                                    <el-input placeholder="Max Age" v-model="form.no_of_female"></el-input>
                                </v-flex>
                                <v-flex sm6>
                                    <label for="">No of disabled students</label>
                                    <el-input placeholder="No of disabled students" v-model="form.no_of_female"></el-input>
                                </v-flex>
                                <v-flex sm6>
                                    <label for="">school fees</label>
                                    <el-input placeholder="school fees" v-model="form.no_of_female"></el-input>
                                </v-flex>
                                <v-flex sm6>
                                    <label for="">Book per student</label>
                                    <el-input placeholder="Book per student" v-model="form.no_of_female"></el-input>
                                </v-flex>
                                <v-flex sm6>
                                    <label for="">No of teachers</label>
                                    <el-input placeholder="No of teachers" v-model="form.no_of_female"></el-input>
                                </v-flex>
                                <v-flex sm6>
                                    <label for="">Non curriculum activities</label>
                                    <el-input placeholder="Non curriculum activities" v-model="form.no_of_female"></el-input>
                                </v-flex>
                                <v-flex sm6>
                                    <label for="">Subjects</label>
                                    <el-input placeholder="Subjects" v-model="form.no_of_female"></el-input>
                                </v-flex>
                                <v-flex sm6>
                                    <label for="">Average school performance</label>
                                    <el-input placeholder="Average school performance" v-model="form.no_of_female"></el-input>
                                </v-flex>
                                <v-flex sm6>
                                    <label for="">No of dropouts</label>
                                    <el-input placeholder="No of dropouts" v-model="form.no_of_female"></el-input>
                                </v-flex>
                                <v-flex sm6>
                                    <label for="">no_of_dropouts</label>
                                    <el-input placeholder="no_of_dropouts" v-model="form.no_of_female"></el-input>
                                </v-flex>
                                <v-flex sm6>
                                    <label for="">School Level</label>
                                    <el-select v-model="form.setId" filterable clearable placeholder="Ward" style="width: 100%;">
                                        <el-option v-for="item in schools" :key="item.id" :label="item.schoolName" :value="item.id">
                                        </el-option>
                                    </el-select>
                                </v-flex>
                                <v-flex sm6>
                                    <label for="">Score</label>
                                    <el-select v-model="form.scoreId" filterable clearable placeholder="Ward" style="width: 100%;">
                                        <el-option v-for="item in schools" :key="item.id" :label="item.setName" :value="item.id">
                                        </el-option>
                                    </el-select>
                                </v-flex>
                            </v-layout>
                        </v-flex>
                    </v-layout>
                </v-container>
            </v-card-text>
            <v-card-actions>
                <v-btn color="blue darken-1" text @click="close">Close</v-btn>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" text @click="save" :loading="loading" :disabled="loading">Save</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</v-layout>
</template>

<script>
import {
    mapState
} from "vuex";
export default {
    data: () => ({
        dialog: false,
        form: {},
        errors: {},
    }),

    created() {
        eventBus.$on("openEditScoresheet", data => {
            this.form = data
            this.dialog = true;
        });
    },

    methods: {
        save() {

            var payload = {
                model: 'scoresheets',
                data: this.form
            }
            this.$store.dispatch('patchItems', this.payload)
                .then(response => {
                    eventBus.$emit("scoresheetEvent")
                });
        },
        close() {
            this.dialog = false;
        }
    },
    computed: {
        ...mapState(['loading', 'score_sets', 'schools'])
    },
};
</script>
