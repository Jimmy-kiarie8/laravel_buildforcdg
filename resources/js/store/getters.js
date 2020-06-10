export default {
    loading(state) {
        return state.loading;
    },
    errors(state) {
        return state.errors;
    },
    alertEvent(state) {
        eventBus.$emit('alertEvent', state)
        // return state.alertEvent;
    },
    users(state) {
        return state.users
    },
    constituencies(state) {
        return state.constituencies
    },
    courses(state) {
        return state.courses
    },
    country(state) {
        return state.country
    },
    county(state) {
        return state.county
    },
    schools(state) {
        return state.schools
    },
    score_sets(state) {
        return state.score_sets
    },
    score_sheet(state) {
        return state.score_sheet
    },
    ward(state, ) {
        return state.ward
    },
    statistics(state) {
        return state.statistics
    },



    total_schools(state) {
        return state.total_schools
    },
    county_count(state) {
        return state.county_count
    },
    constituency_count(state) {
        return state.constituency_count
    },
    country_count(state) {
        return state.country_count
    },
    country_count(state) {
        return state.country_count
    },

}
