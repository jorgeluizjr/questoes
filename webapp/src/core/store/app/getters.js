import colors from 'vuetify/es5/util/colors';

export default {
  corDoTema: state => colors[state.theme.color].base,
  snackbar: state => state.snackbar,
  theme: state => state.theme,
  primaryDrawer: state => state.primaryDrawer,
  secondaryDrawer: state => state.secondaryDrawer,
  themeDrawer: state => state.themeDrawer,
};
