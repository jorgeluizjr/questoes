import * as types from './types';

export default {
  [types.SET_TEMA_APP](state, payload) {
    state.theme = payload;
  },
  [types.SET_SNACKBAR](state, payload) {
    state.snackbar = Object.assign({}, state.snackbar, payload);
  },
  [types.SET_USUARIO_LOGADO](state, payload) {
    state.usuarioLogado = payload;
  },
  [types.SET_PRIMARY_DRAWER](state, payload) {
    state.primaryDrawer = payload;
  },
  [types.SET_PRIMARY_DRAWER_STATUS](state, status) {
    state.primaryDrawer.model = status;
  },
  [types.SET_SECONDARY_DRAWER_STATUS](state, status) {
    state.secondaryDrawer.model = status;
  },
  [types.SET_SECONDARY_DRAWER](state, payload) {
    state.secondaryDrawer = payload;
  },
  [types.SET_MENU_APP_STATUS](state, status) {
    state.theme.menuAppStatus = status;
  },
  [types.SET_MODO_TEMA](state, payload) {
    state.theme.mode = payload;
  },
  [types.SET_COR_TEMA](state, payload) {
    state.theme.color = payload;
  },
  [types.SET_THEME_DRAWER](state, payload) {
    state.themeDrawer = payload;
  },
  [types.SET_PERFIL_ATIVO](state, payload) {
    state.perfilAtivo = payload;
  },
  [types.SET_MENU](state, payload) {
    state.menus = payload;
  },
  [types.UPDATE_MENU](state, payload) {
    state.menus.concat(payload);
  },
};
