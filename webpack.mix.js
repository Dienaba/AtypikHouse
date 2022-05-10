/**
* Project F2I / AtypikHouse 
* Vasylyshyn Roman
* Dienaba Camara
* Issa Barry
* Cedric HIHEGLO HODEWA
 */
if (process.env.section) {
    require(`${__dirname}/webpack.${process.env.section}.mix.js`);
}else{
    require(`${__dirname}/webpack.admin.mix.js`);

}