import Vue from 'vue'
import VueRouter from 'vue-router'


Vue.use(VueRouter)

import myDashboard from './components/dashboard'

import myConstituency from './components/constituency'
import myCountry from './components/country'
import mySchools from './components/school'

import myCounty from './components/county'
import mySchoolLevel from './components/school_level'
import myScoreSets from './components/score_sets'
import myScoreSheets from './components/score_sheet'
import myStatistics from './components/statistics'
import myWard from './components/ward'

const routes = [
    { path: '/', component: myDashboard, name: 'example' },
    { path: '/constituency', component: myConstituency, name: 'Constituency' },
    { path: '/countries', component: myCountry, name: 'country' },
    { path: '/schools', component: mySchools, name: 'schools' },
    { path: '/county', component: myCounty, name: 'county' },
    { path: '/schools_level', component: mySchoolLevel, name: 'schools_level' },
    { path: '/score_sets', component: myScoreSets, name: 'schools' },
    { path: '/score_sheets', component: myScoreSheets, name: 'score_sheets' },
    { path: '/statistics', component: myStatistics, name: 'ward' },
    { path: '/ward', component: myWard, name: 'statistics' },
]


export default new VueRouter({routes})
