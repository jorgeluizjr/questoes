import colors from 'vuetify/es5/util/colors';

export default {
  corDoTema: state => colors[state.theme.color].base,
  snackbar: state => state.snackbar,
  theme: state => state.theme,
  usuarioLogado: state => state.usuarioLogado,
  menuAppStatus: state => state.theme.menuAppStatus,
  primaryDrawer: state => state.primaryDrawer,
  secondaryDrawer: state => state.secondaryDrawer,
  themeDrawer: state => state.themeDrawer,
  perfis: state => state.usuarioLogado.perfis,
  perfilAtivo: state => state.perfilAtivo,
  menus: state => state.menus,
};
