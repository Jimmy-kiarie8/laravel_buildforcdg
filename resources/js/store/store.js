import actions from './actions';
import getters from './getters';
import mutations from './mutations';

export default {
    state: {
        loading: false,
        errors: [],
        users: [],
        constituencies: [],
        country: [],
        county: [],
        schools: [],
        score_sets: [],
        score_sheet: [],
        ward: [],
        statistics: [],
        school_level: [],

        total_schools: null,
        county_count: null,
        constituency_count: null,
        country_count: null,
        country_count: null,
    },
    getters,
    mutations,
    actions
}
