import * as programaService from '../../service/programa';
import * as types from '../types';

export const buscarAgenteAction = async ({ commit }, { nuCpfCnpj }) => programaService
  .buscarAgente(nuCpfCnpj)
  .then((response) => {
    commit(types.SET_AGENTE, response.data.data);
    return response;
  });


export const buscarDocumentos = async ({ commit }, coProjeto) => programaService
  .buscarDocumentos(coProjeto)
  .then((response) => {
    commit(types.SET_DOCUMENTOS_AGENTE, response.data.data);
    return response;
  });

export const cadastrarDocumentos = async ({ commit }, { coProjeto, paramns }) => programaService
  .cadastrarDocumentos(coProjeto, paramns)
  .then((response) => {
    commit(types.UPDATE_DOCUMENTOS_AGENTE, response.data.data);
    return response;
  });

export const excluirDocumentos = async ({ commit }, { coProjeto, coArquivo }) => programaService
  .excluirDocumentos(coProjeto, coArquivo)
  .then((response) => {
    commit(types.DELETE_DOCUMENTOS_AGENTE, coArquivo);
    return response;
  });

export const enviarDocumentacao = async ({ commit }, paramns) => programaService
  .enviarDocumentacao(paramns)
  .then(response => response);
