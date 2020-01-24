import * as service from '../../shared/service/base';

export const buscarAgente = nuCpfCnpj => service.getRequest(`/agente/${nuCpfCnpj}`);

export const cadastrarDocumentos = (coProjeto, paramns) => service.postRequest(`/termo-compromisso/projeto/${coProjeto}/arquivo`, paramns);

export const buscarDocumentos = coProjeto => service.getRequest(`/termo-compromisso/projeto/${coProjeto}/arquivo`);

export const excluirDocumentos = (coProjeto, coArquivo) => service.deleteRequest(`/termo-compromisso/projeto/${coProjeto}/arquivo`, coArquivo);

export const enviarDocumentacao = paramns => service.postRequest('/termo-compromisso', paramns);
