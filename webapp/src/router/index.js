import Vue from 'vue';
import Router from 'vue-router';
import NProgress from 'nprogress';
import appRoutes from './config';
import 'nprogress/nprogress.css';
import coreRoutes from '@/core/router';
import { eventHub } from '@/event';

const routes = coreRoutes.concat(appRoutes);

Vue.use(Router);

const router = new Router({
  mode: 'history',
  linkActiveClass: 'active',
  routes,
});

const emitirMensagemErro = (mensagem) => {
  eventHub.$nextTick(() => {
    eventHub.$emit('eventoErro', mensagem);
  });
};

router.afterEach(() => {
  NProgress.done();
});

export default router;
