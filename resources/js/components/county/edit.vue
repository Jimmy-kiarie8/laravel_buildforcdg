<template>
<v-layout row justify-center>
    <v-dialog v-model="dialog" persistent max-width="500px">
        <v-card>
            <v-card-title>
                <span class="headline text-center" style="margin: auto;">Create Country</span>
            </v-card-title>
            <v-divider></v-divider>
            <v-card-text>
                <v-container grid-list-md>
                    <v-layout row wrap>
                        <v-flex sm12>
                            <div>
                                <label for="">Country Name</label>
                                <el-input placeholder="Name" v-model="form.name"></el-input>
                            </div>
                            <div>
                                <label for="">Country Code</label>
                                <el-input placeholder="KE" v-model="form.code"></el-input>
                            </div>
                            <div>
                                <label for="">Country Flag</label>
                                <el-input placeholder="" v-model="form.flag"></el-input>
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
        eventBus.$on("openEditCounty", data => {
            this.form = data
            this.dialog = true;
        });
    },

    methods: {
        save() {

            var payload = {
                model: 'countries',
                data: this.form
            }
            this.$store.dispatch('patchItems', this.payload)
                .then(response => {
                    eventBus.$emit("countryEvent")
                });
        },
        close() {
            this.dialog = false;
        }
    },
    computed: {
        ...mapState(['loading'])
    },
};
</script>
