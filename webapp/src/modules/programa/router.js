import { DefaultLayout } from '@/core/components/layouts';


export default [
  {
    path: '/',
    component: DefaultLayout,
    redirect: 'programa',
    meta: { title: 'Programa' },
    hidden: true,
    children: [
      {
        path: 'programa',
        name: 'programa.listar',
        meta: { title: 'Programas' },
        component: () => import(/* webpackChunkName: "programa-lista" */ '@/modules/programa/views/Lista.vue'),
      },
    ],
  },
];
