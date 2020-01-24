import * as actions from './actions/index';
import * as getters from './getters';
import mutations from './mutations/index';
import state from './state';

export default {
  namespaced: true,
  actions,
  state,
  getters,
  mutations,
};
