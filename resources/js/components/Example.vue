<template>
<v-app>
<v-content>
    <v-container fluid fill-height>
        <v-layout justify-center align-center wrap>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(user, index) in users" :key="user.id">
                        <th scope="row">{{ index + 1 }}</th>
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                    </tr>
                </tbody>
            </table>
        </v-layout>
    </v-container>
</v-content>
</v-app>
</template>

<script>
import { mapState } from "vuex";
export default {
    methods: {
        getUsers() {
            var payload = {
                model: 'user',
                update: 'updateUsersList'
            }

            this.$store.dispatch('getItems', payload)
        }
    },
    computed: {
        ...mapState(['users'])
        // users() {
        //     return this.$store.getters('users')
        // }
    },
    mounted() {
        this.getUsers()
    }
}
</script>
