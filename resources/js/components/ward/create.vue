<template>
<v-layout row justify-center>
    <v-dialog v-model="dialog" persistent max-width="500px">
        <v-card>
            <v-card-title>
                <span class="headline text-center" style="margin: auto;">Create Ward</span>
            </v-card-title>
            <v-divider></v-divider>
            <v-card-text>
                <v-container grid-list-md>
                    <v-layout row wrap>
                        <v-flex sm12>
                            <div>
                                <label for="">Ward Name</label>
                                <el-input placeholder="number" v-model="form.name"></el-input>
                            </div>
                            <div>
                                <label for="">Population</label>
                                <el-input placeholder="population" v-model="form.population"></el-input>
                            </div>
                            <label for="">School Level</label>
                            <el-select v-model="form.constituency_id" filterable clearable placeholder="Ward" style="width: 100%;">
                                <el-option v-for="item in constituencies" :key="item.id" :label="item.name" :value="item.id">
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
        eventBus.$on("openCreateWard", data => {
            this.dialog = true;
        });
    },

    methods: {
        save() {

            var payload = {
                model: 'wards',
                data: this.form
            }
            this.$store.dispatch('postItems', payload)
                .then(response => {
                    eventBus.$emit("wardEvent")
                });
        },
        close() {
            this.dialog = false;
        }
    },
    computed: {
        ...mapState(['loading', 'constituencies'])
    },
};
</script>
