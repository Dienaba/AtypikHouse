const mix = require('laravel-mix');

// Admin on the AtypikHouse
mix.webpackConfig({
    output: {
        path:__dirname+'/public/dist/frontend',
    }

});

mix.sass('public/sass/app.scss','css');
mix.sass('public/sass/contact.scss','css');
mix.sass('public/sass/rtl.scss','css');
mix.sass('public/sass/notification.scss','css');
// ----------------------------------------------------------------------------------------------------
//Booking on the AtypikHouse
mix.sass('public/module/booking/scss/checkout.scss','module/booking/css');
mix.sass('public/module/user/scss/user.scss','module/user/css');
mix.sass('public/module/user/scss/profile.scss','module/user/css');
mix.sass('public/module/news/scss/news.scss','module/news/css');
mix.sass('public/module/media/scss/browser.scss','module/media/css');
mix.sass('public/module/space/scss/space.scss','module/space/css');
mix.sass('public/module/location/scss/location.scss','module/location/css');

