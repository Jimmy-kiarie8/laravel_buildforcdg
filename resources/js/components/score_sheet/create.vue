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
                            <label for="">School Level</label>
                            <el-select v-model="form.setId" filterable clearable placeholder="Ward" style="width: 100%;">
                                <el-option v-for="item in school_level" :key="item.id" :label="item.level_name" :value="item.id">
                                </el-option>
                            </el-select>
                            <div>
                                <label for="">Number</label>
                                <el-input placeholder="number" v-model="form.number"></el-input>
                            </div>
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
        eventBus.$on("openCreateScoresheet", data => {
            this.dialog = true;
        });
    },

    methods: {
        save() {

            var payload = {
                model: 'scoresheets',
                data: this.form
            }
            this.$store.dispatch('postItems', payload)
                .then(response => {
                    eventBus.$emit("scoresheetEvent")
                });
        },
        close() {
            this.dialog = false;
        }
    },
    computed: {
        ...mapState(['loading', 'score_sets'])
    },
};
</script>
