import * as types from './types';

export default {
  [types.SET_AGENTE](state, dados) {
    state.agente = dados;
  },
  [types.SET_DOCUMENTOS_AGENTE](state, dados) {
    if (state.documentos === undefined) {
      state.documentos = Object.assign({}, state, { documentos: [] });
    }
    state.documentos = dados;
  },
  [types.UPDATE_DOCUMENTOS_AGENTE](state, dados) {
    if (state.documentos === undefined) {
      state.documentos = Object.assign({}, state, { documentos: [] });
    }
    state.documentos.push(dados);
  },


  [types.DELETE_DOCUMENTOS_AGENTE](state, id) {
    const index = state.documentos.findIndex(
      item => parseInt(item.co_arquivo, 10) === parseInt(id, 10),
    );
    state.documentos.splice(index, 1);
  },

};
