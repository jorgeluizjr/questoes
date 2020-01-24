import * as types from './types';

export default {
  setSnackbar({ commit, state }, params) {
    commit(types.SET_SNACKBAR, params);

    setTimeout(() => {
      commit(types.SET_SNACKBAR, {
        show: false,
      });
    }, state.snackbar.timeout, state);
  },
  setMensagemErro({ commit, state }, message) {
    commit(types.SET_SNACKBAR, {
      show: true,
      color: 'error',
      text: message,
    });

    setTimeout(() => {
      commit(types.SET_SNACKBAR, {
        show: false,
      });
    }, state.snackbar.timeout, state);
  },
  setMensagemSucesso({ commit, state }, message) {
    commit(types.SET_SNACKBAR, {
      show: true,
      color: 'success',
      text: message,
    });

    setTimeout(() => {
      commit(types.SET_SNACKBAR, {
        show: false,
      });
    }, state.snackbar.timeout, state);
  },
  setMensagemInfo({ commit }, message) {
    commit(types.SET_SNACKBAR, {
      show: true,
      color: 'info',
      text: message,
    });
  },
  setUsuarioLogado({ commit }) {
    const userToken = localStorage.getItem('user_token');
    commit(types.SET_USUARIO_LOGADO, obterInformacoesJWT(userToken).user);
  },
  setPrimaryDrawer({ commit }, data) {
    commit(types.SET_PRIMARY_DRAWER, data);
  },
  setPrimaryDrawerStatus({ commit }, status) {
    commit(types.SET_PRIMARY_DRAWER_STATUS, status);
  },
  setSecondaryDrawer({ commit }, data) {
    commit(types.SET_SECONDARY_DRAWER, data);
  },
  setSecondaryDrawerStatus({ commit }, status) {
    commit(types.SET_SECONDARY_DRAWER_STATUS, status);
  },
  setMenuAppStatus({ commit, state, dispatch }, status) {
    if (status && !state.secondaryDrawer.model) {
      dispatch('setPrimaryDrawerStatus', status);
    }

    commit(types.SET_MENU_APP_STATUS, status);
  },
  syncTemaLocalStorage({ commit }) {
    const tema = localStorage.getItem('app_tema');

    if (tema) {
      commit(types.SET_TEMA_APP, JSON.parse(tema));
    }
  },
  setModoDoTema({ commit, state }, data) {
    commit(types.SET_MODO_TEMA, data);
    localStorage.setItem('app_tema', JSON.stringify(state.theme));
  },
  setCorDoTema({ commit, state }, data) {
    commit(types.SET_COR_TEMA, data);
    localStorage.setItem('app_tema', JSON.stringify(state.theme));
  },
  toggleDrawerTheme({ commit }, status) {
    commit(types.SET_THEME_DRAWER, status);
  },
  setPerfilAtivo({ commit }, perfil) {
    let perfilAtivo = perfil;
    if (typeof perfil === 'undefined') {
      perfilAtivo = JSON.parse(localStorage.getItem('perfil_ativo'));
    } else {
      const userToken = localStorage.getItem('user_token');
      usuarioService.atualizarPerfilAtual(obterInformacoesJWT(userToken).user.co_usuario, perfil.co_perfil, { st_perfil_atual: true });
      localStorage.setItem('perfil_ativo', JSON.stringify(perfilAtivo));
    }

    commit(types.SET_PERFIL_ATIVO, perfilAtivo);
  },
  // setMenu({ state, commit }, menu) {
  //   if (Array.isArray(menu)) {
  //     commit(types.UPDATE_MENU, menu);
  //   }
  //   perfilFuncionalidadeService
  //     .buscarPerfilMenu(state.perfilAtivo.co_perfil)
  //     .then(({ data }) => {
  //       commit(types.SET_MENU, data.data);
  //     });
  // },
};
