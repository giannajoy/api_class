/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
  el: '#vue-wrapper',
  data: {
    items: [],
    hasError: true,
    newItem: { 'name': '','age': '','gender': '','weight': '' },
  },
  mounted: function mounted() {
    this.getAllCows();
  },
  methods : {
    createItem: function createItem() {
      var _this = this;
      var input = _this.newItem;
      if (input['name'] == '' || input['age'] == '' || input['gender'] == '' || input['weight'] == '' ) {
        _this.hasError = false;
      } else {
        _this.hasError = true;
        axios.post('cow/save', input).then(function (response) {
          _this.newItem = { 'name': '' ,'age' : '','gender' : '','weight' : ''};
          _this.getAllCows();
        });
      }
    },
    getAllCows: function getVueItems() {
      var _this = this;
      axios.get('/cows-v').then(function (response) {
        _this.items = response.data;
      });
    },
    deleteCow: function deleteCow(item) {
      var _this = this;
      axios.post('/cow/delete/' + item.id).then(function (response) {
        _this.getAllCows();
        _this.hasDeleted = false
    });
  }

}
});
