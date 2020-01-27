import * as types from './types';
import * as programaService from '../service/programa';

export const buscarBancasAction = ({ commit }) => programaService
  .buscarBancas()
  .then((response) => {
    commit(types.SET_BANCAS, response.data.data);
    return response;
  });

export const buscarOrgaosAction = ({ commit }) => programaService
  .buscarOrgaos()
  .then((response) => {
    commit(types.SET_ORGAOS, response.data.data);
    return response;
  });

export const cadastrarProgramaAction = ({ commit }, programa) => {
  programaService.buscarAssuntos(programa.banca.id_banca, programa.orgao.id_orgao)
    .then((response) => {
      programa.assuntos = response.data.data;
      commit(types.SET_PROGRAMA, programa);
    });
};
