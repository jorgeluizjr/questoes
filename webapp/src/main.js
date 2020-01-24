import Vue from 'vue';
import App from './App';
import router from './router';
import store from './store';
import './registerServiceWorker';
import vuetify from '@/core/plugins/vuetify';
import 'roboto-fontface/css/roboto/roboto-fontface.css';
import 'material-design-icons-iconfont/dist/material-design-icons.css';

// import i18n from './lang/lang';

Vue.config.productionTip = false;

new Vue({
  router,
  store,
  vuetify,
  // i18n,
  render: h => h(App),
}).$mount('#app');
