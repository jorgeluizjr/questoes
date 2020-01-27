import * as types from './types';

export default {
  [types.SET_TEMA_APP](state, payload) {
    state.theme = payload;
  },
  [types.SET_SNACKBAR](state, payload) {
    state.snackbar = Object.assign({}, state.snackbar, payload);
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
  [types.SET_MODO_TEMA](state, payload) {
    state.theme.mode = payload;
  },
  [types.SET_COR_TEMA](state, payload) {
    state.theme.color = payload;
  },
  [types.SET_THEME_DRAWER](state, payload) {
    state.themeDrawer = payload;
  },
};
