import * as service from '../../shared/service/base';

export const buscarBancas = () => service.getRequest('/programa/banca');
export const buscarOrgaos = () => service.getRequest('/programa/orgao');
export const buscarAssuntos = (idBanca, idOrgao) => service.getRequest(
  `programa/assunto?id_banca=${idBanca}&id_orgao=${idOrgao}`,
);
