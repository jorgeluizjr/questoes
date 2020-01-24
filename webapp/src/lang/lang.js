import Vue from 'vue';
import VueI18n from 'vue-i18n';
import pt from './i18n/pt.json';

Vue.use(VueI18n);

const DEFAULT_LANG = 'pt';

const locales = {
  pt,
};
const i18n = new VueI18n({
  locale: DEFAULT_LANG,
  messages: locales,
});

export default i18n;
