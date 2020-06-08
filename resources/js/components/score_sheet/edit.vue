<template>
<v-layout row justify-center>
    <v-dialog v-model="dialog" persistent max-width="500px">
        <v-card>
            <v-card-title>
                <span class="headline text-center" style="margin: auto;">Create Scoresheet</span>
            </v-card-title>
            <v-divider></v-divider>
            <v-card-text>
                <v-container grid-list-md>
                    <v-layout row wrap>
                        <v-flex sm12>
                            <div>
                                <label for="">Set Name</label>
                                <el-input placeholder="Name" v-model="form.setName"></el-input>
                            </div>
                            <label for="">School Level</label>
                            <el-select v-model="form.levelId" filterable clearable placeholder="Ward" style="width: 100%;">
                                <el-option v-for="item in school_level" :key="item.id" :label="item.level_name" :value="item.id">
                                </el-option>
                            </el-select>
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
        ...mapState(['loading', 'ward', 'school_level'])
    },
};
</script>
