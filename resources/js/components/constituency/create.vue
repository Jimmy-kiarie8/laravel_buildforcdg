<template>
<v-layout row justify-center>
    <v-dialog v-model="dialog" persistent max-width="500px">
        <v-card>
            <v-card-title>
                <span class="headline text-center" style="margin: auto;">Create Constituency</span>
            </v-card-title>
            <v-divider></v-divider>
            <v-card-text>
                <v-container grid-list-md>
                    <v-layout row wrap>
                            <v-flex sm12>
                                    <div>
                                        <label for="">Constituency Name</label>
                                        <el-input placeholder="Name" v-model="form.name"></el-input>
                                    </div>
                                    <label for="">Country</label>
                                    <el-select v-model="form.country_id" filterable clearable placeholder="Country" style="width: 100%;">
                                        <el-option v-for="item in country" :key="item.id" :label="item.name" :value="item.id">
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
        eventBus.$on("openCreateConstituency", data => {
            this.dialog = true;
        });
    },

    methods: {
        save() {

            var payload = {
                model: 'constituencies',
                data: this.form
            }
            this.$store.dispatch('postItems', payload)
                .then(response => {
                    eventBus.$emit("constituencyEvent")
                });
        },
        close() {
            this.dialog = false;
        }
    },
    computed: {
        ...mapState(['country', 'loading'])
    },
};
</script>
