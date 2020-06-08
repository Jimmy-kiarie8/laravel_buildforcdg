<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>


## Installation
Clone the repository

composer install

npm install

npm run watch

php artisan migrate

php artisan db:seed



## Make axios request

This will get data from user route and update users array in vuex


getData() {

    var payload = {

        model: 'user',

        update: 'updateUsersList' 

    }

    this.$store.dispatch('getItems', payload)
}

After getting the data, you can get the users from this computed function

You have to import mapState at the top of your script tags. Checkout Example.vue

computed: {
    ...mapState(['users'])
}

<!-- payload Data -->


| model                 | update                |
| -------------         |:---------------------:|
| constituencies        | updateConstituencies  |
| country               | updateCounty          |
| county                | updateCounty          |
| schools               | updateSchool          |
| score_sets            | updateScoreSets       |
| score_sheet           | updateScoreSheet      |
| ward                  | updateWard            |
| statistics            | updateWard            |

- [please refer to  Vuex docs](https://vuex.vuejs.org/guide/).
You can also checkout the store folder in resources/js/store to get an idea of how this works
