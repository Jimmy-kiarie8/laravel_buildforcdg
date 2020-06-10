export default {
    loading(state, payload) {
        state.loading = payload
    },
    errors(state, payload) {
        state.errors = payload
    },
    alertEvent(state, payload) {
        state.alertEvent = payload
    },
    updateConstituencies(state, payload) {
        state.constituencies = payload
    },
    updateCountry(state, payload) {
        state.country = payload
    },
    updateCounty(state, payload) {
        state.county = payload
    },
    updateSchool(state, payload) {
        state.schools = payload
    },
    updateScoreSets(state, payload) {
        state.score_sets = payload
    },
    updateScoreSheet(state, payload) {
        state.score_sheet = payload
    },
    updateWard(state, payload) {
        state.ward = payload
    },
    updateStatistics(state, payload) {
        state.statistics = payload
    },

    updateCourse(state, payload) {
        state.courses = payload
    },

    updateSchoolCount(state, payload) {
        state.total_schools = payload
    },
    updateCountyCount(state, payload) {
        state.county_count = payload
    },
    updateConstituencyCount(state, payload) {
        state.constituency_count = payload
    },
    updateCountryCount(state, payload) {
        state.country_count = payload
    },
    updateCountryCount(state, payload) {
        state.country_count = payload
    },

}

